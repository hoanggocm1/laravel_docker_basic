<?php

namespace App\Http\Services\Menu;

use App\Models\Product;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuService
{
    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }
    public function getParentHome()
    {
        return Menu::select('id', 'name', 'parent_id')->where('active', 1)->where('parent_id', 0)->orderByDesc('id')->get();
    }

    public function getParentLoc($menu)
    {
        return Menu::where([
            ['parent_id', '==', '0'],
            ['id', '!=', $menu->id],
        ])->orderByDesc('id')->get();
    }

    public function getList()
    {
        return Menu::paginate(1);
    }

    public function create($request)
    {
        try {
            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active'),

            ]);

            session()->flash('success', 'Tạo danh mục thành công');
        } catch (\Exception $err) {
            session::flash('error', $err->getMessage());
            //    session()->flash('error','Email hoặc mật khẩu không đúng');
            return false;
        }
        return true;
    }

    public function getAll()
    {
        return Menu::orderByDesc('id')->get();
    }

    public function destroy($request)
    {
        $id = $request->input('id');

        $menu = Menu::where('id', $id)->first();
        if ($menu) {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }

        return false;
    }

    public function destroy1($menu)
    {
        $id = $menu->input('id');

        $menu1 = Menu::where('id', $id)->first();
        if ($menu1) {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }

        return false;
    }



    public function updanhmuc($request, $id): bool
    {


        // Menu::updated([
        //     'name'=>(string)$request->input('name'),
        //     'parent_id'=>(int)$request->input('parent_id'),
        //     'description'=>(string)$request->input('description'),
        //     'content'=>(string)$request->input('content'),
        //     'active'=> (int) $request->input('active')
        // ]);

        // Menu::create([
        //     'name'=>(string) $request->input('name'),
        //     'parent_id'=>(int) $request->input('parent_id'),
        //     'description'=>(string) $request->input('description'),
        //     'content'=>(string) $request->input('content'),
        //     'active'=>(string) $request->input('active'),

        // ]);

        $data = Menu::find($id);
        $data->name = $request->input('name');
        $data->parent_id = $request->input('parent_id');
        $data->description = $request->input('description');
        $data->content = $request->input('content');
        $data->active = $request->input('active');
        $data->update();

        Session::flash('success', 'Cap nhat thanh cong danh muc');
        return true;
    }

    public function getId($id)
    {

        return  Menu::where('id', $id)->where('active', 1)->first();
    }
    public function getProduct($menu, $request)
    {
        // $a = $menu->products()->where('active', 1);

        // return $a;

        $a = Product::where('menu_id', $menu->id)->where('active', 1);
        if ($request->input('price')) {
            $a->orderBy('price', $request->input('price'));
        }
        return $a->orderByDesc('id')->paginate(8)->withQueryString();
    }
}

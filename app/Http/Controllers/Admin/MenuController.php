<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\Menu\MenuService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }



    public function create()
    {

        return view('admin.menu.add', [
            'title' => 'Thêm danh mục mới',
            'menus' => $this->menuService->getParent()

        ]);
    }

    public  function  store(CreateFormRequest $request)
    {
        $this->menuService->create($request);

        return redirect()->back();
    }

    public function show()
    {
        return view('admin.menu.list', [
            'title' => 'Danh sách các danh mục',
            // 'list' => $this->menuService->getList()
            // 'list' => DB::table('menus')->get()
            'list' => $this->menuService->getAll()
        ]);
    }

    public function destroy(Request $request)
    {
        $result = $this->menuService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa danh mục thành công'

            ]);
        }

        return response()->json([
            'error' => true


        ]);
        // return dd($request);


    }

    public function destroy1(Menu $menu)
    {

        Menu::where('id', $menu->id)->delete();
        return redirect()->back();
    }


    public function showedit(Menu $menu)
    {
        // return dd($menu);
        return view('admin.menu.edit1', [
            'title' => ' Chỉnh sửa danh mục: ' . $menu->name,
            // 'menu' => DB::table('menus')->where('id',$menu->id)->get(),
            'menu' => $menu,
            'getParent' => $this->menuService->getParentLoc($menu),
            'laythangchakhacdeoduoi' => DB::table('menus')->where('parent_id', 0)->Where([
                ['id', '!=', $menu->parent_id]
            ])->get(),
            'laythangchadeselect' => DB::table('menus')->where('parent_id', 0)->Where('id', $menu->parent_id)->get(),
            'layallcha' => $this->menuService->getParent()
        ]);
    }

    public function updatedanhmuc(CreateFormRequest $request, Menu $menu)
    {
        $id = $menu->id;
        $a = $this->menuService->updanhmuc($request, $id);
        if ($a) {
            return redirect('admin/menus/list');
        }

        return redirect('admin/menus/edit/' . $menu->id);
    }

    public function updateactive(Menu $menu)
    {
        if ($menu->active == 1) {
            Menu::where('id', $menu->id)->update(['active' => 0]);
        } else {
            Menu::where('id', $menu->id)->update(['active' => 1]);
        }
        return redirect()->back();
    }
}

<?php

namespace App\Http\Services\Menu;

use App\Models\Hocsinh;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class HocsinhService
{
    public function create($request)
    {

        try {
            Hocsinh::create([
                'name' => (string) $request->input('name'),
                'lop' => (string) $request->input('lop'),
                'dtb' => (int) $request->input('dtb'),
                'phone' => (string) $request->input('phone'),
                'active' => (int) $request->input('active'),

            ]);

            session()->flash('success', 'Thêm học sinh thành công');
        } catch (\Exception $err) {
            session::flash('error', $err->getMessage());
            //    session()->flash('error','Email hoặc mật khẩu không đúng');
            return false;
        }
        return true;
    }

    public function listhocsinh()
    {
        return Hocsinh::get();
    }

    public function delete($request)
    {

        if (Hocsinh::where('id', $request->id)->first())
            return Hocsinh::where('id', $request->id)->delete();
    }

    public function showediths($hocsinh)
    {
        $data = Hocsinh::find('id', $hocsinh->id)->first();
    }

    public function updatehs($request, $hocsinh)
    {

        // $data = Hocsinh::where('id',$hocsinh->id)->first();
        // $data->name = $request->input('name');
        // $data->lop = $request->input('lop');
        // $data->dtb = $request->input('dtb');
        // $data->phone = $request->input('phone');
        // $data->active = $request->input('active');
        // $data->update();

        // return true;

        Hocsinh::where('id', $hocsinh->id)->update([
            'name' => $request->input('name'),
            'lop' => $request->input('lop'),
            'dtb' => $request->input('dtb'),
            'phone' => $request->input('phone'),
            'active' => $request->input('active'),
        ]);
    }
}

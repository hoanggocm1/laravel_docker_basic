<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Menu\CreateFormRequestHocSinh;
use App\Http\Services\Menu\HocsinhService;
use App\Models\Hocsinh;
use App\Models\Menu;
use PhpParser\Node\Expr\FuncCall;

class HocsinhController extends Controller
{
    protected $hocsinhService;
    public function __construct(HocsinhService $hocsinhService)
    {
        $this->hocsinhService = $hocsinhService;
    }
    public function create()
    {
        return view('admin.menu.addhocsinh', [
            'title' => 'Them hoc sinh'
        ]);
    }

    public  function  store(CreateFormRequestHocSinh $request)
    {
        $this->hocsinhService->create($request);
        return redirect()->back();
    }
    public function listhocsinh()
    {
        return view('admin.menu.listhocsinh', [
            'title' => 'danh sach hoc sinh',
            'listhocsinh' => $this->hocsinhService->listhocsinh()

        ]);
    }

    public function delete(Request $request)
    {
        $result = $this->hocsinhService->delete($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xoa hoc sinh thanh cong',
                // 'message1' =>'Xoa that bai roi 3 hs'
            ]);
        }
        return response()->json([
            'error' => true,
            'message1' => 'Xoa that bai roi 3 hs'
        ]);
    }

    public function delete1(Hocsinh $hocsinh)
    {
        Hocsinh::where('id', $hocsinh->id)->delete();
        return redirect()->back();
    }

    public function showediths(Hocsinh $hocsinh)
    {
        return view('admin.menu.ediths', [
            'title' => 'Chỉnh sửa thông tin học sinh ' . $hocsinh->name,
            'hocsinh' => $hocsinh
        ]);
    }

    public function updatehocsinh(CreateFormRequestHocSinh $request, Hocsinh $hocsinh)
    {
        $this->hocsinhService->updatehs($request, $hocsinh);

        return redirect('/admin/menus/listhocsinh');
    }

    public function updateactivehs(Hocsinh $hocsinh)
    {

        if ($hocsinh->active == 1) {
            Hocsinh::where('id', $hocsinh->id)->update([
                'active' => 0,

            ]);
        } else {
            Hocsinh::where('id', $hocsinh->id)->update(['active' => 1]);
        }

        return redirect()->back();
    }
}

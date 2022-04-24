<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\InfoAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public  function index()
    {
        return view('admin.users.login', [
            'title' => 'Đăng nhập hệ thống Admin'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $request->input('remember'))) {
            $user = Auth::user();
            $info = InfoAdmin::where('user_id', $user->id)->first();

            if ($info != null) {
                return redirect()->route('admin');
            } else {
                // $save = $request->input('password'); //lay password để check. ý tưởng sai lầm :(
                Auth::logout();
                return view('admin.users.create_password_admin', [
                    'title' => 'Khởi tạo tài khoản Admin',
                    'user' => $user,
                    // 'save' => $save,
                ]);
            }
        }

        session()->flash('error', 'Email hoặc mật khẩu không đúng');
        return  redirect()->back();
    }

    public function admin_dangxuat()
    {

        Auth::logout();
        return redirect()->back();
    }


    // hàm test call api 
    public function call_api()
    {

        return view('testAPI.productAPI');
    }
}

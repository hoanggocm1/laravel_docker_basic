<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Password_admin\FormRequestCreatePassword;
use App\Http\Requests\Password_admin\FormRequestPasswordAdmin;

use App\Http\Services\infoAdmin\InfoadminService;
use App\Models\InfoAdmin;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class InfoAdminController extends Controller
{
    protected $infoadminService;

    public function __construct(InfoadminService $infoadminService)
    {
        $this->infoadminService = $infoadminService;
    }



    public function admin_info()
    {
        $user = Auth::user();

        $infoUser = InfoAdmin::where('user_id', $user->id)->first();


        return view('admin.users.admin_info', [
            'title' => 'Thông tin tài khoản Admin',
            'Admin' => $user,
            'infoUser' => $infoUser,
        ]);
    }
    public function edit_user()
    {
        $user = Auth::user('id');
        $id = $user->id;

        return view('admin.users.edit_user_admin', [
            'title' => 'Sửa thông tin đăng nhập',
            'id' => $id,
        ]);
    }

    public function updatePassword_Admin(FormRequestPasswordAdmin $request, User $user)
    {


        if (Hash::check($request->input('password_old'), $user->password)) {

            $password_new = Hash::make($request->input('password_confirm'));
            User::where('id', $user->id)->update(['password' => $password_new]);
            session()->flash('success', 'Đổi mật khẩu thành công.');
            return redirect()->back();
        }
        session()->flash('error', 'Đổi mật khẩu thất bại!');
        return redirect()->back();
    }

    public function edit_info_admin(InfoAdmin $infoAdmin)
    {
        return view('admin.users.edit_info_admin', [
            'title' => 'Đổi thông tin Admin',
            'infoAdmin' => $infoAdmin,
        ]);
    }

    public function updateInfoAdmin(Request $request, InfoAdmin $infoAdmin)
    {
        InfoAdmin::where('id', $infoAdmin->id)->update([
            'user_id' => (int) $infoAdmin->user_id,
            'full_name_admin' => (string)$request->input('full_name_admin'),
            'phone_admin' => (string)$request->input('phone_admin'),
            'email_admin' => (string)$request->input('email_admin'),
            'address' => (string)$request->input('address'),
            'position' => (string)$request->input('position'),
            'education' => (string)$request->input('education'),
            'skills' => (string)$request->input('skills'),
            'description' => (string)$request->input('description'),
            'year_of_birth' => (int)$request->input('year_of_birth'),
            'avatar_admin' => (string)$request->input('file_avatarAdmin'),
        ]);
        return redirect('/admin/admin-info');
    }

    public function create_info_admin(Request $request, User $id)
    {
        try { {
                InfoAdmin::create([
                    'user_id' => (int) $id->id,
                    'full_name_admin' => (string)$request->input('full_name_admin'),
                    'phone_admin' => (string)$request->input('phone_admin'),
                    'email_admin' => (string)$request->input('email_admin'),
                    'address' => (string)$request->input('address'),
                    'position' => (string)$request->input('position'),
                    'education' => (string)$request->input('education'),
                    'skills' => (string)$request->input('skills'),
                    'description' => (string)$request->input('description'),
                    'year_of_birth' => (int)$request->input('year_of_birth'),
                    'avatar_admin' => (string)$request->input('file_avatarAdmin'),

                ]);
                session()->flash('success', 'Chào mừng Admin.');
                return redirect('/admin');
            }
        } catch (\Exception $error) {
            session()->flash('error', 'Khởi tạo thông tin cá nhân Admin thất bại!');
            return redirect('/admin');
        }
    }

    public function create_password_admin(Request $request, User $id)
    {


        try {
            if ($request->input('password') === $request->input('password_confirm')) {
                $password = Hash::make($request->input('password'));
                $user = User::where('id', $id->id)->update([
                    'name' => $request->input('name'),
                    'password' => $password,
                ]);
                $image = 'Avatar::create($user->name)->toBase64()';

                $info =  InfoAdmin::create([
                    'user_id' => (int) $id->id,
                    'full_name_admin' => (string)$request->input('name'),
                    // 'phone_admin' => '1',
                    'email_admin' => $id->email,
                    // 'address' => '1',
                    'position' => $id->position,
                    // 'education' => '1',
                    // 'skills' => '1',
                    // 'description' => '1',
                    // 'year_of_birth' => '1',
                    // 'avatar_admin' => $image,
                ]);

                if (!empty($info)) {
                    session()->flash('success', 'Vui lòng đăng nhập lại bằng mật khẩu mới khởi tạo!');
                    return view('admin.users.login', [
                        'title' => 'Vui lòng đăng nhập lại bằng mật khẩu mới khởi tạo!'
                    ]);
                }
            }
            session()->flash('error', 'Mật khẩu xác thực không chính xác!');
            return redirect()->back();
        } catch (\Exception $error) {
            session()->flash('error', 'Khởi tạo thông tin Admin thất bại!');
            return redirect()->back();
        }
    }
}

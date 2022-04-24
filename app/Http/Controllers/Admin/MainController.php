<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InfoAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $info = InfoAdmin::where('user_id', $user->id)->first();
        return view('admin.home', [
            'title' => 'Trang quản trị Admin',
            'name' => $info->full_name_admin,
        ]);
    }
}

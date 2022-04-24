<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SessionUser;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $checkLogin = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($checkLogin)) {
            $user_token = SessionUser::where('user_id', Auth::user()->id)->first();
            if (empty($user_token)) {
                $create_token =  SessionUser::create([
                    'token' => Str::random(40),
                    'refresh_token' => Str::random(40),
                    'token_expired' => date('Y-m-d H:i:s', strtotime('+30 day')),
                    'refresh_token_expired' => date('Y-m-d H:i:s', strtotime('+360 day')),
                    'user_id' => Auth::user()->id,
                ]);
                // return response()->json([
                //     'code' => 200,
                //     'create_token' => $create_token,
                // ], 200);

            } else {
                // return response()->json([
                //     'code' => 200,
                //     'user_token' => $user_token,
                // ], 200);
                $a = Auth::user();

                return view('test', ['token' => $user_token]);
            }
        } else {
            return response()->json([
                'code' => 401,
                'message' => 'Tài khoản hoặc mật khẩu không đúng!',
            ], 401);
        }
    }

    public function getProducts()
    {

        $products =  Product::all();
        foreach ($products  as $key => $product) {
            $data[$key] = $product;
        }


        return response()->json([
            'products' => $products
        ]);
    }
}

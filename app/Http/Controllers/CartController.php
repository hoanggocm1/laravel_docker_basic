<?php

namespace App\Http\Controllers;

use App\Http\Services\Cart\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Whoops\Run;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addcart(Request $request)
    {
        //hàm này thêm sản phẩm vào giỏ hàng từ trang detail prodcut. sẽ hiện thông báo
        $result = $this->cartService->create($request);
        if ($result == false) {
            return redirect()->back();
        }
        session()->flash('success', 'Đã thêm sản phẩm vào giỏ hàng');
        return redirect()->back();
    }
    public function show()
    {
        $a = Session::get('carts');
        // $soluong = array_values($a);
        $product = $this->cartService->getidProduct();

        return view('cart.list', [
            'title' => 'Giỏ hàng',
            'product' => $product,
            'carts' => Session::get('carts')
        ]);


        // foreach ($product as $aaa) {
        //     return dd($a);
        // }
    }
    public function updatecart(Request $request)
    {
        $a = $this->cartService->update($request);
        return redirect()->back();
    }

    public function deletecart($id)
    {

        $this->cartService->delete($id);




        // $carts = Session::get('carts');
        // unset($carts[$id]);
        // Session::put('carts', $carts);
        return redirect()->back();
    }

    public function checkout(Request $request)
    {
        return dd($request->input());
    }

    public function deleteall()
    {
        Session::forget('carts');
        session()->flash('success', 'Xóa toàn bộ giỏ hàng thành công.');
        return redirect()->back();
    }


    // hàm thêm sản phẩm vào giỏ hàng từ main. bằng ajax
    public function addProductCart($id, $num)
    {




        $result = $this->cartService->createProductCart($id, $num);
        if ($result == false) {
            return response()->json([
                'error' => 'Thêm sản phẩm vào giỏ hàng thất bại!',
                'result' => $result,
            ]);
        }
        return response()->json([
            'success' => 'Thêm sản phẩm vào giỏ hàng thành công',
            'result' => $result,
        ]);
    }
}

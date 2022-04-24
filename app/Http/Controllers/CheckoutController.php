<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Checkout\CheckoutService;
use App\Models\Product;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class CheckoutController extends Controller
{
    protected $checkoutService;
    public function __construct(CheckoutService $checkoutService)
    {
        $this->checkoutService = $checkoutService;
    }

    public function checkout(Request $request)
    {
        // $a = $request->input('num_product');
        // $b = substr(md5(time()), 0, 5);
        // return dd($request);
        $result =  $this->checkoutService->checkout($request);




        if ($result !== null) {

            $order_detail = $result->detailOrder();
            $order_shipping = $result->shippingOrder();
            foreach ($order_detail as $value) {
                $img[] = Product::where('id', $value->product_id)->get();
            }
            foreach ($img as $image) {
                foreach ($image as $image1) {
                    $c[] = $image1->image;
                }
            }

            return redirect('/test-mail/' . $result->id);
            // return view('infoCustomer.viewOrder', [
            //     'title' => 'Chi tiết đơn hàng',
            //     'orderDetail' => $order_detail,
            //     'orderShipping' => $order_shipping,
            //     'order1' => $result,
            //     'image' => $c,
            // ]);
        }
        // $order1 = Order::where('id', $order->id)->first();


        // return view('infoCustomer.viewOrder', [
        //     'title' => 'Chi tiết đơn hàng',
        //     'orderDetail' => $order_detail,
        //     'orderShipping' => $order_shipping,
        //     'order1' => $order1,
        //     'image' => $c,
        // ]);





        return dd(123);




        // trả về trang cảm ơn
        // if ($result == true) {
        //     return view('checkout.thankyou', [
        //         'title' => 'Thanh toan'
        //     ]);
        // }
        // return redirect()->back();
    }
    public function checkout1(Request $request)
    {
        return dd($request);
    }

    public function dangnhap1(Request $request)
    {
        $a = 1;
        return dd($request->input());
    }
    public function showcheckout(Request $request)
    {

        $customer = Session::get('customer');

        $carts = $request->input('num_product');
        $idProduct = array_keys($carts);
        foreach ($idProduct as $id) {
            $product[] = Product::select('id', 'name', 'price', 'price_sale', 'image')->where('active', 1)->where('id', $id)->get();
        }
        // foreach ($product as $a1) {
        //     foreach ($a1 as $a2) {
        //         echo $a2->name;
        //     }
        // }

        return view('checkout.showcheckout', [
            'title' => 'Thanh toán',
            'product' => $product,
            'carts' => $carts,
            'customer' => $customer
        ]);
    }

    public function showcheckoutheader(Request $request)
    {
        $customer = Session::get('customer');

        $carts = Session::get('carts');
        if ($carts != null) {
            $idProduct = array_keys($carts);
            foreach ($idProduct as $id) {
                $product[] = Product::select('id', 'name', 'price', 'price_sale', 'image')->where('active', 1)->where('id', $id)->get();
            }
            return view('checkout.showcheckout', [
                'title' => 'Thanh toán',
                'product' => $product,
                'carts' => $carts,
                'customer' => $customer
            ]);
        } else {
            // session()->flash('error', 'Chưa có đơn hàng nào để thanh toán');
            return view('checkout.cartRong', [
                'title' => 'Thanh toán',

            ]);
        }
    }
}

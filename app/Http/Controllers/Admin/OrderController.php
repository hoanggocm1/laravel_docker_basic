<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::orderByDesc('id')->get();
        return view('admin.order.listOrder', [
            'title' => 'Danh sách đơn hàng',
            'order' => $order,
        ]);
    }

    public function vieworder(Order $order)
    {
        $order1 = Order::where('id', $order->id)->first();

        // $order_time = ;
        $order_detail = $order->detailOrder();
        $order_shipping = $order->shippingOrder();
        return view('admin.order.detailOrder', [
            'title' => 'Chi tiết đơn hàng',
            'orderDetail' => $order_detail,
            'orderShipping' => $order_shipping,
            'order1' => $order1,

        ]);
    }
}

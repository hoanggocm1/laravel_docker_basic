<?php

namespace App\Http\Services\Checkout;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use App\Models\Shipping_order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CheckoutService
{
    public function checkout($request)
    {

        $customer = Session::get('customer');

        try {
            $order_method = $request->input('order_method');
            DB::beginTransaction();
            $carts = Session::get('carts');
            if ($carts == null) {
                return false;
            }
            $dem = count($carts);
            $customer = Session::get('customer');
            $order =  Order::create([
                'customer_id' => $customer->id,
                'order_status' => 0,
                'order_method' => $order_method,
                'price' => $request->input('price'),
                'loai_mathang' => $dem,
                'order_time' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(),
            ]);
            $shipping = Shipping_order::create([
                'shipping_name' => $request->input('shipping_name'),
                'shipping_address' => $request->input('shipping_address'),
                'shipping_phone' => $request->input('shipping_phone'),
                'shipping_email' => $request->input('shipping_email'),
                'shipping_content' => $request->input('shipping_content'),
                'order_id' => $order->id,
            ]);

            $this->getProduct($carts, $order->id);


            DB::commit();

            Session::forget('carts');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Dat hang that bai. Vui lòng thử lại!');
            return false;
        }
        return $order;
    }
    public function getProduct($carts, $order_id)
    {
        $random = substr(md5(time()), 0, 5);
        $product = Session::get('carts');
        if (is_null($product)) {
            return [];
        }
        $idProduct = array_keys($product);


        $productCart = Product::where('active', 1)->whereIn('id', $idProduct)->get();


        foreach ($productCart as $value) {
            $data[] = [
                'order_id' => $order_id,
                'product_id' => $value->id,
                'product_name' => $value->name,
                'order_price' => $value->price_sale != 0 ? $value->price_sale : $value->price,
                'order_qty' => $carts[$value->id],
            ];
        }
        Order_detail::insert($data);
    }
}

<?php

namespace App\Http\Services\Cart;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CartService
{

    public function create($request)
    {
        //Session::foget('carts');
        $qty = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');
        // if ($qty <= 0 || $product_id <= 0) {
        //     Session::flash('error', 'so luong hoac san pham khong chinh xac');
        //     return false;
        // }

        $carts = Session::get('carts');
        if (is_null($carts)) {

            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }
        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }
        $carts[$product_id] = $qty;
        Session::put('carts', $carts);
        return true;
    }

    // thêm sản phẩm vào giỏ hàng bằng ajax từ trang main

    public function createProductCart($id, $num)
    {
        $qty = $num;
        $product_id = $id;
        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }
        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }
        $carts[$product_id] = $qty;
        Session::put('carts', $carts);
        return true;
    }

    //----------------------------
    public function getidProduct()
    {

        $a = Session::get('carts');
        if (is_null($a)) {
            return [];
        }
        $idProduct = array_keys($a);
        return Product::where('active', 1)->whereIn('id', $idProduct)->get();
    }
    public function update($request)
    {
        Session::put('carts', $request->input('num_product'));
        return true;
    }
    public function delete($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);
        Session::put('carts', $carts);
    }
}

<?php

namespace App\Http\View\Composers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;


class CartComposer
{

    protected $users;


    public function __construct()
    {
    }


    public function compose(View $view)
    {
        $a = Session::get('carts');
        if (is_null($a)) {
            return [];
        }
        $idProduct = array_keys($a);
        $carts = Product::where('active', 1)->whereIn('id', $idProduct)->get();

        $view->with('cartsmini', $carts);
    }
}

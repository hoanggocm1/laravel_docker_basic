<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductService
{

    public function getMenuloc()
    {

        return Menu::where([
            ['active', '=', 1],
            ['parent_id', '!=', 0]
        ])->orderByDesc('id')->get();
    }




    public function getProduct()
    {

        return Product::orderByDesc('id')->paginate(10);
    }

    // const LIMIT = 16;

    public function getProductHome($page = null)
    {
        return Product::where('active', 1)
            ->orderByDesc('id')
            ->when($page != null, function ($query) use ($page) {
                $query->offset($page * self::LIMIT);
            })
            ->limit(self::LIMIT)
            ->get();
    }

    public function getProductHome1()
    {
        return Product::where('active', 1)->orderByDesc('id')->paginate(12);
    }

    public function ValidatePrice($request)
    {
        if (
            $request->input('price') != 0 &&  $request->input('price_sale') != 0 &&
            $request->input('price_sale') > $request->input('price')
        ) {
            session()->flash('error', 'Gia giam khong duoc nho hon gia goc');
            return false;
        }

        if ($request->input('price_sale') != 0 && $request->input('price') == 0) {
            session()->flash('error', 'Vui long nhap gia goc');
            return false;
        }

        return true;
    }
    // public function getMenuloc(){
    //     return Menu::where('active',1)->orwhere([
    //         ['parent_id','!=','0']
    //     ])->get();
    // }


    const LIMIT = 8;
    public function get($page = 0)
    {
        return  Product::orderByDesc('id')

            ->when($page != null, function ($query) use ($page) {
                $query->offset($page * self::LIMIT);
            })
            ->limit(self::LIMIT)
            ->get();
    }
    public function getHome($request)
    {
        // return dd($request->page);
        return  Product::orderByDesc('id')
            ->where('active', 1)

            // ->when($page != null, function ($query) use ($page) {
            //     $query->offset($page * self::LIMIT);
            // })

            ->limit(self::LIMIT)
            ->offset($request->page * self::LIMIT)
            ->get();
    }
}

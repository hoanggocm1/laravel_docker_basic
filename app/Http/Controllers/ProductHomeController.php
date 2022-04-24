<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Product\ProductService;
use App\Models\ImageProduct;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductHomeController extends Controller
{
    protected $menuService;
    protected $sliderService;
    protected $productService;

    public function __construct(MenuService $menuService, SliderService $sliderService, ProductService $productService)
    {
        $this->menuService = $menuService;
        $this->sliderService = $sliderService;
        $this->productService = $productService;
    }




    public function productMenu(Request  $request, $id, $slug,)
    {
        $menu1 = Menu::where('id', $id)->first();


        if ($menu1->parent_id == 0) {
            $menucon = Menu::select('id')->where('active', 1)->where('parent_id', $menu1->id)->get();
            foreach ($menucon as $menucon1) {
                $product1[] = Product::where('active', 1)->where('menu_id', $menucon1->id)->get();
            }
            $dem =  count($product1);

            return view('product.product', [
                'title' => 'Sản phẩm ' . $menu1->name,
                'menu1' => $menu1,
                'ProductMenu1' => $product1,
            ]);
        }

        $menu = $this->menuService->getId($id);
        // $prodcuts = $this->menuService->getProdcut($menu);
        // $a = Menu::where('id', $id)->where('active', 1)->get();
        $a = Menu::where([
            ['parent_id', '!=', 0],
            ['active', 1]
        ])->get();
        $b1 = $this->menuService->getProduct($menu, $request);

        // $b = Product::where('menu_id', $menu->id)->where('active', 1)->paginate(8);
        // if ($request->input('price')) {
        // }

        return view('product.product', [
            'title' => 'Sản phẩm ' . $menu->name,
            'getMenu' => $a,
            'ProductMenu' => $b1,
            'menu1' => $menu1,

        ]);

        // $c = Menu::where('parent_id', $id)->where('active', 1)->get();
        // foreach ($c  as $key => $c1) {
        //     $d = Product::orwhere('menu_id', $c1->id)->where('active', 1)->get();
        // }
        // // $d = Product::where('menu_id', $c->id)->where('active', 1)->get();
        // return dd($d);
    }

    public function detailProduct(Request  $request, $id, $slug)
    {


        $ProductforID = Product::where('id', $id)->where('active', 1)->get();
        $imageProductforID = ImageProduct::where('id_product', $id)->get();

        foreach ($ProductforID as $Related) {
            $ProductRelated = Product::where([
                ['menu_id', $Related->menu_id],
                ['id', '!=', $id]
            ])
                ->orderByDesc('id')
                ->get();
        }
        return view('product.detail', [
            'title' => 'Chi tiết sản phẩm',
            'getImageProduct' => $imageProductforID,
            'getRelated' => $ProductRelated,
            'getProduct' => $ProductforID
        ]);
    }
}

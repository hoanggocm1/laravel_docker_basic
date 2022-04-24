<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\Product\ProductService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Product\CreateFormRequestProduct;
use App\Models\ImageProduct;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function addproduct()
    {
        return view('admin.product.add', [
            'title' => 'Thêm sản phẩm',
            'menus' => $this->productService->getMenuloc(),

        ]);
    }

    public function createproduct(CreateFormRequestProduct $request)
    {

        $result = $this->productService->ValidatePrice($request);

        if ($result) {
            $image =  $request->input('file');

            if ($image) {
                // $fullimage = $image->getClientOriginalName();
                // $truocimage = current(explode('.', $fullimage));
                // $sauimage = $image->getClientOriginalExtension();
                // $endimage =  $truocimage . rand(0, 99) . '.' . $sauimage;
                // $image->move('uploads/products', $endimage);


                $product =  Product::create([
                    'name' => (string) $request->input('name'),
                    'menu_id' => $request->input('menu_id'),
                    'description' => (string) $request->input('description'),
                    'content' => (string) $request->input('content'),
                    'price' => (int)$request->input('price'),
                    'price_sale' => (int)$request->input('price_sale'),
                    'image' => (string)$image,
                    'active' => (int)$request->input('active')
                ]);
            }
            for ($i = 0; $i < $request->input('demImages'); $i++) {
                ImageProduct::create([
                    'id_product' => $product->id,
                    'image_product' => $request->input('files' . $i),
                ]);
            }
            session()->flash('success', 'Thêm sản phẩm thành công.');
            return redirect()->back();
        }
        session()->flash('error', 'Thêm sản phẩm thất bại!');
        return redirect()->back();
    }

    public function createproduct1(Request $request)
    {

        $image = $request->file('image');
        if ($image) {
            $fullimage = $image->getClientOriginalName();
            $truocimage = current(explode('.', $fullimage));
            $sauimage = $image->getClientOriginalExtension();
            $endimage =  $truocimage . rand(0, 999) . '.' . $sauimage;
            return dd($endimage);
        }
    }

    public function listproduct(Menu $menu)
    {
        return view('admin.product.list', [
            'title' => ' Danh sách sản phẩm ',
            'products' => $this->productService->getProduct($menu),
            'menus' => Menu::orderByDesc('id')->get()
        ]);
    }

    public function productactive(Product $product)
    {
        if ($product->active == 1) {
            Product::where('id', $product->id)->update(['active' => 0]);
        } else {
            Product::where('id', $product->id)->update(['active' => 1]);
        }

        return redirect()->back();
    }

    public function updateActivePRodcut()
    {
        // if ($product->active == 1) {
        //     Product::where('id', $product->id)->update(['active' => 0]);
        // } else {
        //     Product::where('id', $product->id)->update(['active' => 1]);
        // }
        $result = true;
        return dd($result);
        // return response()->json(['check' => $result]);
    }


    public function deleteproduct(Product $product, Request $request)
    {


        $a =  Product::where('id', $product->id)->first();
        $path = 'uploads/products/' . $a->image;
        if ($a) {
            if (file_exists($path)) {
                // Storage::delete($path);
                unlink($path);
                // return dd($path);
                $a->delete();
                session()->flash('success', 'Xóa sản phẩm thành công');
                return redirect()->back();
            }
            $a->delete();
            session()->flash('success', 'Xóa sản phẩm thành công');
            return redirect()->back();
        }

        // if ($a){
        //     $b = str_replace('storage','public',$a->image);
        //     Storage::delete($b);
        //     $a->delete();

        // }
        //      return redirect()->back();
        // return dd($path);
        // $a->delete();
        // return redirect()->back();


    }

    public function editproduct(Product $product)
    {

        return view('admin.product.editproduct', [
            'title' => 'Sửa thông tin sản phẩm' . $product->name,
            'product' => Product::where('id', $product->id)->get(),

            'menus' => Menu::where('active', 1)->where([
                ['parent_id', '!=', '0']
            ])->get(),

        ]);
        // $menus= $this->productService->getMenuloc();
        // // $product1 = $product;
        // return dd($menus);
    }

    public function updateproduct(Request $request, Product $product)
    {

        $image = $request->input('file');

        if ($image) {
            // $fullimage = $image->getClientOriginalName();
            // $truocimage = current(explode('.', $fullimage));
            // $sauimage = $image->getClientOriginalExtension();
            // $endimage =  $truocimage . rand(0, 99) . '.' . $sauimage;
            // $image->move('uploads/products', $endimage);

            // $truocimage = current(explode('.',$fullimage));
            // $sauimage = $image->getClientOriginalExtension();
            // $endimage =  $truocimage.rand(0,99).'.'.$sauimage;
            // $image->move('uploads/products',$endimage);

            Product::where('id', $product->id)->update([
                'name' => $request->input('name'),
                'menu_id' => $request->input('menu_id'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'price' => $request->input('price'),
                'price_sale' => $request->input('price_sale'),

                'active' => $request->input('active'),
                'image' => $image,

            ]);
        } else {
            Product::where('id', $product->id)->update([
                'name' => $request->input('name'),
                'menu_id' => $request->input('menu_id'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'price' => $request->input('price'),
                'price_sale' => $request->input('price_sale'),

                'active' => $request->input('active'),
                'image' => $product->image,
            ]);
        }

        return redirect('admin/products/list');
    }

    public function deleteProductAjax($id)
    {
        $a =  Product::where('id', $id)->first();
        $path = 'uploads/products/' . $a->image;
        if ($a) {
            if (file_exists($path)) {
                // Storage::delete($path);
                unlink($path);
                // return dd($path);
                $a->delete();
                return response()->json(true);
            }
            $a->delete();
            return response()->json(true);
        }
    }

    public function editproductimage(Product $product)
    {
        $imageProduct = $product->image;
        $imageDetails = ImageProduct::where('id_product', $product->id)->get();

        return view('admin.product.editimage', [
            'title' => 'Sửa hình ảnh sản phẩm',
            'product' => $product,
            'imageDetails' => $imageDetails

        ]);
    }
    public function deleteImageProductAjax($id)
    {
        $result =  ImageProduct::where('id', $id)->delete();
        return response()->json([
            'id' => $id
        ]);
    }

    public function changeImageProductAjax(Request $request, $id)
    {
        $image = $request->input('nameImageProduct');

        Product::where('id', $id)->update(['image' => $image]);
        return response()->json([
            'image' => $image
        ]);
    }


    public function add_images_product(Request $request, $id)
    {


        for ($i = 0; $i < $request->input('demImages'); $i++) {
            ImageProduct::create([
                'id_product' => $id,
                'image_product' => $request->input('files' . $i),
            ]);
        }
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Product::where('menu_id', 52)->get();
        return response()->json([
            'message' => 'load data thanh cong',
            'code' => 200
        ], 200);
    }

    // public function addprodcut(Request $request)
    // {
    //     $data = $request->only('name', 'description', 'price', 'price_sale');
    //     if (
    //         Product::create([
    //             'name' => $request->input('name'),
    //             'menu_id' => 52,
    //             'description' => $request->input('description'),
    //             'price' => $request->input('price'),
    //             'price_sale' => $request->input('price_sale'),
    //         ])
    //     ) {
    //         return dd(true);
    //     }
    //     return dd(false);
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return dd($request->input());
        $product =  Product::create([
            'name' => $request->input('name'),
            'menu_id' => 52,
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'price_sale' => $request->input('price_sale'),
        ]);
        return response()->json([
            'product' => $product,
            'code' => 200
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return response()->json([
            'product' => $product,
            'code' => 200
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $product = Product::where('id', $id)->update([
            'name' => $request->input('editname'),
            'description' => $request->input('editdescription'),
            'price' => $request->input('editprice'),
            'price_sale' => $request->input('editprice_sale'),
        ]);
        if ($product) {
            return response()->json([
                'message' => 'edit thanh cong',
                'product' => $product,
                'code' => 200
            ], 200);
        }
        return response()->json([
            'message' => 'edit that bai',
            'code' => 400
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return response()->json([
            'message' => 'delete thanh cong',
            'code' => 200
        ], 200);
    }
}

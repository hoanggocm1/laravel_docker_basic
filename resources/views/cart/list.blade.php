@extends('menu')
@section('content')


<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15  p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            {{$title}}
        </span>
    </div>
</div>
<?php
if (count($product) != 0) {
    $dem = count(($product));
?>


    <form class="bg0 p-t-30 p-b-85" action="/showcheckout1">
        <div class="container">

            <div class="row">
                <div class="col-lg-10 col-xl-10 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart " style="min-width: 640px;">

                                <tbody>
                                    <tr class="table_head">
                                        <th class="column-1 " style="padding-left: 10px;">Product</th>
                                        <th class="column-2"></th>
                                        <th class="column-3">Price</th>
                                        <th class="column-1">Quantity</th>
                                        <th class="column-5" class="p-l-1500">Total</th>
                                        <th class="column-6">Delete</th>
                                    </tr>



                                    @php $tongtien = 0;

                                    @endphp
                                    @foreach($product as $productCart)
                                    <?php

                                    if ($productCart->price_sale != 0) {
                                        $tien = $productCart->price_sale * $carts[$productCart->id];
                                        $tongtien += $tien;
                                    } else {
                                        $tien = $productCart->price * $carts[$productCart->id];
                                        $tongtien += $tien;
                                    }

                                    ?>
                                    <tr class="table_row" style="padding-top: 15px; padding-bottom: 15px;">
                                        <td class="column-1 " style="padding-left: 10px; padding-bottom: 0;">
                                            <div class="how-itemcart1">
                                                <img src="{{$productCart->image}}" alt="IMG">
                                            </div>
                                        </td>
                                        <td class="column-2">{{$productCart->name}}</td>

                                        <td class="column-3">{{number_format(($productCart->price_sale != 0 ? $productCart->price_sale : $productCart->price),0,',','.') }}&nbsp;đ</td>
                                        <td class="column-4">
                                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product" min="1" type="number" name="num_product[{{$productCart->id}}]" value="{{ $carts[$productCart->id] }}" required>

                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="column-5" class=""> {{ number_format($tien,0,',','.') }}&nbsp;đ</td>
                                        <td class="p-r-25">
                                            <a class="btn btn-danger btn-sm" href="/cartdelete/{{$productCart->id}}">
                                                <i class=" fa fa-window-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <div class="flex-w flex-t  p-b-13">
                                    <div class="size-200">
                                        <span class="stext-105 cl2">
                                            Subtotal: {{' '.$dem}}
                                        </span>
                                    </div>

                                    <div class="size-200">
                                        <span class="mtext-101 cl2 p-l-30">
                                            Total: {{ number_format($tongtien,0,',','.') }}&nbsp;đ

                                        </span>
                                    </div>

                                </div>



                            </div>




                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input formaction=" /deleteall-cart" type="submit" name="" value="Delete all" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3  trans-04 pointer m-tb-10  ">
                                <input formaction=" /update-cart" type="submit" name="" value="Update Cart" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10 m-l-20 m-r-20">
                                <button class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15  trans-04 pointer m-tb-5">
                                    Thanh toán
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </form>

<?php
} else {
?> <div class="p-t-30">
        <h2 style="text-align: center;">Giỏ hàng rỗng</h2>
    </div>
<?php
}
?>

<div class="btn-back-to-top" id="myBtn" style="display: flex;">
    <span class="symbol-btn-back-to-top">
        <i class="zmdi zmdi-chevron-up"></i>
    </span>
</div>
@endsection
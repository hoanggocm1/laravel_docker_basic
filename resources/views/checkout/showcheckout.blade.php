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

use Illuminate\Support\Facades\Session;

if ((Session::get('customer')) != null) {
    if ((Session::get('carts')) != null) {
        $dem = count(Session::get('carts'));
?>


        <form action="/checkout1" method="post">
            <div class="container">

                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
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

                                        </tr>



                                        @php $tongtien = 0;

                                        @endphp
                                        @foreach($product as $productCart1)
                                        @foreach($productCart1 as $productCart)
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
                                            <td class="column-3">{{$productCart->price_sale != 0 ? $productCart->price_sale : $productCart->price}}</td>
                                            <td class="column-4">
                                                <div class=" flex-w  ">
                                                    <div type="" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m hidden">

                                                    </div>

                                                    <input class="mtext-104 cl3 txt-center" name="num_product[{{$productCart->id}}]" value="{{ $carts[$productCart->id] }} " readonly>


                                                </div>
                                            </td>

                                            <td class="column-5" class=""> {{ number_format($tien,0,',','.') }}&nbsp;đ</td>

                                        </tr>
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @csrf

                        </div>
                    </div>

                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-20 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                            <h4 class="mtext-109 cl2 p-b-30">
                                Cart Totals
                            </h4>

                            <div class="flex-w flex-t bor12 p-b-13">
                                <div class="size-200">
                                    <span class="stext-105 cl2">
                                        Subtotal: {{' '.$dem}}
                                    </span>
                                </div>
                                <div class="size-200">
                                    <span class="mtext-101 cl2 p-l-20">

                                        Total: {{ number_format($tongtien,0,',','.') }}&nbsp;đ

                                    </span>
                                </div>
                            </div>

                            <!-- bor12 (class nay se cat ngang dut khuc) -->
                            <div class="flex-w flex-t  p-t-15 p-b-30" style="padding-bottom: 0px;">
                                <div class="size-208 w-full-ssm">
                                    <span class="stext-110 cl2">
                                        Shipping:
                                    </span>
                                </div>

                                <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                    <!-- <p class="stext-111 cl6 p-t-2">
                                There are no shipping methods available. Please double check your address, or contact us if you need any help.
                                </p> -->

                                    <div class="p-t-15">
                                        <span class="stext-112 cl8">
                                            Detail Shipping
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <input type="hidden" name="price" value="{{$tongtien}}">
                            <div class=" form-group p-t-15" style="margin-bottom: unset;">

                                <input type="text" name="shipping_name" value="{{$customer->name}}" class="form-control " placeholder="Tên người nhận" required>
                            </div>
                            <div class="form-group p-t-15" style="margin-bottom: unset;">

                                <input type="number" name="shipping_phone" value="{{$customer->phone}}" class="form-control " placeholder="Số điện thoại" required>
                            </div>
                            <div class="form-group p-t-15" style="margin-bottom: unset;">

                                <input type="text" name="shipping_email" class="form-control " value="{{$customer->email}}" placeholder="Email" required>
                            </div>
                            <div class="form-group p-t-15" style="margin-bottom: unset;">
                                <label>Địa chỉ</label>
                                <textarea name="shipping_address" class="form-control" placeholder="Địa chỉ" required>{{$customer->address}}</textarea>
                            </div>
                            <div class="form-group p-t-15" style="margin-bottom: unset;">
                                <label>Ghi chú</label>
                                <textarea name="shipping_content" class="form-control" placeholder="Ghi chú">{{old('shipping_content')}}</textarea>
                            </div>

                            <div class="form-group p-t-15">
                                <label>Phương thức thanh toán</label>
                                <select class="form-control" name="order_method">
                                    <option value="0">Thanh toán bằng tiền mặt</option>

                                    <option value="1">Thanh toán bằng tài khoản ngân hàng</option>
                                </select>
                            </div>

                            <div class=" p-t-15">
                                <button class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15  trans-04 pointer m-tb-5">
                                    Thanh toán
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    <?php
    } else {
    ?> <div class="p-t-30">
            <h2 style="text-align: center;">Giỏ hàng trống</h2>
        </div>
    <?php
    }
} else {
    ?>
    <div class="p-t-30">
        <h2 style="text-align: center;">Quý khách vui lòng đăng nhập để có thể thanh toán!!!</h2>
        <h4 style="text-align: center; padding-top:10px ;"><a href="#" class="js-show-modal1 " style="color:green; text-align: center;">
                Đăng nhập tại đây.
            </a></h4>

    </div>
<?php } ?>

<div class="btn-back-to-top" id="myBtn" style="display: flex;">
    <span class="symbol-btn-back-to-top">
        <i class="zmdi zmdi-chevron-up"></i>
    </span>
</div>


@endsection
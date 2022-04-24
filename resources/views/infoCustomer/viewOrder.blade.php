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
<div class="table-agile-info">
    <div class="panel panel-default">

        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>

                        <th>Người nhận hàng</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Ghi chú</th>
                        <th>Ngày đặt hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($orderShipping as $shipping)

                        <td>{{$shipping->shipping_name}}</td>
                        <td>{{$shipping->shipping_address}}</td>
                        <td>{{$shipping->shipping_phone}}</td>
                        <td>{{$shipping->shipping_email}}</td>
                        <td>{{$shipping->shipping_content}}</td>
                        <td>{{$order1->order_time}}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="table-agile-info p-t-50">
    <div class="panel panel-default">
        <div class="table-responsive">
            <table class="table table-striped b-t b-lights">
                <thead>
                    <tr>
                        <!-- <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th> -->
                        <th class="aaa">Hình ảnh</th>
                        <th class="aaa">Tên sản phẩm</th>
                        <th class="aaa">Số lượng</th>
                        <th class="aaa">Giá sản phẩm</th>
                        <th class="aaa">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <div>
                        <div class="chitetdonhang">
                            @php
                            $tongthanhtoan = 0;
                            @endphp

                            @foreach($orderDetail as $key => $details)

                            <tr>
                                <td class="column-1 " style="padding-left: 10px; padding-bottom: 10;">
                                    <div class="how-itemcart1">
                                        <img src="{{$image[$key]}}" alt="IMG">
                                    </div>
                                </td>
                                <td class="aaa">{{$details->product_name}}</td>
                                <td class="aaa">{{$details->order_qty}}</td>
                                <td class="aaa">{{$details->order_price}}</td>
                                <td class="aaa">{{number_format($details->order_price * $details->order_qty,0,',','.')}} $</td>
                            </tr>
                            @php
                            $tongthanhtoan += $details->order_price * $details->order_qty;
                            @endphp

                            @endforeach
                        </div>




                    </div>
                </tbody>
            </table>
            <div class="tonghoadon" style="text-align: center;">
                <h3>
                    Tổng thanh toán: {{number_format($tongthanhtoan,0,',','.')}} đ
                </h3>
            </div>
            <a target="_blank" href="">In đơn hàng</a>
            <div class="button">
                <button onclick="load();" class="buttonne">a</button>
            </div>

        </div>
    </div>
</div>

@endsection
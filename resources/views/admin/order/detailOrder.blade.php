@extends('admin.main')
@section('content')

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
                        <th>Thời gian đặt hàng</th>
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


<div class="table-agile-info ">
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

                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $tongthanhtoan = 0;
                    @endphp
                    @foreach($orderDetail as $details)
                    <tr>
                        <td>{{$details->product_name}}</td>
                        <td>{{$details->order_qty}}</td>
                        <td>{{$details->order_price}}</td>
                        <td>{{number_format($details->order_price * $details->order_qty,0,',','.')}} $</td>
                    </tr>
                    @php
                    $tongthanhtoan += $details->order_price * $details->order_qty;
                    @endphp
                    @endforeach
                    <tr>
                        <td colspan="2">
                            Tong thanh toán: {{number_format($tongthanhtoan,0,',','.')}} $
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <select class="form-control" style="width: 180px;" name="order_method">

                                <option value="0" {{$order1->order_status == 0 ? 'selected' : ''}}>Đơn hàng mới</option>
                                <option value="1" {{$order1->order_status == 1 ? 'selected' : ''}}>Đã xử lý</option>
                                <option value="2" {{$order1->order_status == 2 ? 'selected' : ''}}>Đã giao</option>


                            </select>

                        </td>
                    </tr>
                </tbody>
            </table>
            <a target="_blank" href="">In đơn hàng</a>
        </div>
    </div>
</div>
@endsection
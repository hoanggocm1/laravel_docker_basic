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
<form action="/loadmore" method="post">
    <div class="container">

        <div class="row">


            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50 p-t-30">
                <div class="bor10 p-lr-20 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30" style="text-align: center;">
                        information
                    </h4>

                    <div class="flex-w flex-t  p-b-13">
                        <div class="size-200">
                            <span class="stext-105 cl2">
                                Name: {{$customer->name}}
                            </span>
                        </div>
                    </div>
                    <div class="flex-w flex-t p-b-13">
                        <div class="size-200">
                            <span class="stext-105 cl2">
                                Email: {{$customer->email}}
                            </span>
                        </div>
                    </div>
                    <div class="flex-w flex-t p-b-13">
                        <div class="size-200">
                            <span class="stext-105 cl2">
                                Phone: {{$customer->phone}}
                            </span>
                        </div>
                    </div>
                    <div class="flex-w flex-t p-b-13">
                        <div class="size-200">
                            <span class="stext-105 cl2">
                                Address: {{$customer->address}}
                            </span>
                        </div>
                    </div>
                    <div class="flex-w flex-t p-b-13">
                        <div class="size-200">
                            <span class="stext-105 cl2">
                                Password: ********
                            </span>
                        </div>
                        <div class="size-200">
                            <a href="/doimatkhau" style="color: red;" class="stext-105 cl2 p-l-20">
                                Đổi mật khẩu.
                            </a>
                        </div>

                    </div>
                    <div class=" p-t-15" style="text-align: center;">
                        <button style="display: inline-block;" class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15  trans-04 pointer m-tb-5">
                            Sửa thông tin
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50 p-t-30">
                <h3 style="text-align: center;">Đơn hàng đã đặt</h3>
                <br />
                <div class=" m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">

                        <table class="table-shopping-cart " style="min-width: 640px;">

                            <tbody>


                                <tr class="table_head">
                                    <th class="" style="padding-left: 10px; width: 80px;">ID</th>
                                    <th class="" style="width: 90px;">Type</th>
                                    <th class="" style="width: 100px;">Method</th>
                                    <th class="" style="width: 120px;">Status</th>
                                    <th class="" class="p-l-1500" style="width: 220px; padding-left: 35px;">Date</th>
                                    <th class="" style="width: 20px;"></th>
                                </tr>
                                @foreach($order as $ordera)
                                <tr class="table_row" style="padding-top: 15px; padding-bottom: 15px; height: 110px;">
                                    <td class="" style="padding-left: 10px; padding-bottom: 20;">
                                        {{$ordera->id}}
                                    </td>
                                    <td class=""> {{$ordera->loai_mathang}}</td>
                                    <td class="">{{$ordera->order_method == 0 ? 'Cash' : 'Bank'}}</td>
                                    <td class="">{{$ordera->order_status == 3 ? 'Delivered' : 'Processing'}}</td>
                                    <td class="" class="">{{$ordera->order_time}}</td>
                                    <td><a href="/viewOrder/{{$ordera->id}}" class="active styling-edit" ui-toggle-class="">
                                            <i class="fa fa-eye text-success text-active"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @csrf

                </div>
            </div>

        </div>
    </div>
</form>

@endsection
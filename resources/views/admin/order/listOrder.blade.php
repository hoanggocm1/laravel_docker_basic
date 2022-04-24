@extends('admin.main')
@section('content')

<div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>khách hàng</th>
                        <th>Phương thức thanh toán</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái</th>
                        <th style="width: 75px;"> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $value)
                    <tr>
                        <td>{{ $value->id}}</td>
                        <td>{{$value->customer_id}}</td>
                        <td> <?php
                                if ($value->order_method == 0) { ?>
                                <label style="color: green;">Thanh toán bằng tiền mặt </label>
                            <?php
                                } else { ?>
                                <label style="color: red;">Thanh toán bằng tài khoản ngân hàng </label>
                            <?php   } ?>

                        </td>
                        <td>{{$value->price}} $</td>
                        <td>{{$value->order_time}}</td>

                        <td>
                            <!-- <select class="form-control">
                                <?php
                                if ($value->order_status == 0) { ?>

                                    <option value="2">Đã giao</option>
                                    <option value="1">Đã xử lý</option>
                                    <option value="0">Đơn hàng mới</option>
                                    <label style="color: green;">Đơn hàng mới</label>
                                <?php
                                } else if ($value->order_status == 1) { ?>
                                    <option value="2">Đã giao</option>
                                    <option value="0">Đơn hàng mới</option>
                                    <option value="1">Đã xử lý</option>


                                    <label style="color: blue;">Đã xử lý</label>


                                <?php   } else {
                                ?>

                                    <option value="1">Đã xử lý</option>
                                    <option value="0">Đơn hàng mới</option>
                                    <option value="2    ">Đã giao</option>
                                    <label style="color: red;">Đã giao</label>


                                <?php
                                } ?>
                            </select> -->
                            <select class="form-control">
                                <option value="0" {{ $value->order_status == 0 ? 'selected' : ''}}>Đơn hàng mới</option>
                                <option value="1" {{ $value->order_status == 1 ? 'selected' : ''}}>Đã xử lý</option>
                                <option value="2" {{ $value->order_status == 2 ? 'selected' : ''}}>Đã giao</option>
                            </select>

                            <!-- <select class="form-control" style="width: 180px;" name="order_method">

                                <option value="0" {{$value->order_status == 0 ? 'selected' : ''}}>Đơn hàng mới</option>
                                <option value="1" {{$value->order_status == 1 ? 'selected' : ''}}>Đã xử lý</option>
                                <option value="2" {{$value->order_status == 2 ? 'selected' : ''}}>Đã giao</option>


                            </select> -->


                        </td>




                        <td>
                            <a class="" href="/admin/order/vieworder/{{$value->id}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="" href="/admin/order/vieworder/{{$value->order_code}}">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">

                    </ul>
                </div>
            </div>
        </footer>

        @endsection
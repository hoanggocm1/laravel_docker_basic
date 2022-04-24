<div>
    <h1>{{$name}}</h1>
    <h2 style="color: greenyellow;">Hi bạn. Shop đã nhận được đơn hàng của bạn.</h2>
</div>
<h3 style="color: red; padding-left: 30%;">Thông tin đơn hàng:</h3>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="table-responsive" style="text-align: center;justify-content: center;align-items: center;">
            <table class="table table-striped b-t b-light" style=" min-width: 640px;border: 2px solid red;">
                <tbody>
                    <tr>
                        <th style="padding-left: 10px; width: 80px;">Mã khách hàng</th>
                        <th style="width: 90px;">Số loại</th>
                        <th style="width: 100px;">Hình thức thanh toán</th>
                        <th style="width: 120px;">Trạng thái đơn hàng</th>
                        <th style="width: 120px;">Ngày đặt hàng</th>
                        <th style="width: 220px; padding-left: 35px;">Tổng giá</th>
                        <th class="" style="width: 120px;">Xem chi tiết đơn hàng tại đây</th>
                    </tr>
                    <tr style="padding-top: 15px; padding-bottom: 15px; height: 110px;">

                        <td>{{$order1->customer_id}}</td>
                        <td> {{$order1->loai_mathang}}</td>
                        <td>{{$order1->order_method == 0 ? 'Tiền mặt' : 'Thẻ ngân hàng'}}</td>
                        <td>{{$order1->order_status == 3 ? 'Đã giao' : 'Đang xử lý'}}</td>
                        <td>{{$order1->order_time}}</td>

                        <td> {{number_format($tong,0,',','.')}} đ</td>
                        <td>
                            <p>http://shopbanhang.test/viewOrder/{{$order1->id}}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="table-responsive" style="text-align: center;justify-content: center;align-items: center;">
            <table class="table table-striped b-t b-light" style=" min-width: 640px;border: 2px solid red;">
                <tbody>
                    <tr>
                        <th style="padding-left: 10px; width: 80px;">Người nhận hàng</th>
                        <th style="width: 90px;">Địa chỉ</th>
                        <th style="width: 100px;">Số điện thoại</th>
                        <th style="width: 120px;">Email</th>
                        <th style="width: 180px;padding-left: 10px;">Ghi chú</th>
                        <th style="width: 220px; padding-left: 35px;">Ngày đặt hàng</th>
                    </tr>
                    <tr style="padding-top: 15px; padding-bottom: 15px; height: 110px;">

                        <td>{{$order_shipping->shipping_name}}</td>
                        <td>{{$order_shipping->shipping_address}}</td>
                        <td>{{$order_shipping->shipping_phone}}</td>
                        <td>{{$customer_email}}</td>
                        <td>{{$order_shipping->shipping_content}}</td>
                        <td>{{$order1->order_time}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<h4 style="color: black;">Rất cảm ơn bạn đã tin tưởng cửa hàng. Chúng tôi sẽ xử lý đơn hang nhanh nhất có thể. </h4>
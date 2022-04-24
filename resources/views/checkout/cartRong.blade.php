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

?>
    <h2 style="text-align: center;" class="p-t-25">Giỏ hàng của bạn đang rỗng, không thể thanh toán. Vui lòng thêm sản phẩm!</h2>

<?php

} else {
?>
    <div class="p-t-30">
        <h2 style="text-align: center;">Quý khách vui lòng đăng nhập có để thể thanh toán!!!</h2>
        <h4 style="text-align: center; padding-top:10px ;"><a href="#" class="js-show-modal1 " style="color:green; text-align: center;">
                Đăng nhập tại đây.
            </a></h4>

    </div>
<?php } ?>
@endsection
<!DOCTYPE html>
<html lang="en">
@include('head')

<body class="animsition">

    <!-- Header -->
    @include('header')
    <?php

    use Illuminate\Support\Facades\Session;

    $a1 = (Session::get('carts'));
    $tongmini = 0;

    ?>
    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div class="header-cart flex-col-l p-l-30 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Giỏ hàng
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                    <?php

                    if ($a1 != null) {

                    ?>
                        @foreach($cartsmini as $valuemini)
                        <?php
                        if ($valuemini->price_sale == 0) {
                            $tienmini = $valuemini->price;
                        } else {
                            $tienmini = $valuemini->price_sale;
                        }
                        ?>

                        <li class="header-cart-item flex-w flex-t m-b-12">

                            <div class="header-cart-item-img">
                                <img src="{{$valuemini->image}}" alt="IMG">

                            </div>

                            <div class="header-cart-item-txt p-t-3" style="width: calc(100% - 107px);">
                                <a href="/san-pham/{{$valuemini->id}}-{{ Str::slug($valuemini->name),'-' }}.html" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                    {{$valuemini->name}}
                                </a>
                                <span class="header-cart-item-info">
                                    {{$a1[$valuemini->id]}} x {{$tienmini}}
                                </span>
                                <span class="header-cart-item-info">
                                    Gia : {{$giamini = $a1[$valuemini->id] * $tienmini}}
                                </span>

                            </div>


                            <div class="" style="margin-bottom: -25px;">
                                <a style="color: red;" href="/cartdelete/{{$valuemini->id}}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                    X
                                </a>
                            </div>

                        </li>
                        @php
                        $tongmini += $giamini;
                        @endphp
                        @endforeach
                    <?php
                    } else {
                    ?></br>
                        <h4 style="height: 200px; text-align: center;"> Giỏ hàng của bạn đang rỗng! </h4>
                    <?php }
                    ?>

                </ul>

                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Total: {{$tongmini}} $
                    </div>

                    <div class="header-cart-buttons flex-w w-full p-l-20">
                        <a href="/addcart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            Giỏ hàng
                        </a>

                        <a href="/showcheckoutheader" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Thanh toán
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider -->
    @include('slider')
    <!-- Banner -->
    <!-- Product -->
    <section class="bg0 p-t-30 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h2 class=" cl5 p-t-b-20" style="text-align: center;">
                    Sản phẩm mới
                </h2>
            </div>
            <div id="asssssssssss">
                @include('product.list')
            </div>


            <!-- Load more -->
            <div class=" flex-c-m flex-w w-full p-t-45" id="button-loadmore">
                <input type="hidden" value="1" id="page1">
                <a onclick="loadmore();" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04" id="loading">
                    Load More
                </a>
            </div>
        </div>
    </section>


    <!-- Footer -->
    @include('footer')

</body>

</html>
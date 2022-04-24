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
                            <div class="p-t-30" style="margin-bottom: -25px;">
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



    <!-- Banner -->



    <!-- Product -->

    <section class="bg0 p-t-23 p-b-140 p-t-70">
        <div class="container">


            <div class="flex-w flex-sb-m p-b-52">
                <!-- <div class="flex-w flex-l-m filter-tope-group m-tb-10">


                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                        Women
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
                        Men
                    </button>


                </div>

                <div class="flex-w flex-c-m m-tb-10 p-t-40">
                    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Filter
                    </div>

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Search
                    </div>
                </div> -->

                <!-- Search product -->
                <!-- <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>

                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
                    </div>
                </div> -->

                <!-- Filter -->
                <!-- <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Sort By
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="{{ request()->url() }}" class="filter-link stext-106 trans-04">
                                        Default
                                    </a>
                                </li>





                                <li class="p-b-6">
                                    <a href="{{ request()->fullUrlWithQuery(['price' => 'asc']); }}" class="filter-link stext-106 trans-04">
                                        Price: Low to High
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{ request()->fullUrlWithQuery(['price' => 'desc']); }}" class="filter-link stext-106 trans-04">
                                        Price: High to Low
                                    </a>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div> -->
            </div>
            @include('alert')

            @yield('content')




        </div>

        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
            <!-- <input type="hidden" value="1" id="page"> -->
            <!-- <a onclick="Loadmore()" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    Load More
                </a> -->


        </div>
        </div>
    </section>


    <!-- Footer -->
    @include('footer')

</body>

</html>
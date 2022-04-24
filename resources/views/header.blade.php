@php $a1=\App\Helpers\Helper::getMenu($menus); @endphp
<header>
    <?php

    use Illuminate\Support\Facades\Session;
    use phpDocumentor\Reflection\DocBlock\Tags\See;

    $dem1 = 0;
    $customer = Session::get('customer');
    $carts = Session::get('carts');
    if (Session::get('carts') == null) {
        $dem1 = 0;
    } else {
        $dem1 += count(Session::get('carts'));
    }


    ?>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->


        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="/" class="logo">
                    <img src="/template/images/icons/logo-01.png" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop    class="sub-menu" -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class=""><a href="/">Trang chủ</a></li>
                        {!! $a1!!}
                        <li class=""><a href="/addcart">Giỏ hàng</a></li>
                        <li class=""><a href="/showcheckoutheader">Thanh toán




                            </a>
                            <ul class="sub-menu">
                                <li>12</li>
                                <li>12</li>
                                <li>12</li>
                                <li>12</li>
                            </ul>
                        </li>
                        <?php
                        if ($customer != null) {
                        ?>
                            <li class=""><a href="/infoCustomer/{{$customer->id}}">Thông tin tài khoản</a></li>
                        <?php
                        }
                        ?>
                        <!-- <li class="active-menu">
                            <a href="index.html">Home</a>
                            <ul class="sub-menu">
                                <li><a href="index.html">Homepage 1</a></li>
                                <li><a href="home-02.html">Homepage 2</a></li>
                                <li><a href="home-03.html">Homepage 3</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="product.html">Shop</a>
                        </li>

                        <li class="label1" data-label1="hot">
                            <a href="shoping-cart.html">Features</a>
                        </li>

                        <li>
                            <a href="blog.html">Blog</a>
                        </li>

                        <li>
                            <a href="about.html">About</a>
                        </li>

                        <li>
                            <a href="contact.html">Contact</a>
                        </li> -->
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m ">


                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div id="demminiCart" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{$dem1}} ">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                    <?php
                    $a = Session::get('customer');

                    if ($a != null) { ?>
                        <a href="/dang-xuat" class="" style="color:red;">
                            Đăng xuất

                        </a>

                    <?php } else {
                    ?>
                        <a href=" #" class="js-show-modal1 p-l-10" style="color:green;">
                            Đăng nhập
                        </a>
                    <?php
                    }
                    ?>
                    <!-- <a href=" #" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                            <i class="zmdi zmdi-favorite-outline"></i>
                        </a> -->
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="index.html"><img src="/template/images/icons/logo-01.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{$dem1 }}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <?php
            $a = Session::get('customer');

            if ($a != null) { ?>
                <a href="/dang-xuat" class="" style="color:red;" data-notify="{{$dem1 }}">
                    Đăng xuất

                </a>

            <?php } else {
            ?>
                <a href="#" class="js-show-modal1 p-l-10" style="color:green;" data-notify="{{$dem1 }}">
                    Đăng nhập
                </a>
            <?php
            }
            ?>

            <!-- <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a> -->
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu">
            <li class="active-menu"><a href="/">Trang chủ</a></li>

            {!!$a1!!}
            <li class="active-menu"><a href="/addcart">Giỏ hàng</a></li>
            <li class="active-menu"><a href="/showcheckoutheader">Thanh toán</a></li>
            <?php
            if ($customer != null) {
            ?>
                <li class="active-menu"><a href="/infoCustomer/{{$customer->id}}">Thông tin tài khoản</a></li>
            <?php
            }
            ?>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="/template/images/icons/icon-close2.png" alt="CLOSE">
                </button>

                <input class="plh3" type="text" name="search" placeholder="Search...">

            </form>
        </div>
    </div>
</header>
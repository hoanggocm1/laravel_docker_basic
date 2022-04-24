@extends('menu')
@section('content')
@foreach($getProduct as $value)
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-0 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
            {{$value->menu->name}}
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>


        <span class="stext-109 cl4">
            {{$value->name}}
        </span>

    </div>
</div>

<div>
    <section class="sec-product-detail bg0 p-t-50 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                            <div class="slick3 gallery-lb">
                                @foreach($getImageProduct as $imageProduct)
                                <div class="item-slick3" data-thumb="{{$imageProduct->image_product}}">
                                    <div class="wrap-pic-w pos-relative">

                                        <img src="{{$imageProduct->image_product}}" alt="IMG-PRODUCT">
                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{$imageProduct->image_product}}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                                <!-- <div class="item-slick3" data-thumb="{{$value->image}}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{$value->image}}" alt="IMG-PRODUCT">
                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{$value->image}}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="item-slick3" data-thumb="{{$value->image}}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{$value->image}}" alt="IMG-PRODUCT">
                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{$value->image}}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{$value->name}}
                        </h4>
                        <span class="mtext-106 cl2" style="display: flex;">
                            <?php
                            if ($value->price_sale != 0) {
                            ?>
                                <div style="padding-right:10%; font-size: 150%;">

                                    {{ number_format($value->price_sale,0,',','.') }}&nbsp;đ
                                </div>
                                <div style="align-self: center; text-decoration-line:line-through">

                                    {{ number_format($value->price,0,',','.') }}&nbsp;đ
                                </div>
                            <?php } else {
                            ?>
                                <div>

                                    {{ number_format($value->price,0,',','.') }}&nbsp;đ
                                </div>
                            <?php
                            }
                            ?>
                        </span>
                        <p class="stext-102 cl3 p-t-23">
                            {{$value->content}}
                        </p>
                        <!--  -->
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <form action="/add-cart" method="post">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10" style="width: 158px;">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>
                                            <input class="mtext-104 cl3 txt-center num-product" type="number" min="1" name="num_product" value="1">
                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                        <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-1 trans-04 js-addcart-detail">
                                            Add to cart
                                        </button>
                                        <input type="hidden" name="product_id" value="{{$value->id}}">
                                        @csrf
                                    </form>
                                    <a href="/addcart" name="" style="min-width: 162px;" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-20 b-lr-10 trans-04 pointer m-tb-10  m-r-20">Vào giỏ hàng</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                        </li>
                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 cl6">
                                    {{$value->description}}
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                    <div class="p-b-30 m-lr-15-sm">
                                        <!-- Review -->
                                        <div class="flex-w flex-t p-b-68">
                                            <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                                <img src="/template/images/avatar-01.jpg" alt="AVATAR">
                                            </div>
                                            <div class="size-207">
                                                <div class="flex-w flex-sb-m p-b-17">
                                                    <span class="mtext-107 cl2 p-r-20">
                                                        Ariana Grande
                                                    </span>
                                                    <span class="fs-18 cl11">
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star-half"></i>
                                                    </span>
                                                </div>
                                                <p class="stext-102 cl6">
                                                    Quod autem in homine praestantissimum atque optimum est, id deseruit. Apud ceteros autem philosophos
                                                </p>
                                            </div>
                                        </div>
                                        <form class="w-full">
                                            <h5 class="mtext-108 cl2 p-b-7">
                                                Add a review
                                            </h5>
                                            <p class="stext-102 cl6">
                                                Your email address will not be published. Required fields are marked *
                                            </p>
                                            <div class="flex-w flex-m p-t-50 p-b-23">
                                                <span class="stext-102 cl3 m-r-16">
                                                    Your Rating
                                                </span>
                                                <span class="wrap-rating fs-18 cl11 pointer">
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                    <input class="dis-none" type="number" name="rating">
                                                </span>
                                            </div>
                                            <div class="row p-b-25">
                                                <div class="col-12 p-b-5">
                                                    <label class="stext-102 cl3" for="review">Your review</label>
                                                    <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                                </div>
                                                <div class="col-sm-6 p-b-5">
                                                    <label class="stext-102 cl3" for="name">Name</label>
                                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
                                                </div>
                                                <div class="col-sm-6 p-b-5">
                                                    <label class="stext-102 cl3" for="email">Email</label>
                                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
                                                </div>
                                            </div>
                                            <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                                Submit
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endforeach
<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Related Products
            </h3>
        </div>
        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                @foreach($getRelated as $value1)
                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <form action="/add-cart" method="post">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{$value1->image}}" width="300px" height="auto" alt="IMG-PRODUCT">
                            </div>
                            <div class="block2-txt flex-w flex-t p-t-14">


                                <div class="block2-txt-child1 flex-col-l ">

                                    <a href="/san-pham/{{$value1->id}}-{{ Str::slug($value1->name),'-' }}.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="width: 90%;">
                                        {{$value1->name}}
                                    </a>
                                    <span class="stext-105 cl3" style="display:flex; position: relative; width: 35%;">
                                        <?php
                                        if ($value1->price_sale != 0) {
                                        ?>
                                            <div style="padding-right:30%; font-size: 150%;">

                                                {{ number_format($value1->price_sale,0,',','.') }}&nbsp;đ
                                            </div>
                                            <div style="align-self: center; text-decoration-line:line-through">
                                                {{ number_format($value1->price,0,',','.') }}&nbsp;đ
                                            </div>
                                        <?php } else {
                                        ?>
                                            <div>

                                                {{ number_format($value1->price,0,',','.') }}&nbsp;đ
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </span>
                                </div>



                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <input type="hidden" name="product_id" value="{{$value1->id}}">
                                    <input type="hidden" name="num_product" min="1" value="1">
                                    <button type="submit" class="flex-c-m stext-101 cl0  bg1 bor1 hov-btn1 p-lr-1 trans-04" style="min-width: 55px;height: 30px;">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </button>
                                    @csrf
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
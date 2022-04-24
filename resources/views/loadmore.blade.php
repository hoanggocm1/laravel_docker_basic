@extends('menu')
@section('content')

<section class="bg0 p-t-30 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h2 class=" cl5 p-t-b-20" style="text-align: center;">
                Sản phẩm mới
            </h2>
        </div>
        <form action="/add-cart" method="post">
            <div class="row isotope-grid">

                @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item" id="LoadProduct111">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="uploads/products/{{$product->image}}" height="400px" alt="IMG-PRODUCT">
                        </div>
                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="/san-pham/{{$product->id}}-{{ Str::slug($product->name),'-' }}.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{$product->name}}
                                </a>

                                <span class="stext-105 cl3">
                                    <?php
                                    if ($product->price_sale != 0) {
                                    ?>
                                        {{$product->price_sale}}
                                    <?php } else {
                                        echo $product->price;
                                    }
                                    ?>
                                </span>
                            </div>
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="num_product" value="1">
                            <div class="block2-txt-child2 flex-r p-t-3">
                                <button type="submit" class="flex-c-m stext-101 cl0  bg1 bor1 hov-btn1 p-lr-1 trans-04" style="min-width: 55px;height: 30px;">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </button>
                                @csrf
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="flex-c-m flex-w w-full p-t-45">

                <!-- <a onclick="loadmore();" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    Load More
                </a> -->
            </div>
        </form>

    </div>
</section>








@endsection
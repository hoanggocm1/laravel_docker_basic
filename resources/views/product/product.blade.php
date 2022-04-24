@extends('menu')
@section('content')

<div class="row isotope-grid">
    <?php if ($menu1->parent_id == 0) { ?>
        <form action="/add-cart" method="post">
            @foreach($ProductMenu1 as $product1)
            @foreach($product1 as $product12)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{$product12->image}}" width="300px" height="auto" alt="IMG-PRODUCT">


                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">


                        <div class="block2-txt-child1 flex-col-l ">

                            <a href="/san-pham/{{$product12->id}}-{{ Str::slug($product12->name),'-' }}.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="width: 90%;">
                                {{$product12->name}}
                            </a>
                            <span class="stext-105 cl3" style="display:flex; position: relative; width: 35%;">
                                <?php
                                if ($product12->price_sale != 0) {
                                ?>
                                    <div style="padding-right:30%; font-size: 150%;">

                                        {{ number_format($product12->price_sale,0,',','.') }}&nbsp;đ
                                    </div>
                                    <div style="align-self: center; text-decoration-line:line-through">
                                        {{$product12->price}}&nbsp;$
                                    </div>
                                <?php } else {
                                ?>
                                    <div>
                                        {{ number_format($product12->price,0,',','.') }}&nbsp;đ

                                    </div>
                                <?php
                                }
                                ?>
                            </span>
                        </div>




                        <input type="hidden" name="product_id" value="{{$product12->id}}">
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
            @endforeach
        </form>

    <?php
    } else {
    ?>
        <form action="/add-cart" method="post">
            @foreach($ProductMenu as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product->menu_id}}">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{$product->image}}" width="300px" height="auto" alt="IMG-PRODUCT">


                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">

                            <a href="/san-pham/{{$product->id}}-{{ Str::slug($product->name),'-' }}.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="width: 90%;">
                                {{$product->name}}
                            </a>
                            <span class="stext-105 cl3" style="display:flex; position: relative; width: 35%;">
                                <?php
                                if ($product->price_sale != 0) {
                                ?>
                                    <div style="padding-right:30%; font-size: 150%;">

                                        {{ number_format($product->price_sale,0,',','.') }}&nbsp;đ
                                    </div>
                                    <div style="align-self: center; text-decoration-line:line-through">
                                        {{$product->price}}&nbsp;$
                                    </div>
                                <?php } else {
                                ?>
                                    <div>

                                        {{ number_format($product->price,0,',','.') }}&nbsp;đ
                                    </div>
                                <?php
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
        </form>
    <?php }
    ?>

</div>
<!-- <div class=" flex-c-m flex-w w-full p-t-45" id="button-loadmore">
    <input type="hidden" value="1" id="page1">
    <a onclick="loadmore();" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04" id="loađing">
        Load More
    </a>
</div> -->
@endsection
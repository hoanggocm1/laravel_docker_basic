<div class="row isotope-grid">
    @foreach($products as $product)
    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
        <form action="/add-cart" method="post">

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

                                    {{ number_format($product->price,0,',','.') }}&nbsp;đ
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
                    <input id="numberProductCart" type="hidden" name="num_product" min="1" value="1">
                    <div class="block2-txt-child2 flex-r p-t-3">
                        <a onclick="addGiohang('{{$product->id}}');" type="submit" class="flex-c-m stext-101 cl0  bg1 bor1 hov-btn1 p-lr-1 trans-04" style="min-width: 55px;height: 30px; cursor: pointer;">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </a>

                        <!-- <button type="submit" class="flex-c-m stext-101 cl0  bg1 bor1 hov-btn1 p-lr-1 trans-04" style="min-width: 55px;height: 30px;">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </button> -->

                        @csrf
                    </div>
                </div>
            </div>
        </form>
    </div>

    @endforeach
</div>
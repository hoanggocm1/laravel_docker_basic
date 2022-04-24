@foreach($ProductHome as $product)
<form action="">
    <div class="">
        <!-- Block2 -->
        <div class="block2">
            <div class="">
                <img src="uploads/products/{{$product->image}}" width="300px" height="200px">
            </div>

            <div class="">
                <div class="">
                    <a href=" /san-pham/{{$product->id}}-{{ Str::slug($product->name),'-' }}.html" class="">
                        {{$product->name}}
                    </a>

                    <span class="">
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
                <div class="">
                    <button type="submit" class="">
                        <i class=""></i>
                    </button>
                    @csrf
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
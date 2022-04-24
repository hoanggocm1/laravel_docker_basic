<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template/css/testAPI.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <title>Document</title>

</head>

<body>
    <section class="top">
        <div class="container">
            <h1>Danh sách sản phẩm</h1>
            <div class="products">
                <table class="table-product" id="bodyListProducts">
                </table>
            </div>
        </div>
    </section>
    <section class="addProduct" style="display: flex;">
        <div class="themsanpham" style="width: 50%;">
            <h1>them san pham</h1>
            <form class="form-input" id="formInputProduct" method="post">

                <div class="addname">
                    <label>name</label>
                    <div class="name">
                        <input type="text" name="name" placeholder="name">
                    </div>
                </div>
                <div class="adddescription">
                    <label>description</label>
                    <div class="name">
                        <textarea name="description" placeholder="description" id=""></textarea>

                    </div>
                </div>
                <div class="addprice">
                    <label>price</label>
                    <div class="name">
                        <input type="number" name="price" placeholder="price">
                    </div>
                </div>
                <div class="addprice_sale">
                    <label>price_sale</label>
                    <div class="name">
                        <input name="price_sale" type="number" placeholder="price_sale">
                    </div>
                </div>
                @csrf
                <button>Them</button>


            </form>
        </div>
        <div class="suasanpham" style="width: 50%;">
            <h1>Sua san pham</h1>
            <form class="form-input" id="editProduct" method="post">

                <div class="addname">
                    <label>ID ( khong thay doi )</label>
                    <div class="name">
                        <input type="text" name="idproduct" id="idproduct" placeholder="name" readonly>
                    </div>
                </div>
                <div class="addname">
                    <label>name</label>
                    <div class="name">
                        <input type="text" name="editname" id="editname" placeholder="name">
                    </div>
                </div>
                <div class="adddescription">
                    <label>description</label>
                    <div class="name">
                        <textarea name="editdescription" type="text" placeholder="description" id="editdescription"></textarea>
                    </div>
                </div>
                <div class="addprice">
                    <label>price</label>
                    <div class="name">
                        <input type="number" name="editprice" id="editprice" placeholder="price">
                    </div>
                </div>
                <div class="addprice_sale">
                    <label>price_sale</label>
                    <div class="name">
                        <input type="number" name="editprice_sale" id="editprice_sale" placeholder="price_sale">
                    </div>
                </div>
                <div class="addprice_sale">
                    <label>Image</label>
                    <div class="name">
                        <img src="" id="imageProduct" alt="" width="200px">
                    </div>
                </div>

                @csrf
                <input type="hidden" id="ideditProduct">
                <button>Sua</button>


            </form>
        </div>

    </section>
</body>



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="/template/js/testAPI.js"></script>


</html>
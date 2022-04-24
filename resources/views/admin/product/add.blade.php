@extends('admin.main')
@section('content')

<form action="" method="POST" enctype="multipart/form-data">
    <div class="card-body">

        <div class="form-group">
            <label for="menu">Tên sản phẩm </label>
            <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Nhập tên sản phẩm">
        </div>

        <div class="form-group">
            <label>Danh mục</label>
            <select class="form-control" name="menu_id">
                @foreach($menus as $key => $menu)
                <option value="{{$menu->id}}">{{$menu->name}}</option>


                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Mô tả </label>
            <textarea name="content" class="form-control" placeholder="Điền mô tả">{{old('content')}}</textarea>
        </div>

        <div class="form-group">
            <label>Mô tả chi tiết</label>
            <textarea name="description" class="form-control" placeholder="Chi tiết">{{old('description')}}</textarea>
        </div>
        <div class="form-group">
            <label for="menu">Giá </label>
            <input type="text" name="price" value="{{old('price')}}" class="form-control" placeholder="Nhập giá">
        </div>
        <div class="form-group">
            <label for="menu">Giá giảm </label>
            <input type="text" name="price_sale" value="{{old('price_sale')}}" class="form-control" placeholder="Nhập giá giảm">
        </div>
        <div class="form-group">
            <label for="menu">File input</label>


            <input type="file" name="file1" value="{{old('file')}}" class="form-control" id="uploadImageProduct">
            <div id="image_change_name">

            </div>
            <div id="image_show">

            </div>
            <input type="hidden" name="file" id="file">

        </div>

        <div class="form-group">
            <label for="menu">File inputssss</label>


            <input type="file" name="file1s[]" value="{{old('file1s')}}" class="form-control" multiple="multiple" id="uploadImageProducts">

            <!-- <div id="images_change_name">

            </div> -->
            <input type="hidden" name="demImages" id="demImages">
            <div id="block_image" style="display: flex; ">






            </div>


        </div>




        <div class="form-group m-4">
            <label> Kích hoạt</label>
            <div class="form-group">

                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </div>
    @csrf
</form>
<input type="hidden" id="files0sss">
<button id="testbtm"></button>
@endsection
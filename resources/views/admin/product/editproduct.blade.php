@extends('admin.main')
@section('content')

<form action="" method="POST" enctype="multipart/form-data">
    <div class="card-body">
        @foreach($product as $value)
        <div class="form-group">
            <label for="menu">Tên sản phẩm </label>
            <input type="text" name="name" class="form-control" value="{{$value->name}}" placeholder="Nhập san pham">
        </div>

        <div class="form-group">
            <label>Danh mục</label>
            <select class="form-control" name="menu_id">
                @foreach($menus as $menu)
                <option value="{{$menu->id}}" {{ $value->menu_id == $menu->id ? 'selected' : ''}}>{{$menu->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Mô tả </label>
            <textarea name="description" class="form-control" placeholder="dien mo ta">{{$value->description}}</textarea>
        </div>

        <div class="form-group">
            <label>Mô tả chi tiết</label>
            <textarea name="content" class="form-control" placeholder="chi tiet">{{$value->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="menu">Giá </label>
            <input type="text" name="price" class="form-control" value="{{$value->price}}" placeholder="Nhập giá">
        </div>
        <div class="form-group">
            <label for="menu">Giá giảm </label>
            <input type="text" name="price_sale" class="form-control" value="{{$value->price_sale}}" placeholder="Nhập giá giảm">
        </div>

        <div class="form-group">
            <label for="menu">File input</label>


            <input type="file" name="file1" value="{{old('file1')}}" class="form-control" id="uploadImageProduct">
            <div id="image_change_name">
                <p style="float: left;">Đường đẫn của hình ảnh:&ensp;
                <p style="color:green; ">{{$value->image}} </p>
                </p>
            </div>
            <div id="image_show">
                <a href="{{$value->image}}" target="_blank">
                    <img src="{{$value->image}}" value="{{$value->image}}" width="100">
                </a>
            </div>
            <input type="hidden" name="file" id="file" value="{{$value->image}}">

        </div>

    </div>

    <div class="form-group m-4">
        <label> Kích hoạt</label>
        <div class="form-group">

            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" name="active" {{$value->active == 1 ? 'checked' : ''}}>
                <label for="active" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" {{$value->active == 0 ? 'checked' : ''}}>
                <label for="no_active" class="custom-control-label">Không</label>
            </div>
        </div>
        @endforeach
    </div>



    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Lưu chỉnh sửa</button>
    </div>
    @csrf
</form>
@endsection
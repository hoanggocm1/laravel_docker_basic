@extends('admin.main')
@section('content')

<form action="" method="POST" enctype="multipart/form-data">
    <div class="card-body">

        <div class="form-group">
            <label for="menu">Tên slider </label>
            <input type="text" name="name" class="form-control" value="{{$sliders->name}}">
        </div>



        <div class="form-group">
            <label>Mô tả </label>
            <textarea name="content" class="form-control" placeholder="dien mo ta">{{$sliders->content}}</textarea>
        </div>



        <div class="form-group">
            <label for="menu">File input</label>


            <input type="file" name="file1" value="{{old('file1')}}" class="form-control" id="uploadImageSlider">
            <div id="image_change_name_slider">
                <p style="float: left;">Đường đẫn của hình ảnh:&ensp;
                <p style="color:green; ">{{$sliders->image}} </p>
                </p>
            </div>
            <div id="image_show_slider">

                <a href="{{$sliders->image}}" target="_blank">
                    <img src="{{$sliders->image}}" value="{{$sliders->image}}" width="100">
                </a>
            </div>
            <input type="hidden" name="file_slider" id="file_slider" value="{{$sliders->image}}">

        </div>

        <div class=" form-group">
            <label for="menu">link</label>
            <input type="text" name="link" class="form-control" value="{{$sliders->link}}" placeholder="Nhập san pham">
        </div>
        <div class="form-group">
            <label for="menu">thu tu</label>
            <input type="number" name="thu_tu" min="1" value="{{$sliders->thu_tu}}" class="form-control" placeholder="Nhập san pham">
        </div>


        <div class="form-group m-4">
            <label> Kích hoạt</label>
            <div class="form-group">

                <div class="custom-control custom-radio">
                    <input class="custom-control-input" {{$sliders->active == 1 ? 'checked' : ''}} value="1" type="radio" id="active" name="active">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" {{$sliders->active == 0 ? 'checked' : ''}} type="radio" id="no_active" name="active">
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
    </div>

    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập nhật Slider</button>
    </div>
    @csrf
</form>
@endsection
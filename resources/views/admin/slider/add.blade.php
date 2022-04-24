@extends('admin.main')
@section('content')

<form action="" method="POST" enctype="multipart/form-data">
    <div class="card-body">

        <div class="form-group">
            <label for="menu">Tên slider </label>
            <input type="text" name="name" class="form-control" placeholder="Nhập tên slider">
        </div>



        <div class="form-group">
            <label>Mô tả </label>
            <textarea name="content" class="form-control" placeholder="Điền mô tả"></textarea>
        </div>



        <div class="form-group">
            <label for="menu">File input</label>


            <input type="file" name="file1" value="{{old('file')}}" class="form-control" id="uploadImageSlider">
            <div id="image_change_name_slider">

            </div>
            <div id="image_show_slider">

            </div>
            <input type="hidden" name="file_slider" id="file_slider">

        </div>


        <div class="form-group">
            <label for="menu">link</label>
            <input type="text" name="link" class="form-control" placeholder="Đường đẫn Slider">
        </div>
        <div class="form-group">
            <label for="menu">Thứ tự</label>
            <input type="number" name="thu_tu" min="1" class="form-control" placeholder="Thứ tự ">
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
        <button type="submit" class="btn btn-primary">Thêm Slider</button>
    </div>
    @csrf
</form>
@endsection
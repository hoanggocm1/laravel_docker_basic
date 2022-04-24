@extends('admin.main')
@section('content')

<form action="" method="POST" enctype="multipart/form-data">
    <div class="card-body">

        <div class="form-group">
            <label for="menu"> Tên admin </label>
            <input type="text" name="full_name_admin" class="form-control" value="{{$infoAdmin->full_name_admin}}" placeholder="Tên admin">
        </div>
        <div class="form-group">
            <label for="menu"> Số điện thoại </label>
            <input type="text" name="phone_admin" class="form-control" value="{{$infoAdmin->phone_admin}}" placeholder="Số điện thoại">
        </div>
        <div class="form-group">
            <label for="menu"> Email cá nhân </label>
            <input type="text" name="email_admin" class="form-control" value="{{$infoAdmin->email_admin}}" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="menu"> Địa chỉ </label>
            <input type="text" name="address" class="form-control" value="{{$infoAdmin->address}}" placeholder="Địa chỉ">
        </div>
        <div class="form-group">
            <label for="menu"> Chức vụ </label>
            <input type="text" name="position" class="form-control" value="{{$infoAdmin->position}}" placeholder="Chức vụ" readonly>
        </div>
        <div class="form-group">
            <label for="menu"> Năm sinh </label>
            <input type="number" name="year_of_birth" class="form-control" value="{{$infoAdmin->year_of_birth}}" placeholder="Năm sinh">
        </div>
        <div class="form-group">
            <label for="menu"> Học vấn </label>
            <input type="text" name="education" class="form-control" value="{{$infoAdmin->education}}" placeholder="Học vấn">
        </div>
        <div class="form-group">
            <label> Kĩ năng </label>
            <textarea name="skills" class="form-control" placeholder="chi tiet">{{$infoAdmin->skills}}</textarea>
        </div>
        <div class="form-group">
            <label> Ghi chú </label>
            <textarea name="description" class="form-control" placeholder="chi tiet">{{$infoAdmin->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="menu">Ảnh đại diện</label>


            <input type="file" name="file1" value="{{old('file1')}}" class="form-control" id="uploadAvatarAdmin">
            <div id="image_change_name_avataradmin">
                <p style="float: left;">Đường đẫn của hình ảnh:&ensp;
                <p style="color:green; ">{{$infoAdmin->avatar_admin}} </p>
                </p>
            </div>
            <div id="image_show_avatarAdmin">

                <a href="{{$infoAdmin->avatar_admin}}" target="_blank">
                    <img src="{{$infoAdmin->avatar_admin}}" value="{{$infoAdmin->avatar_admin}}" width="100">
                </a>
            </div>
            <input type="hidden" name="file_avatarAdmin" id="file_avatarAdmin" value="{{$infoAdmin->avatar_admin}}">
        </div>




    </div>


    <!-- <form action="demo_upload.php" enctype="multipart/form-data" method="POST">
        <input type="file" name="file[]" multiple />
        <p><input type="submit" name="upload"  value="Upload File" /></p>
    </form> -->

    <div class="card-footer" style="text-align: center;">
        <button type="submit" class="btn btn-primary">Lưu chỉnh sửa</button>
    </div>
    @csrf
</form>

@endsection
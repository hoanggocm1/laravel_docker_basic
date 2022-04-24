<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
</head>
@include('admin.alert')



<body style="margin:2% 7% 5% 7%">
    <div class="card card-default">
        <div class="card-header" style="background-color: #c2c2f7; display: flex;">
            <h3 class="card-title" style="width: 100%; ; font-size: 150%;display: flex;padding-left: 29.5%;">{{$title}}
                <p style="display: flex; color: blue;">&nbsp( Có thể bổ sung sau. )</p>
            </h3>
        </div>
        <form action="/create_info_admin/{{$user->id}}" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="menu"> Tên admin </label>
                        <input type="text" name="full_name_admin" class="form-control" value="{{$user->name}}" placeholder="Tên admin">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="menu"> Số điện thoại </label>
                        <input type="text" name="phone_admin" class="form-control" value="" placeholder="Số điện thoại">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="menu"> Email cá nhân </label>
                        <input type="text" name="email_admin" class="form-control" value="{{$user->email}}" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="menu"> Địa chỉ </label>
                        <input type="text" name="address" class="form-control" value="" placeholder="Địa chỉ">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="menu"> Chức vụ </label>
                        <input type="text" name="position" class="form-control" value="{{$user->position}}" placeholder="" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="menu"> Năm sinh </label>
                        <input type="number" name="year_of_birth" class="form-control" value="" placeholder="Năm sinh">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="menu"> Học vấn </label>
                        <input type="text" name="education" class="form-control" value="" placeholder="Học vấn">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-5">
                        <label> Kĩ năng </label>
                        <textarea name="skills" class="form-control" placeholder="Kĩ năng"></textarea>
                    </div>
                    <div class="form-group col-md-7">
                        <label> Ghi chú </label>
                        <textarea name="description" class="form-control" placeholder="Ghi chú"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="menu">Ảnh đại diện</label>
                    <input type="file" name="file1" value="{{old('file1')}}" class="form-control" id="uploadAvatarAdmin">
                    <div id="image_change_name_avataradmin">
                    </div>
                    <div id="image_show_avatarAdmin">
                    </div>
                    <input type="hidden" name="file_avatarAdmin" id="file_avatarAdmin" value="">
                </div>
                <div class="card-footer" style="text-align: center;">
                    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                </div>
            </div>
            <input type="hidden">
            @csrf
        </form>

        @include('admin.footer')

    </div>
</body>

</html>
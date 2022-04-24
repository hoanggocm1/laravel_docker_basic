<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
</head>
@include('admin.alert')



<body style="margin:2% 7% 5% 7%">
    <div class="card card-default">
        <div class="card-header" style="background-color: #c2c2f7;">
            <h3 class="card-title" style="width: 100%; ; font-size: 150%;text-align: center;">{{$title}}

            </h3>
        </div>
        <form action="/create_password_admin/{{$user->id}}" method="post">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="menu"> Tên admin </label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="Tên admin" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="menu"> Email đăng nhập </label>
                        <input type="text" name="email_admin" class="form-control" value="{{$user->email}}" placeholder="Email" readonly>
                    </div>
                </div>

                <div class="form-group col-md-8" style="text-align: center; padding-left: 33%;">
                    <label for="menu"> Khởi tạo lại mật khẩu</label>
                    <input type="password" name="password" class="form-control" value="" placeholder="Mật khẩu mới" required>
                </div>
                <div class="form-group col-md-8" style="text-align: center; padding-left: 33%;">

                    <input type="password" name="password_confirm" class="form-control" value="" placeholder="Nhập lại mật khẩu mới" required>
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
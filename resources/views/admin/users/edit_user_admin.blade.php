@extends('admin.main')
@section('content')

<form action="/admin/updatePasswordAdmin/{{$id}}" method="POST" enctype="multipart/form-data">
    <div class="card-body">

        <div class="form-group">
            <label for="menu">Mật khẩu cũ </label>
            <input type="text" name="password_old" class="form-control" value="{{old('password_old')}}" placeholder="">
            <!-- @if($errors->has('password_old'))
            <span class="error-text">
                {{$errors->first('password_old')}}
            </span>
            @endif -->
        </div>


        <!-- <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div> -->


        <div class="form-group">
            <label>Mật khẩu mới </label>
            <input type="password" name="password_new" class="form-control" value="{{old('password_new')}}" placeholder="******">
            <!-- @if($errors->has('password_new'))
            <span class="error-text">
                {{$errors->first('password_new')}}
            </span>
            @endif -->

        </div>

        <div class="form-group">
            <label>Nhập lại mật khẩu mới </label>
            <input type="password" name="password_confirm" class="form-control" value="{{old('password_confirm')}}" placeholder="******">
            <!-- @if($errors->has('password_confirm'))
            <span class="error-text">
                {{$errors->first('password_confirm')}}
            </span>
            @endif -->
        </div>

    </div>

    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thay đổi mật khẩu</button>
    </div>
    @csrf
</form>
@endsection
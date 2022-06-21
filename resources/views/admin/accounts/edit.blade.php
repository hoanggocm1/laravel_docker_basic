@extends('admin.main')
@section('content')
<form method="POST">
    <div class="card-body">
        <div class="form-group">
            <label for="menu">Tên khách hàng </label>
            <input type="text" name="account_name" value="{{$account->account_name}}" class="form-control" placeholder="Nhập tên khách hàng">
        </div>
        <div class="form-group">
            <label>Địa chỉ </label>
            <textarea name="account_address" class="form-control" placeholder="Nhập địa chỉ">{{$account->account_address}}</textarea>
        </div>

        <div class="form-group">
            <label>Số điện thoại</label>
            <input type="number" name="account_phone" class="form-control" value="{{$account->account_phone}}" placeholder="Nhập số điện thoại"></input>
        </div>
        <div class="form-row">
            <div class="form-group col-md-1">
                <label>Ngày sinh</label>
            </div>
            <div class="form-group col-md-4">
                <input type="date" name="account_birth" value="{{$account->account_birth}}" class="form-control"></input>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Sửa thông tin khách hàng</button>
        </div>
        @csrf
    </div>
</form>

@endsection
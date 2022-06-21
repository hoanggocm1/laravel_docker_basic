@extends('admin.main')
@section('content')
<nav class="navbar navbar-light bg-light">
    <div class="form-inline">
        <input class="mtext-107 cl2 size-114 plh2 p-r-15 m-r-2" style="margin-right: 10px;" type="text" name="keyword" id="search_product_byName" placeholder="Tìm theo tên">
        <input class="mtext-107 cl2 size-114 plh2 p-r-15 m-r-2" style="margin-right: 20px;" type="number" name="keyword" id="search_product_byPhone" placeholder="Tìm theo số điện thoại">
        <span style="margin-right: 20px;"> Hoặc</span>
        <select id="gender" onchange="genderChanged(this)" class="form-control" style="margin-right: 10px;">
            <option value="0">Tất cả độ tuổi</option>
            <option value="18,25">18-25</option>
            <option value="26,30">26-30</option>
            <option value="31,45">31-45</option>
            <option value="46,60">46-60</option>
        </select>
        <a onclick="refresh()" class="btn btn-primary">Đặt lại</a>
    </div>
</nav>
<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table m-0">
            <thead>
                <tr>
                    <th style="width: 100px;">Mã KH</th>
                    <th>Tên khách hàng</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Ngày sinh</th>
                    <th style="width: 75px;"> </th>
                </tr>
            </thead>
            <tbody id="listAccount">
                @foreach($accounts as $value)
                <tr id="account_{{$value->id}}">
                    <td>{{$value->id}}</td>
                    <td>{{$value->account_name}}</td>
                    <td>{{$value->account_address}}</td>
                    <td>{{$value->account_phone}}</td>
                    <td>{{$value->account_birth}}</td>
                    <td><a class="btn btn-primary btn-sm" href="/admin/accounts/edit/{{ $value->id}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" onclick="removeAccount(<?php echo $value->id ?>)">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <footer class="panel-footer">
        <div class="row">
            <div class="col-sm-7 text-right text-center-xs">
                <ul class="pagination pagination-sm m-t-none m-b-none">
                </ul>
            </div>
        </div>
    </footer>
</div>
<div class="pagination">
    {{ $accounts->links() }}
</div>
@endsection
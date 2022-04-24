@extends('admin.main')
@section('content')

<style>
  #hoverdi:hover {
    color: red;
  }
</style>

<div>
  <!-- /.card-header -->
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table m-0">
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Mô tả</th>
            <th>Mô tả chi tiết</th>
            <th>Giá</th>
            <th>Giá giảm</th>
            <th>Hình ảnh</th>
            <th>Trạng thái</th>
            <th style="width: 75px;"> </th>
          </tr>
        </thead>
        <tbody>
          <!-- @foreach($products as $value)
                    <tr>
                    <td>{{$value->name}}</td>
                    @foreach($menus as $value1)
                    <?php
                    $a = '';
                    if ($value->menu_id == $value1->id) {
                      $a = $value1->name;
                    ?>
                     <td> {{$a}}</td>
                     <?php
                    }
                      ?> 
                        
            
                    @endforeach
                <td>{{$value->description}}</td>
                <td>{{$value->content}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->price_sale}}</td>
                <td><img src="/uploads/products/{{ $value->image }}" alt="{{ $value->image }}" height="100" width="100"></td>
                
                <td>{{$value->active}}</td>
                <td>
                <a href="#">  
                <i class="fas fa-retweet" ></i>
            
                </a></td>
                <td> 
                        <a class"btn btn-primary btn-sm" href="#">
                        <i class="fas fa-edit"></i>
                        </a>
                        <a class"btn btn-danger btn-sm" href="" ">
                        
                        <i class="fas fa-trash"></i>
                        </a>
                </td>
                
                </tr>
              @endforeach -->
          {!! \App\Helpers\Helper::listproduct($products,$menus) !!}
        </tbody>
        <style>

        </style>
      </table>
      <div class="card-tools">
        <ul class="pagination pagination-sm">
          {!!$products->links()!!}

        </ul>
      </div>
      <style>

      </style>
    </div>


    @endsection
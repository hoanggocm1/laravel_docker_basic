@extends('admin.main')
@section('content')




<div>
  <!-- /.card-header -->
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table m-0">
        <thead>
          <tr>
            <th>Tên Slider</th>
            <th>Mô tả</th>
            <th>Hình ảnh</th>
            <th>Đường dẫn</th>
            <th>Thứ tự</th>
            <th>Trạng thái</th>
            <th style="width: 75px;"> </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sliders as $value)
          <tr>
            <td>{{ $value->name}}</td>
            <td>{{$value->content}}</td>
            <td><a href="{{$value->image}}">
                <img src="{{$value->image}}" width="100px" height="100px">
              </a></td>
            <td>{{$value->link}}</td>
            <td>{{$value->thu_tu}}</td>
            <td> <?php
                  if ($value->active == 1) { ?>
                <label style="color: green;">On </label>
              <?php
                  } else { ?>
                <label style="color: red;">Off </label>
              <?php   } ?>
              <a href="/admin/sliders/slidertactive/{{$value->id}}">
                <i class="fas fa-retweet"></i>
            </td>




            <td>
              <a class="btn btn-primary btn-sm" href="/admin/sliders/editslider/{{$value->id}}">
                <i class="fas fa-edit"></i>
              </a>


              <a class="btn btn-danger btn-sm" href="/admin/sliders/deleteslider/{{$value->id}}">

                <i class="fas fa-trash"></i>
              </a>
            </td>
          </tr>
          @endforeach


        </tbody>
      </table>
      <!-- <div class="card-tools">
                  <ul class="pagination pagination-sm">
                  
            
                  </ul>
                </div> -->
      <!-- /.table-responsive -->

      <!-- /.card-body -->
    </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$sliders->links()!!}
          </ul>
        </div>
      </div>
    </footer>

    @endsection
@extends('admin.main')
@section('content')





<!-- /.card-header -->
<div class="card-body p-0">
  <div class="table-responsive">
    <table class="table m-0">
      <thead>
        <tr>
          <th>Tên danh mục</th>
          <th>Mô tả</th>
          <th>Mô tả chi tiết</th>
          <th>trạng thái</th>
          <th style="width: 75px;"> </th>
        </tr>
      </thead>
      <tbody>
        <!-- @foreach ($list as $list1)
                    <tr>
                      <td>{{ $list1->name}}</td>
                      <td>{{$list1->description}}</td>
                      <td>{{$list1->content}}</td>
                      <td>
                        {{$list1->active}}
                      </td>
                    </tr>
                        @endforeach -->

        {!! \App\Helpers\Helper::menu1($list) !!}
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

        </ul>
      </div>
    </div>
  </footer>
</div>
@endsection
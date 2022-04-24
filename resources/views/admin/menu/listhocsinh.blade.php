@extends('admin.main')
@section('content')

<div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Ten </th>
                      <th>lop</th>
                      <th>dtb</th>
                      <th>phone</th>
                      <th>active</th>
                      <th> </th>
                    </tr>
                    </thead>
                    <tbody>
{!! \App\Helpers\Helper::listhocsinh($listhocsinh) !!}

</tbody>
                  </table>

@endsection
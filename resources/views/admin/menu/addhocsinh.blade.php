@extends('admin.main')
@section('content')

<form action="" method="POST">
            <div class="card-body">

                <div class="form-group">
                    <label for="menu">Tên học sinh </label>
                    <input type="text" name="name" class="form-control"  placeholder="Nhập tên học sinh">
                </div>
                <div class="form-group">
                    <label for="menu">Lớp </label>
                    <input type="text" name="lop" class="form-control"  placeholder="Tên lớp">
                </div>
                <div class="form-group">
                    <label for="menu">ĐTB</label>
                    <input type="text" name="dtb" class="form-control"  placeholder="Điểm trung bình">
                </div>

                <div class="form-group">
                    <label for="menu">Số điện thoại </label>
                    <input type="text" name="phone" class="form-control"  placeholder="Số điện thoại">
                </div>

               

                <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
               <div class="input-group">
                       <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                         <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                     <div class="input-group-append">
                           <span class="input-group-text">Upload</span>
                       </div>
                  </div>
               </div>
           </div> -->

            <div class="form-group m-4">
                <label> Kích hoạt</label>
                <div class="form-group">
                    
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm học sinh</button>
            </div>
            @csrf
        </form>
@endsection
@extends('admin.main')
@section('content')
            <form action="" method="POST">
            <div class="card-body">
                @foreach ($menu as $value)
                <div class="form-group">
                    <label for="menu">Tên danh mục </label>
                    <input type="text" name="name" class="form-control"  value="{{ $value->name }}">
                </div>

                
                       <?php
                        if($value->parent_id == 0) {
                            ?>

                    <div class="form-group">
                    <label >Danh mục</label>
                   <select class="form-control" name="parent_id">
                   <option  value="0">Danh mục cha</option>
                   @foreach ($laythangchakhacdeoduoi as $value3)
                   <option  value="{{$value3->id}}">{{ $value3->name }}</option>
                            @endforeach
                     <?php
                        }   else {
                            ?>
                           <div class="form-group">
                    <label >Danh mục</label>
                   <select class="form-control" name="parent_id">
                   @foreach ($laythangchadeselect as $value1)
                   <option  value="{{$value1->id}}">{{ $value1->name }}</option>
                            @endforeach
                            <option  value="0">Danh mục cha</option>
                            @foreach ($laythangchakhacdeoduoi as $value2)
                   <option  value="{{$value2->id}}">{{ $value2->name }}</option>
                            @endforeach
                           <?php
                        }
                        ?>
                        
                
                   </select>
                </div>

                <div class="form-group">
                    <label>Mô tả </label>
                    <textarea name="description"  class="form-control">{{ $value->description }}</textarea>
                </div>

                <div class="form-group">
                    <label>Mô tả chi tiết</label>
                    <textarea name="content" class="form-control">{{ $value->content }}</textarea>
                </div>
                <div class="form-group m-4">
                <label> Kích hoạt</label>
                <div class="form-group">
                    
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active" name="active" 
                        {{ $value->active == 1 ? 'checked=""' : '' }} >
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{ $value->active == 0 ? 'checked=""' : '' }} >
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Chinh sua danh muc</button>
            </div>
            @csrf
            </form>

@endsection
@extends('admin.main')
@section('content')

<section class="content" style="padding: 10px;">
    <div class="container-fluid">
        <div class="row" style="display: flex;">
            <div class="col-md-4">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <?php
                            if ($infoUser->year_of_birth != null) {
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                $year = (int)(date('Y'));
                                $age = $year - $infoUser->year_of_birth;
                            } else {
                                $age = 'Vui lòng cập nhật';
                            }

                            if ($infoUser->avatar_admin != null) {
                            ?>
                                <a href="{{$infoUser->avatar_admin}}" target="_blank">
                                    <img class="profile-user-img img-fluid img-circle" src="{{$infoUser->avatar_admin}}" alt="Avatar admin">
                                </a>
                            <?php
                            } else {
                            ?>
                                <a target="_blank">
                                    <img class="profile-user-img img-fluid img-circle" src="{{Avatar::create($Admin->name)->toBase64()}}" alt="Avatar admin">
                                </a>
                            <?php
                            }
                            ?>




                        </div>

                        <h3 class="profile-username text-center">{{$infoUser->full_name_admin}}</h3>

                        <p class="text-muted text-center">{{$infoUser->position}}</p>

                        <ul class="list-group list-group-unbordered mb-3">

                            <li class="list-group-item">
                                <b>Tuổi :</b> <a class="float-right">{{$age}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email :</b> <a class="float-right">{{$Admin->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Số điện thoại :</b> <a class="float-right">{{$infoUser->phone_admin == null ? 'Vui lòng cập nhật' : $infoUser->phone_admin }}</a>
                            </li>
                        </ul>

                        <a href="/admin/edit-user" class="btn btn-primary btn-block"><b>Đổi mật khẩu</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- About Me Box -->
            <div class="card card-primary col-md-8">
                <div class="card-header">
                    <h3 class="card-title">Thông tin cá nhân</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Email liên hệ :</strong>

                    <p class="text-muted">
                        {{$infoUser->email_admin == null ? 'Vui lòng cập nhật' : $infoUser->email_admin }}
                    </p>

                    <hr>

                    <!-- <strong><i class="fas fa-pencil-alt mr-1"></i> Số điện thoại :</strong>

                    <p class="text-muted">{{$infoUser->phone_admin}}</p>

                    <hr> -->
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ :</strong>


                    <p class="text-muted">
                        {{$infoUser->address == null ? 'Vui lòng cập nhật' : $infoUser->address }}
                    </p>

                    <hr>

                    <strong><i class="fas fa-book mr-1"></i> Trình độ :</strong>

                    <p class="text-muted">
                        {{$infoUser->education == null ? 'Vui lòng cập nhật' : $infoUser->education }}
                    </p>
                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Kĩ năng :</strong>

                    <p class="text-muted"> {{$infoUser->skills == null ? 'Vui lòng cập nhật' : $infoUser->skills }}</p>
                    <hr>

                    <strong><i class="far fa-file-alt mr-1"></i> Ghi chú :</strong>

                    <p class="text-muted">{{$infoUser->description == null ? 'Vui lòng cập nhật' : $infoUser->description }}</p>

                    <hr>
                    <a href="/admin/edit-info-admin/{{$infoUser->id}}" class="btn btn-primary btn-block"><b>Sửa thông tin cá nhân</b></a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.col -->

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>



@endsection
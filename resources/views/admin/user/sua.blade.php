@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tài Khoản:
                            <small>{{$user->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">

                        @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach ($errors ->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif

                        <form action="admin/user/sua/{{$user->id}}" method="POST">
                             <input type="hidden" name="_token" value="{{csrf_token()}}" />
                             <fieldset disabled>
                            <div class="form-group">
                                <label>id</label>
                                <input class="form-control" name="txtIDU" placeholder="" value="{{$user->id}}" />
                            </div>
                             </fieldset>
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="txtName" placeholder="nhập tên của bạn" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input type="email" class="form-control" name="txtEmail" placeholder="nhập Email của bạn" value="{{$user->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Địa Chỉ</label>
                                <input type="text" class="form-control" name="txtDiaChi" placeholder="nhập địa chỉ của bạn" />
                            </div>
                            <div class="form-group">
                                <label>Số dt</label>
                                <input type="text" class="form-control" name="txtPhone" placeholder="nhập sdt" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="changePassword" name="changePassword">
                                <label>Đổi lại mật khẩu</label>
                                <input type="password" class="form-control password" name="txtPassword" placeholder="nhập password" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại Password</label>
                                <input type="password" class="form-control password" name="txtRpassword" placeholder="nhập lại password" disabled="" />
                            </div>

                            <div class="form-group">
                                <label>Quyền Người Dùng</label>
                                    <label class="radio-inline">
                                        <label class="radio-inline">
                                            <input type="radio" name="txtQuyen" value="0"
                                            @if($user->quyen==0) {{"checked"}} @endif >Thường
                                         </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="txtQuyen" value="1" @if($user->quyen==1) {{"checked"}} @endif checked="">Admin
                                        </label>

                            </div>


                            <button type="submit" class="btn btn-default">Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


@endsection


@section('script')
    <script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection

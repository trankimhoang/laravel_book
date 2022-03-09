@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tài Khoản:
                            <small>Thêm mới</small>
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

                        <form action="admin/user/them" method="POST">
                             <input type="hidden" name="_token" value="{{csrf_token()}}" />
                             <fieldset disabled>
                            <div class="form-group">
                                <label>id</label>
                                <input class="form-control" name="txtIDU" placeholder="" />
                            </div>
                             </fieldset>
                        <!--    <div class="form-group">
                                <label>UserName</label>
                                <input class="form-control" name="txtUsername" placeholder="nhập username" />
                            </div> -->
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="txtName" placeholder="nhập tên của bạn" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="txtEmail" placeholder="nhập Email của bạn" />
                            </div>
                            <div class="form-group">
                                <label>Địa Chỉ</label>
                                <input type="text" class="form-control" name="txtDiaChi" placeholder="nhập Email của bạn" />
                            </div>

                            <div class="form-group">
                                <label>Mật Khẩu</label>
                                <input type="password" class="form-control" name="txtPassword" placeholder="nhập password" />
                            </div>

                            <div class="form-group">
                                <label>Nhập Lại Mật Khẩu</label>
                                <input type="password" class="form-control" name="txtRpassword" placeholder="nhập lại password" />
                            </div>
                             <div class="form-group">
                                <label>Điện Thoại</label>
                                <input type="text" class="form-control" name="txtPhone" placeholder="nhập sdt" />
                            </div>

                            <div class="form-group">
                                <label>Quyền Người Dùng</label>
                                    <label class="radio-inline">
                                        <label class="radio-inline">
                                            <input type="radio" name="txtQuyen" value="0" checked="" >Thường
                                         </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="txtQuyen" value="1" >Admin
                                        </label>

                            </div>


                            <button type="submit" class="btn btn-default">Add</button>
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

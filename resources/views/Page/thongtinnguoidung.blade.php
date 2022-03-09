@extends('master')

@section('content')
<!-- Page Content -->


<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Thông Tin Cá Nhân</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('trangchu')}}">Home</a> / <span>Thay đổi thông tin</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">



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
        <form action="" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <fieldset disabled>
           <div hidden class="form-group">
               <label >id</label>
               <input class="form-control" name="txtIDU" placeholder="" value="{{Auth::user()->id}}" />
           </div>
            </fieldset>
           <div class="form-group">
               <label>Tên</label>
               <input class="form-control" name="txtName" placeholder="nhập tên của bạn" value="{{Auth::user()->name}}" />
           </div>
           <div class="form-group">
               <label>email</label>
               <input type="email" class="form-control" name="txtEmail" placeholder="nhập Email của bạn" value="{{Auth::user()->email}}" readonly="" />
           </div>
           <div class="form-group">
               <label>Địa Chỉ</label>
               <input type="text" class="form-control" name="txtDiaChi" placeholder="nhập địa chỉ của bạn" value="{{Auth::user()->address}}" />
           </div>
           <div class="form-group">
               <input type="checkbox" id="changePassword" name="changePassword" />
               <label>Đổi lại mật khẩu</label>
               <input type="password" class="form-control password" name="txtPassword" placeholder="***********" disabled="" />
           </div>
           <div class="form-group">
               <label>Nhập lại Password</label>
               <input type="password" class="form-control password" name="txtRpassword" placeholder="***********" disabled="" />
           </div>
       



           <!-- <button type="submit" class="btn btn-default">Edit</button> -->
           <!-- <button type="reset" class="btn btn-default">Reset</button> -->
       <form>
    </div> <!-- #content -->
</div> <!-- .container -->

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

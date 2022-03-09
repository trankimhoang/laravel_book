@extends('master')
@section('content')


<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng ký</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('trangchu')}}">Home</a> / <span>Đăng ký</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">

        <form action="{{route('signin')}}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">


                @if(count($errors)>0)
                <div class="alert alert-danger ">
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
                <div class="col-sm-6">
                    <h4>Đăng ký</h4>
                    <div class="space20">&nbsp;</div>


                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="txtEmail" value="{{ old('txtEmail') }}">
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Họ Tên*</label>
                        <input type="text" id="your_last_name" name="txtName" value="{{ old('txtName') }}">
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa Chỉ*</label>
                        <input type="text" id="adress" name="txtDC" value="{{ old('txtDC') }}">
                    </div>


                    <div class="form-block">
                        <label for="phone">Điện Thoại*</label>
                        <input type="text" id="txtDT" name="txtDT" value="{{ old('txtDT') }}">
                    </div>
                    <div class="form-block">
                        <label for="phone">Mật khẩu*</label>
                        <input type="password" id="txtPassword" name="txtPassword" value="{{ old('txtPassword') }}">
                    </div>
                    <div class="form-block">
                        <label for="phone">Nhập lại mật khẩu*</label>
                        <input type="password" id="txtRpassword" name="txtRpassword" value="{{ old('txtRpassword') }}">
                    </div>
                    <div class="form-block">
                        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Đăng Ký</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
<script src='https://www.google.com/recaptcha/api.js'></script>

@endsection

@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khách Hàng:
                    <small>{{$khachhang->TenKH}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                       {{$err}}<br>
                    @endforeach
                </div>
            @endif

            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif

                <form action="admin/khachhang/sua/{{$khachhang->ID}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <fieldset disabled>
                    <div class="form-group">
                        <fieldset disabled>
                        <label>ID</label>
                        <input class="form-control" name="txtIDKH" placeholder="" value="{{$khachhang->ID}}"/>
                    </div>
                </fieldset>
                    <div class="form-group">
                        <label>Tên Khách Hàng</label>
                        <input class="form-control" name="txtTenKH" placeholder="nhập tên khách hàng" value="{{$khachhang->TenKH}}"/>
                    </div>
                    <label>Giới Tính</label><br>
                        <label class="radio-inline">
                            <input name="txtGT" value="Nam"  type="radio" checked="">Nam
                        </label>
                        <label class="radio-inline">
                            <input name="txtGT" value="Nữ" type="radio">Nữ
                        </label>
                    <div class="form-group">
                        <label>Số Điện Thoại</label>
                        <input class="form-control" name="txtSDT" placeholder="nhập số điện thoại" value="{{$khachhang->SoDienThoai}}"/>
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ</label>
                        <input class="form-control" name="txtDC" placeholder="nhập địa chỉ" value="{{$khachhang->DiaChi}}" />
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="txtEmail" placeholder="nhập email" value="{{$khachhang->Email}}" />
                    </div>
                    <div class="form-group">
                        <label>Ghi Chú</label>
                        <input class="form-control" name="txtGhiChu" placeholder="nhập ghi chú" />
                    </div>
                    <button type="submit" class="btn btn-default">Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection

@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khách Hàng:
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->

            @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif

            <div class="btn m-2">
                <a href="{{url('admin/khachhang/them')}}">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </a>
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên Khách Hàng</th>
                        <th>Giới Tính</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Email</th>
                        <th>GhiChu</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($khachhang as $kh)
                        <tr class="odd gradeX" align="center">
                            <th>{{$kh->ID}}</th>
                            <th>{{$kh->TenKH}}</th>
                            <th>{{$kh->GioiTinh}}</th>
                            <th>{{$kh->SoDienThoai}}</th>
                            <th>{{$kh->DiaChi}}</th>
                            <th>{{$kh->Email}}</th>
                            <th>{{$kh->GhiChu}}</th>
                            <th class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/khachhang/xoa/{{$kh->ID}}">Delete</a></th>
                            <th class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/khachhang/sua/{{$kh->ID}}">Edit</a></th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->


@endsection

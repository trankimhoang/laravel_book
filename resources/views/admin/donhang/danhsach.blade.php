@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn Hàng:
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->

                         <!-- @if(session('error'))
                
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif -->


            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên Khách Hàng</th>
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Ghi Chú</th>
                        <th>Ngày Mua</th>
                        <th>Tổng Tiền</th>
                        <th hidden>MãKh</th>
                        <th>Chi Tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donhang as $dh)

                    <tr class="odd gradeX" align="center">
                        <th>{{$dh->ID}}</th>
                        <th>{{$dh->khachhang->TenKH}}</th>
                        <th>{{$dh->khachhang->SoDienThoai}}</th>
                        <th>{{$dh->khachhang->DiaChi}}</th>
                        <th>{{$dh->GhiChu}}</th>
                        <th>{{$dh->created_at}}</th>
                        <th>{{$dh->TongTien}} <small>đ</small></th>
                        <th hidden>{{$dh->MaKH}}</th>
                        <th><a href="{{url('admin/chitietdonhang/danhsach')}}"><button>Xem</button></a></th>
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

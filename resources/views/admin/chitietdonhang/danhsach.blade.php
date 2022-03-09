@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi Tiết Đơn Hàng:
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->

            @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif


            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên Sách</th>
                        <th>Hình</th>
                        <th>Số Lượng</th>
                        <th>Tổng Tiền <small>đ</small></th>
                        <th>Ghi Chú</th>
                        <th hidden>Mã Sách</th>
                        <th>MãDH</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chitietdonhang as $ctdh)

                    <tr class="odd gradeX" align="center">
                        <th>{{$ctdh->ID}}</th>
                        <th>{{$ctdh->sach->TenSach}}</th>
                        <th><img width="75px" height="50px" src="hinh/{{$ctdh->sach->Hinh}}"></th>
                        <th>{{$ctdh->SoLuong}}</th>
                        <th>{{number_format($ctdh->TongTien)}}</th>
                        <th>{{$ctdh->donhang->GhiChu}}</th>
                        <th hidden>{{$ctdh->MaSach}}</th>
                        <th >{{$ctdh->MaDH}}</th>
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

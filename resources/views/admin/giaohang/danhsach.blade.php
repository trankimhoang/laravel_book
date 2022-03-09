@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Giao Hàng:
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
                        <th>Ngày Giao Hàng</th>
                        <th>Ghi Chú</th>
                        <th>Trạng Thái</th>
                        <th>Xem Đơn Hàng</th>
                        <th hidden>MãDH</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($giaohang as $gh)

                    <tr class="odd gradeX" align="center">
                        <th>{{$gh->ID}}</th>
                        <th>{{$gh->NgayGH}}</th>
                        <th>{{$gh->donhang->GhiChu}}</th>
                        <th>{{$gh->TrangThaiGH}}</th>
                        <th><a href="{{url('admin/donhang/danhsach')}}"><button>Xem</button></a></th>
                        <th hidden>{{$gh->MaDH}}</th>
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

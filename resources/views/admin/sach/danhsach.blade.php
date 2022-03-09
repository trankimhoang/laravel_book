@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sách:
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
                <a href="{{url('admin/sach/them')}}">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </a>
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Thể Loại</th>
                        <th>Tác Giả</th>
                        <th>Tên Sách</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Hình</th>
                        <th>Mô Tả</th>
                        <th>Size</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sach as $s)

                    <tr class="odd gradeX" align="center">
                        <th>{{$s->ID}}</th>
                        <th>{{$s->theloai->TenTL}}</th>
                        <th>{{$s->tacgia->TenTG}}</th>
                        <th>{{$s->TenSach}}</th>
                        <th>{{number_format($s->GiaTien)}}</th>
                        <th>{{$s->soluong}}</th>
                        <th><img width="75px" height="50px" src="hinh/{{$s->Hinh}}"></th>
                        <th>{{$s->MoTa}}</th>
                        <th>{{$s->Size}}</th>


                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/sach/xoa/{{$s->ID}}">Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sach/sua/{{$s->ID}}">Edit</a></td>
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

@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tác Giả:
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->

                        @if(session('error'))
                
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif

            <div class="btn m-2">
                <a href="{{url('admin/tacgia/them')}}">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </a>
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên Tác Giả</th>
                        <th>Hình</th>
                        <th>Giới Thiệu</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tacgia as $tg)

                    <tr class="odd gradeX" align="center">
                        <th>{{$tg->ID}}</th>
                        <th>{{$tg->TenTG}}</th>
                        <th><img width="75px" height="50px" src="hinh/{{$tg->Hinh}}"></th>
                        <th>{{$tg->GioiThieu}}</th>
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/tacgia/xoa/{{$tg->ID}}">Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tacgia/sua/{{$tg->ID}}">Edit</a></td>
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
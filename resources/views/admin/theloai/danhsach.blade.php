@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể Loại:
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
                <a href="{{url('admin/theloai/them')}}">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </a>
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên thể loại</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($theloai as $tl)

                    <tr class="odd gradeX" align="center">
                        <th>{{$tl->ID}}</th>
                        <th>{{$tl->TenTL}}</th>
                       
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/theloai/xoa/{{$tl->ID}}">Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/theloai/sua/{{$tl->ID}}">Edit</a></td>
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
@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tài Khoản:
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
                    <a href="{{url('admin/user/them')}}">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </a>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>id</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Điện Thoại</th>
                                <th>Địa Chỉ</th>
                                <th>Quyen</th>
                                <th hidden>Password</th>
                                <th hidden>Remember_password</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $u)

                            <tr class="odd gradeX" align="center">
                                <th>{{$u->id}}</th>
                                <th>{{$u->name}}</th>
                                <th>{{$u->email}}</th>
                                <th>{{$u->phone}}</th>
                                <th>{{$u->address}}</th>
                                <th>

                                    @if($u->quyen==1)
                                    {{"Admin"}}
                                    @else
                                    {{"Thường"}}
                                    @endif
                                 </th>
                                 <th hidden>{{$u->password}}</th>
                                 <th hidden>{{$u->remember_password}}</th>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/user/xoa/{{$u->id}}">Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/{{$u->id}}">Edit</a></td>
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

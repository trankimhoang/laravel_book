@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tác Giả:
                    <small>Thêm mới</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                
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
                
                <form action="admin/tacgia/them" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <fieldset disabled>
                    <div class="form-group">
                        <label>ID</label>
                        <input class="form-control" name="txtIDTG" placeholder="" />
                    </div>
                    </fieldset>
                    <div class="form-group">
                        <label>Tên Tác Giả</label>
                        <input class="form-control" name="txtTenTG" placeholder="nhập tên tác giả" />
                    </div>
                    <div class="form-group">
                        <label>Hình</label>
                        <input type="file" value="" name="fImages">
                    </div>
                    <div class="form-group">
                        <label>Giới Thiệu</label>
                        <div>
                        <textarea  name="txtGioiThieu" value="" style="width: 650px;height:100px"></textarea>
                        </div>
                    </div>
                  
                    <button type="submit" class="btn btn-default">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>     
                     
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->


@endsection
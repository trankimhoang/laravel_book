@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sách:
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

                <form action="admin/sach/them" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <fieldset disabled>
                    <div class="form-group">
                        <label>ID</label>
                        <input class="form-control" name="txtIDS" placeholder="" />
                    </div>
                    </fieldset>
                    <div class="form-group">
                        <label>Tên Sách</label>
                        <input class="form-control"  name="txtSach" placeholder="nhập tên sách" />
                    </div>
                    <label>Thể Loại</label>

                    <select class="form-control" name="txtTL">

                        <option value="0">--Lựa chọn--</option>
                    @foreach ($chontl as $ctl)
                        <option value="{{$ctl->ID}}">{{$ctl->TenTL}}</option>

                    @endforeach

                    </select>
                    <label>Tác Giả</label>
                    <select class="form-control" name="txtTG">

                        <option value="0">--Lựa Chọn--</option>

                    @foreach ($chontg as $ctg)
                        <option value="{{$ctg->ID}}">{{$ctg->TenTG}}</option>
                    @endforeach
                    </select>
                    <div class="form-group">
                        <label>Hình</label>
                        <input type="file" name="fImages">
                    </div>
                    <div class="form-group">
                        <label>Giá Tiền</label>
                        <input class="form-control" name="txtGiaTien" value="" placeholder="nhập giá tiền VND" />
                    </div>
                    <div class="form-group">
                        <label>Số Lượng</label>
                        <input class="form-control" name="txtSoLuong" value="" placeholder="nhập số lượng" />
                    </div>
                    <div class="form-group">
                        <label>Mô Tả</label>
                        <textarea  name="txtMoTa" style="width: 650px;height:100px"></textarea>
                        {{-- <textarea id="demo" class="form-control ckeditor" name="txtMoTa" ></textarea> --}}
                    </div>
                    <div class="form-group">
                        <label>Size</label><br>
                        <label class="radio-inline">
                            <input name="txtSize" value="A1 - 420 x 297mm" checked="" type="radio">A1 - 420 x 297mm (16.5 x 11.7 in)
                        </label>
                        <label class="radio-inline">
                            <input name="txtSize" value="A2 - 297 x 210mm" type="radio">A2 - 297 x 210mm (11.7 x 8.3 in)
                        </label>
                        <label class="radio-inline">
                            <input name="txtSize" value="A3 - 210 x 148mm " type="radio">A3 - 210 x 148mm (8.3 x 5.8 in)
                        </label>
                        <label class="radio-inline">
                            <input name="txtSize" value="A4 - 148 x 86mm"  type="radio">A4 - 148 x 86mm (5.8 x 3.3 in)
                        </label>
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

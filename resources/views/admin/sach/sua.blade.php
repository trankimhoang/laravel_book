@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sách:
                    <small>{{$sach->TenSach}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                       {{$err}}<br>
                    @endforeach
                </div>
            @endif

            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif

                <form action="admin/sach/sua/{{$sach->ID}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <fieldset disabled>
                    <div class="form-group">
                        <label>ID</label>
                        <input class="form-control" name="txtIDS" placeholder="" value="{{$sach->ID}}" />
                    </div>
                    </fieldset>
                    <div class="form-group">
                        <label>Tên Sách</label>
                        <input class="form-control"  name="txtSach" placeholder="nhập tên sách" value="{{$sach->TenSach}}" />
                    </div>
                    <label>Thể Loại</label>

                    <select class="form-control" name="txtTL">

                        <option value="0">--Lựa Chọn--</option>
                    @foreach ($chontl as $ctl)
                        <option @if($sach->MaTL == $ctl->ID) {{"selected"}} @endif value="{{$ctl->ID}}">{{$ctl->TenTL}}</option>

                    @endforeach

                    </select>
                    <label>Tác Giả</label>
                    <select class="form-control" name="txtTG">
                        <option value="0" >--Lựa Chọn--</option>

                    @foreach ($chontg as $ctg)

                      <option @if($sach->MaTG == $ctg->ID) {{"selected"}} @endif value="{{$ctg->ID}}">{{$ctg->TenTG}}</option>

                    @endforeach
                    </select>
                    <div class="form-group">
                        <label>Hình</label>
                        <input type="file" value="{{$sach->Hinh}}" name="fImages">
                    </div>
                    <div class="form-group">
                        <label>Giá Tiền</label>
                        <input class="form-control" name="txtGiaTien" value="{{$sach->GiaTien}}" placeholder="nhập giá tiền VND" />
                    </div>
                    <div class="form-group">
                        <label>Số Lượng</label>
                        <input class="form-control" name="txtSoLuong" value="{{$sach->soluong}}" placeholder="nhập số lượng" />
                    </div>
                    <div class="form-group">
                        <label>Mô Tả</label>
                        <textarea  name="txtMoTa" value="{{$sach->MoTa}}" style="width: 650px;height:100px"></textarea>
                        {{-- <textarea id="demo" class="form-control ckeditor" name="txtMoTa" ></textarea> --}}
                    </div>
                    <div class="form-group">
                        <label>Size</label><br>
                        <label class="radio-inline">
                            <input name="txtSize" value="{{$sach->Size}}"  type="radio">A1 - 420 x 297mm (16.5 x 11.7 in)
                        </label>
                        <label class="radio-inline">
                            <input name="txtSize" value="{{$sach->Size}}" type="radio">A2 - 297 x 210mm (11.7 x 8.3 in)
                        </label>
                        <label class="radio-inline">
                            <input name="txtSize" value="{{$sach->Size}}" type="radio">A3 - 210 x 148mm (8.3 x 5.8 in)
                        </label>
                        <label class="radio-inline">
                            <input name="txtSize" value="{{$sach->Size}}" checked="" type="radio">A4 - 148 x 86mm (5.8 x 3.3 in)
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection

@extends('master')

@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản Phẩm {{$sanpham->TenSach}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trangchu')}}">Home</a> / <span>Thông Tin Chi Tiết Sản Phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        <img src="hinh/{{$sanpham->Hinh}}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-name" style="font-size:20px"><b>{{$sanpham->TenSach}}</b></p>
                            <div class="space20">&nbsp;</div>
                            <p class="single-item-name" style="font-size: 15px"><b>Tác Giả:</b> {{$tacgia->TenTG}}</p>
                            <div class="space20">&nbsp;</div>
                            <p class="single-item-name" style="font-size: 15px"><b>Số lượng còn:</b> {{$sanpham->soluong}}</p>
                            <div class="space20">&nbsp;</div>
                            <p class="single-item-price" style="font-size: 15px">
                                <span><b>Giá Tiền:</b> {{number_format($sanpham->GiaTien)}} <small>đ</small></span>
                            </p>
                        </div>
                        {{--  <div class="clearfix"></div> --}}
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{$sanpham->Mota}}</p>

                        </div>
                        <div class="space20">&nbsp;</div>

                        {{-- <p>Số Lượng:</p> --}}
                        <div class="single-item-options">

                            {{-- <select class="wc-select" name="txtsoluong">
                                <option value="@if(Session::get('cart')){{$sanpham['qty']}}@endif"></option>
                            </select> --}}

                            <a class="add-to-cart" href="{{route('themgiohang',$sanpham->ID)}}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Mô Tả</a></li>
                        <li><a href="#tab-reviews">Reviews (0)</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{$sanpham->MoTa}}</p>

                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>No Reviews</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Sản Phẩm Tương Tự</h4>

                    <div class="row">

                        @foreach($sp_tuongtu as $sptt)

                        <div class="col-sm-4">
                            <div class="single-item">
                                <div class="single-item-header">
                                    <a href="#"><img src="hinh/{{$sptt->Hinh}}" alt="" height="250px" width="250px"></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-name" style="font-size: 15px"><b>{{$sptt->TenSach}}</b></p>
                                    <p class="single-item-price">
                                        <span style="font-size: 13px">Giá Tiền: {{number_format($sptt->GiaTien)}} <small>đ</small></span>
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{{route('themgiohang',$sptt->ID)}}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{route('chitietsach',$sptt->ID)}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>


                        @endforeach
                    </div>

                    <div class="row">{{$sp_tuongtu->links()}}</div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Tác Giả Nổi Tiếng</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($tacgianoitieng as $tg)
                            <div class="media beta-sales-item">
                                <img src="hinh/{{$tg->Hinh}}" height="40px" width="0px" alt="">
                                <div class="media-body">
                                    <p class="single-item-title" style="font-size: 15px"><b>{{$tg->TenTG}}</b></p>
                                    <span class="beta-sales-name" style="font-size: 10px">{{$tg->GioiThieu}}</span>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div> <!-- best sellers widget -->
              
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->

@endsection

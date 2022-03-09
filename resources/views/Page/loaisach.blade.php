@extends('master')

@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản Phẩm {{$loai_sp->TenTL}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trangchu')}}">Home</a> / <span>Loại sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach($loai as $l)

                        <li><a href="{{route('loaisach',$l->ID)}}">{{$l->TenTL}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>Sản Phẩm</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy sản phẩm</p>

                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($sp_theoloai as $sptl)

                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{route('chitietsach',$sptl->ID)}}"><img src="hinh/{{$sptl->Hinh}}" height="250px" width="250px" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-name" style="font-size: 15px">{{$sptl->TenSach}}</p>
                                        <p class="single-item-price" style="font-size: 13px">
                                            <span style="font-size: 13px">Giá Tiền: {{number_format($sptl->GiaTien)}} <small>đ</small></span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$sptl->ID)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('chitietsach',$sptl->ID)}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>

                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <br>
                            </div>
                            @endforeach

                        </div>
                    </div> <!-- .beta-products-list -->



                    <div class="space50">&nbsp;</div>
                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản Phẩm Khác</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($sp_khac)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($sp_khac as $sp_k)

                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{route('chitietsach',$sp_k->ID)}}"><img src="hinh/{{$sp_k->Hinh}}" height="250px" width="250px" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-name" style="font-size: 15px">{{$sp_k->TenSach}}</p>
                                        <p class="single-item-price" style="font-size: 13px">
                                            <span style="font-size: 13px">Giá Tiền: {{number_format($sp_k->GiaTien)}} <small>đ</small></span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$sp_k->ID)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('chitietsach',$sp_k->ID)}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <br>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{{$sp_khac->links()}}</div>
                        <div class="space40">&nbsp;</div>

                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->

@endsection

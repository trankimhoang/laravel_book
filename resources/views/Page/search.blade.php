@extends('master')
@section('content')


<div class="container">
    <div id="content" class="space-top-none">
    <div class="main-content">
    <div class="space60">&nbsp;</div>
    <div class="row">
        <div class="col-sm-12">
            <div class="beta-products-list">
                <h4>Tìm kiếm</h4>
                <div class="beta-products-details">
                    <p class="pull-left">Tìm thấy {{count($producttk)}} sản phẩm</p>
                    <div class="clearfix"></div>
                </div>

                <div class="row">

                    @foreach($producttk as $prod)

                    <div class="col-sm-3">
                        <div class="single-item ">
                          <!--  <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div> -->
                            <div class="single-item-header">
                                <a href="{{route('chitietsach',$prod->ID)}}"><img src="hinh/{{$prod->Hinh}}" alt=""></a>
                            </div>
                            <div class="single-item-body">
                                <p class="single-item-name"><h5>{{$prod->TenSach}}</h5></p>
                                <p class="single-item-price" style="font-size: 18px">
                                    <span>Giá Tiền: {{number_format($prod->GiaTien)}} <small>đ</small></span>
                                </p>
                            </div>
                            <div class="single-item-caption">
                                <a class="add-to-cart pull-left" href="{{route('themgiohang',$prod->ID)}}"><i class="fa fa-shopping-cart"></i></a>
                                <a class="beta-btn primary" href="{{route('chitietsach',$prod->ID)}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                    <br>
                    </div>
                @endforeach

                </div>


            </div> <!-- .beta-products-list -->

            <div class="space50">&nbsp;</div>

           <!-- .beta-products-list -->
        </div>
    </div> <!-- end section with sidebar and main content -->


    </div> <!-- .main-content -->
    </div> <!-- #content -->

@endsection

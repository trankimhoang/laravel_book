
<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">


                    <li><a ><i class="fa fa-home"></i> &nbsp;</a></li>
                    <li><a ><i class="fa fa-phone"></i> 0584246834</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    {{-- <li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li> --}}
                    @if(Auth::check())
                        <li><a href="{{route('thongtin')}}"><i class="fa fa-user"> Chào bạn <strong style="font-size: 15px;color: red;">{{Auth::user()->name}}</strong></i></a></li>
                        <li><a href="{{route('logout')}}">Đăng xuất</a></li>
                    @else
                    <li><a href="{{route('signin')}}">Đăng ký</a></li>
                    <li><a href="{{route('login')}}">Đăng nhập</a></li>

                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{route('trangchu')}}" id="logo"><img src="source/assets/dest/images/logo-book.png" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('search')}}">
                        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

 <!--===================cart--------------- -->
                <div class="beta-comp">
                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}} @else Trống @endif) <i class="fa fa-chevron-down"></i></div>
                        <div class="beta-dropdown cart-body">
                            {{-- <div id="change-item-cart">
                             <div class="cart-item">
                                <div class="media">
                                    <a class="cart-item-delete" href=""><i class="fa fa-times"></i></a>
                                    <a class="pull-left" href=""><img src="" alt=""></a>
                                    <div class="media-body">
                                        <span class="cart-item-title"></span>
                                        <span class="cart-item-amount"> Số Lượng:</span>
                                        <span class="cart-item-price">Giá Tiền: <small>đ</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cart-caption">
                            <div class="cart-total text-right">Tổng tiền:
                                <span class="cart-total-value">
                                 </span>
                                 <span></span>
                            </div>
                        </div>
                            <div class="clearfix"></div>
                            <div class="center">
                                <div class="space10">&nbsp;</div>
                                <a href="" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                <a href="" class="beta-btn primary text-center">Xem giỏ hàng <i class="fa fa-chevron-right"></i></a>
                            </div> --}}


                            <div id="change-item-cart">
                                @if(Session::has('cart'))
                                @foreach($product_cart as $product)
                                <div class="cart-item">

                                <div class="media">

                                    <a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['ID'])}}"><i class="fa fa-times"></i></a>
                                    <a class="pull-left" href="{{route('xemgiohang')}}"><img src="hinh/{{$product['item']['Hinh']}}" alt=""></a>
                                    <div class="media-body">
                                        <span class="cart-item-title">{{$product['item']['TenSach']}}</span>
                                        <span class="cart-item-amount"> Số Lượng:{{$product['qty']}}</span>
                                        <span class="cart-item-price">Giá Tiền:{{number_format($product['price'])}} <small>đ</small></span>

                                    </div>
                                </div>
                                </div>
                                @endforeach
                                @endif

                            </div>

                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền:
                                    <span class="cart-total-value">
                                     </span>
                                     <span>@if(Session::has('cart')){{number_format(Session('cart')->totalPrice)}}@else 0 @endif<small>đ</small></span>

                                </div>
                            </div>


                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                    <a href="{{route('xemgiohang')}}" class="beta-btn primary text-center">Xem giỏ hàng <i class="fa fa-chevron-right"></i></a>
                                </div>



                        </div>
                    </div> <!-- .cart -->
                </div>
                <!--===================#cart--------------- -->



            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{route('trangchu')}}">Trang chủ</a></li>
                    <li><a >Danh Mục</a>
                        <ul class="sub-menu">

                            @foreach($loai_sp as $lsp)
                            <li><a href="{{route('loaisach',$lsp->ID)}}">{{$lsp->TenTL}}</a></li>
                            @endforeach

                        </ul>
                    </li>
                    <li><a href="{{route('about')}}">Giới thiệu</a></li>
                    <li><a href="{{route('lienhe')}}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>

        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->


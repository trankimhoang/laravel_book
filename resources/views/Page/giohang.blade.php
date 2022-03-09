@extends('master')
<link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="asset-giohang/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="asset-giohang/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="asset-giohang/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="asset-giohang/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="asset-giohang/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="asset-giohang/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="asset-giohang/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="asset-giohang/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="asset-giohang/css/style.css" type="text/css">



    <!-- <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>

<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

@section('content')

    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->


    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{route('trangchu')}}"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row" id="list-cart2">

                <div class="col-lg-12" id="list-cart">
                    <div class="cart-table">
                        <table class="table" border="1px">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Hình</th>
                                    <th class="p-name">Tên Sản Phẩm</th>
                                    <th>Giá Tiền</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng Tiền</th>
				    				<!-- <th>Edit</th> -->
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@if(Session::has('cart') != null)
                                @foreach($product_cart as $product)

                                <tr>
                                    <td class="cart-pic first-row"><img width="50%" src="hinh/{{$product['item']['Hinh']}}" alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5>{{$product['item']['TenSach']}}</h5>
                                    </td>



                                    
                                    <td class="p-price first-row">{{number_format($product['item']['GiaTien'])}}<small>đ</small></td>
                                    <td class="qua-col first-row">
                                        <form method="POST">
                                            @csrf
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input name="txtquanty" id="quanty-item-{{$product['item']['ID']}}" type="text" value="{{$product['qty']}}">
                                            </div>
                                            <button style="width: 30px"><i class="fa fa-save"></i></button>
                                        </div>
                                        </form> 
                                    </td>
                                    




<!-- 
                                    <td class="total-price first-row">@if(Session::has('cart')){{number_format($product['qty']*$product['price'] )}}@else 0 @endif <small>đ</small></td> -->
                                    
                                    <td class="total-price first-row">@if(Session::has('cart')){{number_format(Session('cart')->totalPrice)}}@else 0 @endif <small>đ</small></td>
                                  
									<!-- <td class="close-td first-row" ><a href="javascript:"  onclick="SaveListItemCart({{$product['item']->ID}})"><i class="ti-save" ></i></a></td>
                                    <td class="close-td first-row"><a onclick="DeleteListItemCart({{$product['item']->ID}})" href="javascript:"><i class="ti-close" ></a></i></a></td>  -->

                                  

                                     
                                     <td class="close-td first-row"><a href="{{route('xoagiohang',$product['item']['ID'])}}" ><i class="ti-close"></i></a></td>

                                </tr>

                               @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 offset-lg-8">
                            <div class="proceed-checkout">
                                @if(Session::has('cart') != null)
                                <ul>
                                    {{-- <li class="subtotal">Giá giảm <span>không phù hợp</span></li> --}}
                                    <li class="subtotal">Tổng số lượng <span>@if(Session::has('cart')){{number_format(Session('cart')->totalQty)}}@endif</span></li>
                                    <li class="cart-total">Tổng Tiền<span>@if(Session::has('cart')){{number_format(Session('cart')->totalPrice)}}@else 0 @endif <small>đ</small></span></li>
                                </ul>
                                <a href="{{route('dathang')}}" class="proceed-btn">Đặt Hàng</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Js Plugins -->
    <script src="asset-giohang/js/jquery-3.3.1.min.js"></script>
    <script src="asset-giohang/js/bootstrap.min.js"></script>
    <script src="asset-giohang/js/jquery-ui.min.js"></script>
    <script src="asset-giohang/js/jquery.countdown.min.js"></script>
    <script src="asset-giohang/js/jquery.nice-select.min.js"></script>
    <script src="asset-giohang/js/jquery.zoom.min.js"></script>
    <script src="asset-giohang/js/jquery.dd.min.js"></script>
    <script src="asset-giohang/js/jquery.slicknav.js"></script>
    <script src="asset-giohang/js/owl.carousel.min.js"></script>
    <script src="asset-giohang/js/main.js"></script>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->

 <!-- ----------------------------------Ajax list gio hàng------------------------------------------- -->
<!-- <script>
    function SaveListItemCart(ID)
    {

        //console.log(ID);
        $.ajax({
            url:'Save-Item-List-Cart/'+ID+'/'+$("#quanty-item-"+ID).val(),
            type:'GET',
        }).done(function(response){
            RenderListCart(response);
            alertify.success('Đã cập nhật thành công ^.^');
        });
    }

    function DeleteListItemCart(ID)
    {
        $.ajax({
            url:'delete-item-list-cart/'+ID,
            type:'GET',
        }).done(function(response){
            //console.log(response);
            RenderListCart(response);
            alertify.success('Đã xóa thành công ^.^');
        });
    }
    function RenderListCart(response){
        $("#list-cart").empty();
        $("#list-cart").show();
    }


</script> -->
@endsection

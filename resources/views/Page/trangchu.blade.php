@extends('master')
@section('content')
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer" >
        <div class="banner" >
                <ul>


                    <!-- THE FIRST SLIDE -->


                    @foreach ($slide as $sil)

                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                    <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="hinh/{{$sil->TenHinh}}" data-src="hinh/{{$sil->TenHinh}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('hinh/{{$sil->TenHinh}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>

                     @endforeach
                </ul>
            </div>
        </div>

        <div class="tp-bannertimer"></div>
    </div>
</div>
<!--slider-->
</div>

<div class="container">
<div id="content" class="space-top-none">
<div class="main-content">
<div class="space60">&nbsp;</div>
<div class="row">
    <div class="col-sm-12">
        <div class="beta-products-list">
            <h4>Sản Phẩm</h4>
            <div class="beta-products-details">
                <p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
                <div class="clearfix"></div>
            </div>
            <table border="1">
            <div class="row">

                @foreach($product as $prod)

                <div class="col-sm-3">
                    <div class="single-item ">
                      <!--  <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div> -->
                        <div class="single-item-header">
                            <a href="{{route('chitietsach',$prod->ID)}}"><img src="hinh/{{$prod->Hinh}}" height="230px" width="230px" alt=""></a>
                        </div>
                        <div class="single-item-body" align="center">
                            <p class="single-item-name" style="font-size: 15px"><b>{{$prod->TenSach}}</b></p>
                            <p class="single-item-price" style="font-size: 13px">
                                <span>Giá Tiền: {{number_format($prod->GiaTien)}} <small>đ</small></span>
                            </p>
                        </div>
                        <div class="single-item-caption" >
                             <a class="add-to-cart pull-left" align="center" href="{{route('themgiohang',$prod->ID)}}"><i class="fa fa-shopping-cart"></i></a>
                             <a class="beta-btn primary"align="center"href="{{route('chitietsach',$prod->ID)}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>


                             {{-- <a class="add-to-cart pull-left" align="center"><i class="fa fa-shopping-cart" onclick="AddCart({{$prod->ID}})" href="javascript:"></i></a>
                             <a class="beta-btn primary"align="center">Chi Tiết <i class="fa fa-chevron-right" onclick="DeleteCart({{$prod->ID}})" href="javascript:"></i></a> --}}
                             <div class="clearfix"></div>
                        </div>
                    </div>

                <br>
                </div>

            @endforeach

            </div>
        </table>
            <div class="row">{{$product->links()}}</div>
        </div> <!-- .beta-products-list -->

        <div class="space50">&nbsp;</div>

        
    </div>
</div> <!-- end section with sidebar and main content -->



</div> <!-- .main-content -->
</div> <!-- #content -->



<script>
    function AddCart(ID){
        $.ajax({
            url:'add-to-cart/'+ID,
            type:'GET',
        }).done(function(response){

            //console.log(response);
            RenderCart(response);
            alertify.success('Thêm thành công ^.^');
        });
    }

    function DeleteCart(ID){
    $("#change-item-cart").on("click",".fa fa-shopping-cart i",function(){
        $.ajax({
            url:'del-cart/'+$(this).data($ID),
            type:'GET',
        }).done(function(response){
            RenderCart(response);
            alertify.success('Đã xóa sản phẩm');
        });
    });
    }

    function RenderCart(response){
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        //$("#total-quanty-show").text($("#total-quanty-cart").val());
    }
</script>



@endsection

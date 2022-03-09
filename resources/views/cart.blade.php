

<!-- @if(Session::has('cart'))
@foreach($product_cart as $product) -->
<!-- <div class="cart-item">

    <div class="media">

        <a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['ID'])}}"><i
                class="fa fa-times"></i></a>
        <a class="pull-left" href="{{route('xemgiohang')}}"><img src="hinh/{{$product['item']['Hinh']}}" alt=""></a>
        <div class="media-body">
            <span class="cart-item-title">{{$product['item']['TenSach']}}</span>
            <span class="cart-item-amount"> Số Lượng:{{$product['qty']}}</span>
            <span class="cart-item-price">Giá Tiền:{{number_format($product['price'])}} <small>đ</small></span>

        </div>
    </div>
</div> -->



<!-- <div class="cart-item">
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
@endforeach
@endif -->

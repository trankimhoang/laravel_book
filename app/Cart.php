<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id){
		$giohang = ['qty'=>0, 'price' => $item->GiaTien, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$giohang = $this->items[$id];
			}
		}
		$giohang['qty'] += 1;
		$giohang['price'] = $item->GiaTien * $giohang['qty'];
		$this->items[$id] = $giohang;
		$this->totalQty++;
		$this->totalPrice += $item->GiaTien;
    }

    //Them san pham vao cart dua theo so luong
    // public function addCCount($item,$id,$soluong){
    //     $giohang = ['qty'=>0, 'price' => $item->GiaTien, 'item' => $item];
	// 	if($this->items){
	// 		if(array_key_exists($id, $this->items)){
	// 			$giohang = $this->items[$id];
	// 		}
    //     }
    //     $giohang['qty'] += $soluong;
	// 	$giohang['price'] = $item->GiaTien * $giohang['qty'];
    //     $this->items[$id] = $giohang;
    //     $this->totalQty += $giohang['qty'];
    //     $this->totalPrice += $item->GiaTien;
    //     //dd($giohang);
    // }
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['GiaTien'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['GiaTien'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['GiaTien'];
		unset($this->items[$id]);
	}




    // public function SaveItem($id,$quanty)
    // {
    //     $this->totalQty -=$this->items[$id]['qty'];
    //     $this->totalPrice -=$this->items[$id]['price'];

    //     $this->items[$id]['qty'] = $quanty;
    //     $this->items[$id]['price']=$quanty *$this->items[$id]['item']['price'];

    //     $this->totalQty +=$this->items[$id]['qty'];
    //     $this->totalPrice +=$this->items[$id]['price'];
    //     // dd($this->totalPrice);
	// }
}

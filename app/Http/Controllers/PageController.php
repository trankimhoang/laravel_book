<?php

namespace App\Http\Controllers;

use App\Cart;
use App\ChiTietDonHang;
use Illuminate\Http\Request;
use App\Image;
use App\KhachHang;
use App\DonHang;
use App\GiaoHang;
use App\Sach;
use App\TacGia;
use App\TheLoai;
use App\User;
use Hash;
use Session;
use Auth;

class PageController extends Controller
{

    // public function getIndex()
    // {
    //     $slide=Image::all();
    //     //print_r($slide);
    //     $i = 1;
    //     $max = Sach::count();
    //     $rand = rand($i,$max);
    //     for( $i=1;$i<$rand;$i++)
    // {
    //     if($rand != null)
    //      $product=Sach::where('id',$rand)->paginate(8);
    // }
    //     //dd($product);
    //     return view('Page.trangchu',compact('slide','product'));
    // }


    public function getIndex()
    {
        $slide = Image::all();
        //print_r($slide);
        $product = Sach::paginate(8);
        // dd($product);
        return view('Page.trangchu', compact('slide', 'product'));
    }

    public function getLoaiSach($type)
    {
        //$sp_theoloai=Sach::paginate(4);
        $sp_theoloai = Sach::inRandomOrder()->where('MaTL', $type)->get();
        $sp_khac = Sach::where('ID', '<>', $type)->inRandomOrder()->paginate(3);
        $loai = TheLoai::all();

        $loai_sp = TheLoai::where('ID', $type)->first();
        return view('Page.loaisach', compact('sp_theoloai', 'sp_khac', 'loai_sp', 'loai'));
    }

    public function getChiTietSach(Request $req)
    {
        $sanpham = Sach::where('ID', $req->ID)->first();
        $tacgia = TacGia::where('ID', $sanpham->MaTG)->first();

        $tacgianoitieng = TacGia::inRandomOrder()->paginate(6);
        $sp_tuongtu = Sach::where('MaTL', $sanpham->MaTL)->paginate(6);
        return view('Page.chitietsach', compact('sanpham', 'sp_tuongtu', 'tacgia', 'tacgianoitieng',));
    }

    public function getLienHe()
    {
        return view('Page.lienhe');
    }

    public function getAbout()
    {
        return view('Page.about');
    }

    //-------------------------------------------them/xoa giỏ hàng----------------------------------------
    public function getAddtoCart(Request $req, $ID)
    {
        // if(isset($req->txtsoluong)){
        //     $product=Sach::find($ID);
        //     $oldCart=Session('cartsl')?Session::get('cartsl'):null;
        //     $cart=new Cart($oldCart);
        //     $cart->addCCount($product,$ID,$req->txtsoluong);
        //     $req->session()->put('cartsl',$cart);
        //     //return redirect()->back();
        //     dd($cart);
        // }
        // else{
        $product = Sach::find($ID);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $ID);
        $req->session()->put('cart', $cart);
        return redirect()->back();
        //dd($updSL);

        // $product->soluong = $product->soluong - $cart->items['qty'];
        // $updSL = Sach::where('ID',$ID)->update(['soluong'=>$product->soluong]);
        // // return view('cart',compact('cart'));
    }


    public function getDelItemCart($ID)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($ID);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }


//---------------------------------------danh sach giỏ hàng--------------------------------------
    public function getXemCart()
    {
        return view('Page.giohang');
    }

    public function getDeleteItemListCart($ID)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($ID);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);

        } else {
            Session::forget('cart');
            return redirect()->back();
        }
        return view('Page.giohang');
    }

    public function postSaveItemListCart(Request $req, $ID, $quanty)
    {
        dd($req->txtquanty);
        $this->validate($req,
            [

                'txtquanty' => 'required|numeric',
            ], [

                'txtquanty.required' => 'Vui lòng nhập số lượng',
                'txtquanty.numeric' => 'Số lượng phải là số'
            ]);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->SaveItem($ID, $quanty);
        $req->Session()->put('cart', $cart);
        $cart->save();
        return view('Page.giohang');
    }


    //-------------------------------------------dat hang--------------------------------------------


    public function getCheckout()
    {
        $user = Auth::user();
        if (!isset($user->name))
            return redirect('dang-nhap');
        else
            return view('Page.dathang');
    }

    public function postCheckout(Request $req)
    {
        $cart = Session::get('cart');
        //dd($cart);
        $customer = new KhachHang;
        $customer->TenKH = $req->txtName;
        $customer->GioiTinh = $req->txtGT;
        $customer->Email = $req->txtEmail;
        $customer->DiaChi = $req->txtDC;
        $customer->SoDienThoai = $req->txtDT;
        $customer->GhiChu = $req->txtGC;
        $customer->save();

        $bill = new DonHang;
        // $bill->NgayDatHang=date('Y-m-d');
        $bill->TongTien = $cart->totalPrice;
        $bill->ThanhToan = $req->txtTT;
        $bill->GhiChu = $customer->GhiChu;
        $bill->MaKH = $customer->id;
        $bill->save();


        $slton = 0;
        foreach ($cart->items as $key => $value) {
            $bill_detail = new ChiTietDonHang;
            $bill_detail->MaDH = $bill->id;
            $bill_detail->MaSach = $key;
            $bill_detail->soluong = $cart->items[$key]['qty'];

            //Cap nhat so luong ton cua sach
            $slton = $cart->items[$key]['item']['soluong'];
            $slton -= $cart->items[$key]['qty'];
            Sach::where('ID', $key)->update(['soluong' => $slton]);

            //dd($bill_detail->sach->soluong);
            $bill_detail->TongTien = $cart->items[$key]['price'];
            $bill_detail->save();
        }
        foreach ($cart->items as $key => $value) {
            $giaohang = new GiaoHang();
            $giaohang->MaDH = $bill->id;
            // $giaohang->NgayGH = date('Y-m-d');
            $giaohang->soluong = $cart->items[$key]['qty'];
            $giaohang->save();
        }
        //dd($slton . "-" . $key);
        //dd($cart->items);
        Session::forget('cart');
        return redirect()->back()->with('thongbao', 'Đặt Hàng Thành Công');
        // foreach($cart->items as $key => $value)
        // {
        // $s=new Sach;
        // $bill_detail=new ChiTietDonHang;
        // $bill_detail->MaDH=$bill->id;
        // $bill_detail->MaSach=$s->id;
        // // $bill_detail->SoLuong=$cart->qty;
        // // $bill_detail->GiaTien=$cart->price;
        // $bill_detail->save();
        // }

        // Session::forget('cart');
        // return redirect()->back()->with('thongbao','Đặt Hàng Thành Công');

    }


    public function getLogin()
    {
        return view('Page.dangnhap');
    }

    public function getSignin()
    {
        return view('Page.dangky');
    }

    public function postSignin(Request $req)
    {
        $this->validate($req,
            [

                'txtEmail' => 'required|email|unique:users,email',
                'txtPassword' => 'required|min:6|max:20',
                'txtName' => 'required',
                'txtRpassword' => 'required|same:txtPassword',
                'g-recaptcha-response'=>'required|recaptcha',
            ], [

                'txtEmail.required' => 'Vui lòng nhập email',
                'txtEmail.email' => 'Bạn chưa nhập đúng định dạng email',
                'txtEmail.unique' => 'Email đã có người sử dụng',
                'txtPassword.required' => 'Vui lòng nhập mật khẩu',
                'txtPassword.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                'txtPassword.max' => 'Mật khẩu chỉ được tối đa 20 ký tự',
                'txtName.required' => 'Vui lòng nhập tên người dùng',
                'txtRpassword.required' => 'Vui lòng nhập lại mật khẩu',
                'txtRpassword.same' => 'Mật khẩu nhập lại chưa khớp',
                'g-recaptcha-response.required' => 'Vui lòng chọn captcha',
                'g-recaptcha-response.recaptcha' => 'Lỗi captcha',
            ]);

        $user = new User();
        $user->name = $req->txtName;
        $user->email = $req->txtEmail;
        $user->password = Hash::make($req->txtPassword);
        $user->remember_password = Hash::make($req->txtRpassword);
        $user->phone = $req->txtDT;
        $user->address = $req->txtDC;
        $user->save();
        return redirect()->back()->with('thongbao', 'Tạo Tài khoản thành công');
    }


    public function postLogin(Request $req)
    {
        $this->validate($req,
            [
                'txtEmail' => 'required|email',
                'txtPassword' => 'required|min:6|max:20'
            ],
            [
                'txtEmail.required' => 'Vui lòng nhập email',
                'txtEmail.email' => 'Email không đúng định dạng',
                'txtPassword.required' => 'Vui lòng nhập mật khẩu',
                'txtPassword.min' => 'Mật khẩu ít nhất 6 ký tự',
                'txtPassword.max' => 'Mật khẩu không quá 20 ký tự'
            ]);

        $credentiasls = array('email' => $req->txtEmail, 'password' => $req->txtPassword);
        if (Auth::attempt($credentiasls)) {
            return redirect('/');
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng nhập không thành công']);
        }
    }

    public function postLogout()
    {
        Auth::logout();
        return redirect()->route('trangchu');
    }


    //-----------------------------tt nguoi dùng--------------------------------------------------------

    public function getthongtin()
    {
        $user = User::all();
        return view('Page.thongtinnguoidung', ['user' => $user]);
    }


    //---------------------------------------------------------------------------------------------
    public function getSearch(Request $req)
    {
        $producttk = Sach::where('TenSach', 'like', '%' . $req->key . '%')
            ->orwhere('GiaTien', $req->key)
            ->get();
        return view('Page.search', compact('producttk'));
    }
}


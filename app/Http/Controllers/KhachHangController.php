<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhachHang;
use App\DonHang;
use App\GiaoHang;
class KhachHangController extends Controller
{
    //
    // public function getAll(){
    //    $tg = TacGia::find(2);
    //      echo $tg->TenTG;
    // }

    public function getDanhSach()
    {
        $khachhang=KhachHang::all();
        return view('admin.khachhang.danhsach',['khachhang'=>$khachhang]);
    }
    public function getThem()
    {
        $khachhang=KhachHang::all();
        return view('admin.khachhang.them');
    }
    public function postThem(Request $request)
    {
       //echo $request->TenTL;
       $this->validate($request,
        [
             'txtTenKH' => 'required|unique:KhachHang,TenKH|min:3|max:100',//TheLoai là bảng ,TenTL là cột trong database
             'txtGT'=>'required',
             'txtSDT'=>'required|numeric',
             'txtDC'=>'required|min:3|max:100',
             'txtEmail'=>'required|email|unique:KhachHang,Email'

        ],
        [
             'txtTenKH.required' => 'Bạn chưa nhập tên dữ liệu',
             'txtTenKH.unique' => 'Tên khách hàng đã tồn tại',
             'txtTenKH.min' => 'Tên khách hàng phải có ít nhất 3 ký tự',
             'txtTenKH.max' => 'Tên khách hàng không quá 100 ký tự' ,

             'txtGT.required' => 'Bạn chọn ngày sinh',

             'txtSDT.required'=>'Bạn chưa nhập số điên thoại',
             'txtSDT.numeric'=> 'Số điện thoại phải là số',

             'txtDC.required'=>'Bạn chưa nhập địa chỉ',
             'txtDC.min' => 'Địa chỉ hàng phải có ít nhất 3 ký tự',
             'txtDC.max' => 'Địa chỉ hàng không quá 100 ký tự' ,

             'txtEmail.required' => 'Bạn chưa nhập Email',
             'txtEmail.unique' => 'Email đã tồn tại',
             'txtEmail.emial' => 'không đúng định dạng Email',

        ]);
         $khachhang=new KhachHang;
         $khachhang->TenKH=$request->txtTenKH;
         $khachhang->GioiTinh=$request->txtGT;
         $khachhang->SoDienThoai=$request->txtSDT;
         $khachhang->DiaChi=$request->txtDC;
         $khachhang->Email=$request->txtEmail;
         $khachhang->GhiChu=$request->txtGhiChu;
         $khachhang->save();

         return redirect('admin/khachhang/danhsach')->with('thongbao','Thêm Thành Công ^.^');
    }

    public function getSua($ID)
    {
        $khachhang=KhachHang::find($ID);
        return view('admin/khachhang/sua',['khachhang'=>$khachhang]);
    }

    public function postSua(Request $request,$ID)
    {
        $khachhang=KhachHang::find($ID);
        $this->validate($request,
        [
            'txtTenTL'=>'min:3|max:100',
            'txtSDT'=>'numeric',
            'txtDC'=>'min:3|max:100',
            'txtEmail'=>'email'
        ],
        [
            //'txtTenKH.required' => 'Bạn chưa nhập tên dữ liệu',
             'txtTenKH.min' => 'Tên khách hàng phải có ít nhất 3 ký tự',
             'txtTenKH.max' => 'Tên khách hàng không quá 100 ký tự' ,

             'txtSDT.numeric'=> 'Số điện thoại phải là số',

             'txtDC.min' => 'Địa chỉ hàng phải có ít nhất 3 ký tự',
             'txtDC.max' => 'Địa chỉ hàng không quá 100 ký tự' ,

             'txtEmail.email' => 'không đúng định dạng Email',
        ]);

        //$theloai->TenTL=$request->txtTenTL;
        $khachhang->where(['ID'=> $ID])->update(['TenKH'=> $request->txtTenKH, 'SoDienThoai'=>$request->txtSDT,'DiaChi'=>$request->txtDC,'GioiTinh'=>$request->txtGT,'GhiChu'=>$request->txtGhiChu,'Email'=>$request->txtEmail]);

        return redirect('admin/khachhang/danhsach')->with('thongbao','Sửa thành công ^.^');
    }



    public function getXoa($ID)
    {
        $khachhang=KhachHang::find($ID);
        $khachhang->where(['ID'=> $ID])->delete();

        return redirect('admin/khachhang/danhsach')->with('thongbao','Bạn đã xóa thành công T_T');
    }
}

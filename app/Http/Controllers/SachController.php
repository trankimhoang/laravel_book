<?php

namespace App\Http\Controllers;

use App\KhachHang;
use Illuminate\Http\Request;
use App\Sach;
use App\TacGia;
use App\TheLoai;

class SachController extends Controller
{
    //
    public function getDanhSach()
    {
        $sach=Sach::all();
        $tacgia=TacGia::all();
        return view('admin.sach.danhsach',['sach'=>$sach]);
    }

    public function getThem()
    {
        $theloai=TheLoai::all();
        $tacgia=TacGia::all();
        return view('admin/sach/them',['chontl'=>$theloai,'chontg'=>$tacgia]);
    }
    public function postThem(Request $request)
    {
       //echo $request->TenTG;
       $this->validate($request,
        [
             'txtSach' => 'required|min:3|max:100',//TacGia là bảng ,TenTG là cột trong database
             'txtTL' => 'required',
             'txtTG' => 'required',
             'fImages' => 'required',
             'txtGiaTien' => 'required',
             'txtSoLuong' => 'required',

             'txtSize' => 'required'
        ],
        [
             'txtSach.required' => 'Bạn chưa nhập tên dữ liệu',
             'txtSach.min' => 'Tên sách phải có ít nhất 3 ký tự',
             'txtSach.max' => 'Tên sách không quá 100 ký tự',

             'txtTL.required' => 'Bạn chưa chọn thể loại',

             'txtTG.required' => 'Bạn chưa chọn tác giả',

             'fImages.required' => 'Bạn chưa chọn file',

             'txtGiaTien.required' => 'Bạn chưa nhập giá tiền',
             'txtGiaTien.numeric' => 'Giá tiền phải là số',

             'txtSoLuong.required' => 'Bạn chưa nhập số lượng',
             'txtSoLuong.numeric' => 'số lượng phải là số',

             'txtSize.required' => 'Bạn chưa chọn Size',

        ]);
         $sach=new Sach;
         $sach->TenSach=$request->txtSach;
         $sach->Hinh=$request->fImages;
         $sach->soluong=$request->txtSoLuong;
         $sach->GiaTien=$request->txtGiaTien;
         $sach->MoTa=$request->txtMoTa;
         $sach->Size=$request->txtSize;
         $sach->MaTL=$request->txtTL;
         $sach->MaTG=$request->txtTG;
         $sach->save();

         return redirect('admin/sach/danhsach')->with('thongbao','Thêm Thành Công ^.^');
    }


    public function getSua($ID)
    {
        $sach=Sach::find($ID);
        $theloai=TheLoai::all();
        $tacgia=TacGia::all();
        return view('admin/sach/sua',['sach'=>$sach,'chontl'=>$theloai,'chontg'=>$tacgia]);
    }

    public function postSua(Request $request,$ID)
    {
        $sach=Sach::find($ID);

        $this->validate($request,
        [
             'txtSach' => 'min:3|max:100',
             'txtGiaTien' => 'numeric',
             'txtSoLuong' => 'numeric',
        ],
        [
             'txtSach.min' => 'Tên sách phải có ít nhất 3 ký tự',
             'txtSach.max' => 'Tên sách không quá 100 ký tự',

             'txtGiaTien.numeric' => 'Giá tiền phải là số',

             'txtSoLuong.numeric' => 'Số lượng phải là số',


        ]);

        //$theloai->TenTL=$request->txtTenTL;
        $sach->where(['ID'=> $ID])->update(['TenSach'=> $request->txtSach, 'Hinh'=>$request->fImages,'soluong'=>$request->txtSoLuong,'GiaTien'=>$request->txtGiaTien,'MoTa'=>$request->txtMoTa,'Size'=>$request->txtSize]);

        return redirect('admin/sach/danhsach')->with('thongbao','Sửa thành công ^.^');
    }






    public function getXoa($ID)
    {
        $sach=Sach::find($ID);
        $sach->where(['ID'=> $ID])->delete();
        
        
        return redirect('admin/sach/danhsach')->with('thongbao','Bạn đã xóa thành công T_T');
    }


}

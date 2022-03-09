<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\TacGia;
use App\Sach;
use PhpParser\Node\Expr\AssignOp\Div;

class TheLoaiController extends Controller
{
    //
    // public function getAll(){
    //    $tg = TacGia::find(2);
    //      echo $tg->TenTG;
    // }

    public function getDanhSach()
    {
        $theloai=TheLoai::all();
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    public function getThem()
    {
        $theloai=TheLoai::all();
        return view('admin.theloai.them');
    }
    public function postThem(Request $request)
    {
       //echo $request->TenTL;
       $this->validate($request,
        [
             'txtTenTL' => 'required|unique:TheLoai,TenTL|min:3|max:100'//TheLoai là bảng ,TenTL là cột trong database
        ],
        [
             'txtTenTL.required' => 'Bạn chưa nhập tên dữ liệu',
             'txtTenTL.unique' => 'Tên thể loại đã tồn tại',
             'txtTenTL.min' => 'Tên thể loại phải có ít nhất 3 ký tự',
             'txtTenTL.max' => 'Tên thể loại không quá 100 ký tự' ,
        ]);
         $theloai=new TheLoai;
         $theloai->TenTL=$request->txtTenTL;
         //$theloai->tenkhongdau=changeTitle($request->txtTenTL);
         //echo changeTitle($request->txtTenTL);
         $theloai->save();

         return redirect('admin/theloai/danhsach')->with('thongbao','Thêm Thành Công ^.^');
    }

    public function getSua($ID)
    {
        $theloai=TheLoai::find($ID);
        return view('admin/theloai/sua',['theloai'=>$theloai]);
    }

    public function postSua(Request $request,$ID)
    {
        $theloai=TheLoai::find($ID);
        $this->validate($request,
        [
            'txtTenTL'=>'min:3|max:100',
        ],
        [
            'txtTenTL.min' => 'Tên thể loại phải có ít nhất 3 ký tự',
            'txtTenTL.max' => 'Tên thể loại không quá 100 ký tự',
        ]);

        //$theloai->TenTL=$request->txtTenTL;
        $theloai->where(['ID'=> $ID])->update(['TenTL'=> $request->txtTenTL]);

        return redirect('admin/theloai/danhsach')->with('thongbao','Sửa thành công ^.^');
    }


    public function getXoa($ID)
    {
        $theloai=TheLoai::find($ID);
        $sp = Sach::where('MaTL',$ID)->first();
        if(isset($sp->MaTL)){
            if($sp->MaTL == $ID)
            return redirect('admin/theloai/danhsach')->with('error','Thể Loại này đã tồn tại sản phẩm');
        }
        else 
        {
            TheLoai::where('ID',$ID)->delete();  
            return redirect('admin/theloai/danhsach')->with('thongbao','Bạn đã xóa thành công T_T');
        }
    }

}

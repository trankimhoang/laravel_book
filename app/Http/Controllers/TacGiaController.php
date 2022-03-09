<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TacGia;
use App\TheLoai;
use App\Sach;

class TacGiaController extends Controller
{
    //
    public function getDanhSach()
    {
        $tacgia=TacGia::all();
        return view('admin.tacgia.danhsach',['tacgia'=>$tacgia]);
    }

    public function getThem()
    {
        $tacgia=TacGia::all();
        return view('admin/tacgia/them');
    }

    public function postThem(Request $request)
    {
       //echo $request->TenTG;
       $this->validate($request,
        [
             'txtTenTG' => 'required|unique:TacGia,TenTG|min:3|max:100',//TacGia là bảng ,TenTG là cột trong database

             // 'fImages' => 'required',
        ],
        [
             'txtTenTG.required' => 'Bạn chưa nhập tên dữ liệu',
             'txtTenTG.unique' => 'Tên tác giả đã tồn tại',
             'txtTenTG.min' => 'Tên tác giả phải có ít nhất 3 ký tự',
             'txtTenTG.max' => 'Tên tác giả không quá 100 ký tự' ,
             // 'fImages.required' => 'Bạn chưa chọn file'
        ]);
         $tacgia=new TacGia;
         $tacgia->TenTG=$request->txtTenTG;
         $tacgia->Hinh=$request->fImages;
         $tacgia->GioiThieu=$request->txtGioiThieu;
         //$tacgia->tenkhongdau=changeTitle($request->txtTenTG);
         //echo changeTitle($request->txtTenTG);
         $tacgia->save();

         return redirect('admin/tacgia/danhsach')->with('thongbao','Thêm Thành Công ^.^');
    }


    public function getSua($ID)
    {
        $tacgia=TacGia::find($ID);
        return view('admin/tacgia/sua',['tacgia'=>$tacgia]);
    }

    public function postSua(Request $request,$ID)
    {
        $tacgia=TacGia::find($ID);
        $this->validate($request,
        [
            'txtTenTG'=>'min:3|max:100',
        ],
        [
            'txtTenTG.min' => 'Tên tác giả phải có ít nhất 3 ký tự',
            'txtTenTG.max' => 'Tên tác giả không quá 100 ký tự',
        ]);

        //$theloai->TenTL=$request->txtTenTL;
        $tacgia->where(['ID'=> $ID])->update(['TenTG'=> $request->txtTenTG,'Hinh'=> $request->fImages,'GioiThieu'=> $request->txtGioiThieu]);

        return redirect('admin/tacgia/danhsach')->with('thongbao','Sửa thành công ^.^');
    }



    public function getXoa($ID)
    {
        $tacgia=TacGia::find($ID);
        //$tacgia->where(['ID'=> $ID])->delete();
        $sp = Sach::where('MaTG',$ID)->first();
        if(isset($sp->MaTG)){
           if($sp->MaTG == $ID)
           return redirect('admin/tacgia/danhsach')->with('error','Tác Giả này đã tồn tại sản phẩm');
        }
        else 
        {
          TacGia::where('ID',$ID)->delete();  
          return redirect('admin/tacgia/danhsach')->with('thongbao','Bạn đã xóa thành công T_T');
        }
     
    }

}

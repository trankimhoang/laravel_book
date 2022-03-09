<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
class ImageController extends Controller
{
    //
     // public function getAll(){
     //    $i = Image::find(2);
     //      echo $i->TenHinh;
     // }

    public function getDanhSach()
    {
        $image=Image::all();
        return view('admin.image.danhsach',['image'=>$image]);
    }
    public function getThem()
    {
        $image=Image::all();
        return view('admin.image.them');
    }
    public function postThem(Request $request)
    {
       //echo $request->TenHinh;
       $this->validate($request,
        [
            'fImages'=>'required',
        ],
        [
            'fImages.required' => 'bạn chưa chọn file',
            //'fImages.image' => 'Chưa đúng định dạng file hình',
        ]);
         $image=new Image;
         $image->TenHinh=$request->fImages;
         $image->save();

         return redirect('admin/image/danhsach')->with('thongbao','Thêm Thành Công ^.^');
    }

    public function getSua($ID)
    {
        $image=Image::find($ID);
        return view('admin/image/sua',['image'=>$image]);
    }

    public function postSua(Request $request,$ID)
    {
        $image=Image::find($ID);
        $this->validate($request,
        [
            //'fImages'=>'image',
        ],
        [

            //'fImages.image' => 'Chưa đúng định dạng file hình'
        ]);

        //$image->TenTL=$request->txtTenTL;
        $image->where(['ID'=> $ID])->update(['TenHinh'=> $request->fImages]);

        return redirect('admin/image/danhsach')->with('thongbao','Sửa thành công ^.^');
    }



    public function getXoa($ID)
    {
        $image=Image::find($ID);
        $image->where(['ID'=> $ID])->delete();

        return redirect('admin/image/danhsach')->with('thongbao','Bạn đã xóa thành công T_T');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    /*
    public function uploadFile(Request $request){
    	// Thông báo khi xảy ra lỗi
        $messages = [
            'image' => 'Định dạng không cho phép',
            'max' => 'Kích thước file quá lớn',
        ];
        // Điều kiện cho phép upload
    	$this->validate($request, [
		    'file' => 'image|max:2028',
		], $messages);
        // Kiểm tra file hợp lệ
        if ($request->file($name)->isValid()){
            // Lấy tên file
            $file_name = $request->file($name)->getClientOriginalName();
            // Lưu file vào thư mục upload với tên là biến $filename
            $request->file($name)->move('upload',$file_name);
        }
    }   */
}

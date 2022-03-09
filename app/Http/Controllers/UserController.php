<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    /*
    public function getAll(){
        $user = User::find(2);
         echo $user->Name;
    }
*/


//---------------------------------------------thêm xoa sửa admin---------------------------------------
    public function getDanhSach()
    {
        $user=User::all();
        return view('admin.user.danhsach',['user'=>$user]);
    }

    public function getThem()
    {
        return view('admin.user.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'txtName' => 'required|min:3',
            'txtEmail' =>'required|email|unique:users,email',
            'txtPassword' => 'required|min:3|max:32',
            'txtRpassword' => 'required|same:txtPassword',

        ],[

            'txtName.required'=>'Bạn chưa nhập tên người dùng',
            'txtName.min'=>'Tên người dùng phải có ít nhất 3 ký tự',

            'txtEmail.required'=>'Bạn chưa nhập email',
            'txtEmail.email'=>'Bạn chưa nhập đúng định dạng email',
            'txtEmail.unique'=>'Email đã tồn tại',

            'txtPassword.required'=>'Bạn chưa nhập mật khẩu',
            'txtPassword.min'=>'mật khẩu phải có ít nhất 3 ký tự',
            'txtPassword.max'=>'mật khẩu chỉ được tối đa 32 ký tự',

            'txtRpassword.required'=>'Bạn chưa nhập lại mật khẩu',
            'txtRpassword.same'=>'Mật khẩu nhập lại chưa khớp',


        ]);
        $user=new User;
        //$user->Username=$request->txtUsername;
        $user->name=$request->txtName;
        $user->email=$request->txtEmail;
        $user->password=bcrypt($request->txtPassword);
        $user->remember_password=bcrypt($request->txtPassword);
        $user->address=$request->txtDiaChi;
        $user->phone=$request->txtPhone;
        $user->quyen=$request->txtQuyen;
        $user->save();
        return redirect('admin/user/danhsach')->with('thongbao','Thêm thành công ^.^');
    }

    public function getSua($id)
    {
        $user=User::find($id);
        return view('admin.user.sua',['user'=>$user]);
    }


    public function postSua(Request $request,$id)
    {
        $this->validate($request,[

            'txtName' => 'min:3',
            'txtEmail' =>'email',

        ],[
            'txtName.min'=>'Tên người dùng phải có ít nhất 3 ký tự',

            'txtEmail.email'=>'Bạn chưa nhập đúng định dạng email',
            'txtEmail.unique'=>'Email đã tồn tại',


        ]);
        $user=User::find($id);
        $user->name=$request->txtName;
        $user->email=$request->txtEmail;
        $user->address=$request->txtDiaChi;
        $user->phone=$request->txtPhone;
        $user->quyen=$request->txtQuyen;

        if($request->changePassword=="on")
        {
            $this->validate($request,[

            'txtPassword' => 'required|min:3|max:32',
            'txtRpassword' => 'required|same:txtPassword',

        ],[

            'txtPassword.required'=>'Bạn chưa nhập mật khẩu',
            'txtPassword.min'=>'mật khẩu phải có ít nhất 3 ký tự',
            'txtPassword.max'=>'mật khẩu chỉ được tối đa 32 ký tự',

            'txtRpassword.required'=>'Bạn chưa nhập lại mật khẩu',
            'txtRpassword.same'=>'Mật khẩu nhập lại chưa khớp',

        ]);
            $user->password=bcrypt($request->txtPassword);
            $user->remember_password=bcrypt($request->txtRpassword);
        }
        $user->save();

        return redirect('admin/user/danhsach')->with('thongbao','Bạn Đã Sửa Thành Công ^.^');
    }


    public function getXoa($id)
    {
        $user=User::find($id);
        $user->where(['id'=> $id])->delete();

        return redirect('admin/user/danhsach')->with('thongbao','Bạn đã xóa thành công T.T');
    }

/*
    public function postSua(Request $request,$ID)
    {
        $user=User::find($ID);
        $this->validate($request,[

            //'txtUsername' => 'min:3|max:32',
            'txtName' => 'min:3',
            'txtEmail' =>'email',
            'txtPassword' => 'min:3|max:32',
            'txtRpassword' => 'same:txtPassword',
            'txtPhone'=>'numeric'



        ],[

            //'txtUsername.min'=>'Tên người dùng phải có ít nhất 3 ký tự',
           //'txtUsername.max'=>'Tên người dùng chỉ được tối đa 32 ký tự',

            'txtName.min'=>'Tên người dùng phải có ít nhất 3 ký tự',

            'txtEmail.email'=>'Bạn chưa nhập đúng định dạng email',

            'txtPassword.min'=>'mật khẩu phải có ít nhất 3 ký tự',
            'txtPassword.max'=>'mật khẩu chỉ được tối đa 32 ký tự',

            'txtRpassword.same'=>'Mật khẩu nhập lại chưa khớp',

            'txtPhone.numeric'=>'Số điện thoại phải là số'



        ]);

       /* if($request->changePassword =="on")
        {
            $this->validate($request,[
                'txtPassword' => 'required|min:3',
                'txtRpassword' => 'required|same:txtPassword'

        ],[
            'txtPassword.required'=>'Bạn chưa nhập mật khẩu',
            'txtPassword.min'=>'mật khẩu phải có ít nhất 3 ký tự',


            'txtRpassword.required'=>'Bạn chưa nhập lại mật khẩu',
            'txtRpassword.same'=>'Mật khẩu nhập lại chưa khớp'

        ]);
             $user->Password=$request->txtPassword;
             $user->Remember_password=$request->txtRpassword;

        }
        $user->where(['ID'=> $ID])->
        update(//['Username'=> $request->txtUsername],
                ['Name'=> $request->txtName],
                ['Email'=> $request->txtEmail],
                ['Password'=> $request->txtPassword],
                ['Remember_password'=> $request->txtRpassword],
                ['Phone'=> $request->txtPhone] );

        return redirect('admin/user/sua/danhsach')->with('thongbao','Bạn đã sửa thành công');
    }

*/




   /* public function postDangnhapAdmin(Request $request)
    {
        $this->validate($request,[
            'txtEmail'=>'required',
            'txtPassword'=>'required'
        ],[
            'txtEmail.required'=>'Bạn chưa nhập Email',
            'txtPassword.required'=>'Bạn chưa nhập Password'

        ]);
        //$user=User::find();
        $user = User::where(['Email', trim($request->input('txtEmail'))],['Password', trim($request->input('txtPassword'))])->first();;
        if (!$user) {
            return redirect('admin/login')->withErrors('Email or Password không hợp lệ');
        }
        else {
            Auth::login($user);
            return redirect('admin/theloai/danhsach');
        }
    } */
   /* public function postDangnhapAdmin(Request $request)
    {
        $this->validate($request,[
            'txtEmail'=>'required',
            'txtPassword'=>'required'
        ],[
            'txtEmail.required'=>'Bạn chưa nhập Email',
            'txtPassword.required'=>'Bạn chưa nhập Password'

        ]);
        //dd($request->all());
       // DB::table('user')->where([])
        if(Auth::attempt(('Email' =>$request->txtEmail)),('Password' => $request->txtPasword))
        {
            return redirect('admin/theloai/danhsach');
        }
        else
        {
            return redirect('admin/login')->with('thongbao','đăng nhập ko thành công');
        }
    }
*/

    // public function postDangnhapAdmin(Request $request)
    // {
    //     $this->validate($request,[
    //         'txtEmail'=>'required',
    //         'txtPassword'=>'required'
    //     ],[
    //         'txtEmail.required'=>'Bạn chưa nhập Email',
    //         'txtPassword.required'=>'Bạn chưa nhập Password'

    //     ]);
    //     //dd($request->all());
    //    // DB::table('user')->where([])
    //     if(Auth::check(['email'=>$request->txtEmail ,'password'=>$request->txtPassword]))
    //     {

    //         return redirect('admin/home/dashboard');
    //     }
    //     else
    //     {
    //         return redirect('admin/login')->with('thongbao','đăng nhập ko thành công');
    //     }
    // }



//----------------------------------------Đăng nhập admin----------------------------------------------

public function getDangnhapAdmin()
{
    return view('admin.login');
}

public function postDangnhapAdmin(Request $req)
    {
        $this->validate($req,
        [
            'txtName'=>'required',
            'txtPassword'=>'required|min:6|max:20'
        ],
        [
            'txtName.required'=>'Vui lòng nhập username',
            // 'txtEmail.email'=>'Email không đúng định dạng',
            'txtPassword.required'=>'Vui lòng nhập mật khẩu',
            'txtPassword.min'=>'Mật khẩu ít nhất 6 ký tự',
            'txtPassword.max'=>'Mật khẩu không quá 20 ký tự'
        ]);

        $credentiasls=array('name'=>$req->txtName,'password'=>$req->txtPassword);
        if(Auth::attempt($credentiasls)){
            return redirect('admin/home/dashboard');
        }
        else{
            // return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
            return redirect('admin/login')->with('thongbao','đăng nhập ko thành công');
        }
    }


    public function getDangXuatAdmin()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}

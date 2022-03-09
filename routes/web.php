<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/',[
    'as'=>'trangchu',
    'uses'=>'PageController@getIndex'
]);

Route::get('loai-sach/{type}',[
    'as'=>'loaisach',
    'uses'=>'PageController@getLoaiSach'
]);

Route::get('chi-tiet-sach/{ID}',[
    'as'=>'chitietsach',
    'uses'=>'PageController@getChiTietSach'
]);

Route::get('lien-he',[
    'as'=>'lienhe',
    'uses'=>'PageController@getLienHe'
]);

Route::get('about',[
    'as'=>'about',
    'uses'=>'PageController@getAbout'
]);


//------------------------------------------them/xoa sp zo giỏ hàng----------------------------------
Route::get('add-to-cart/{ID}',[
    'as'=>'themgiohang',
    'uses'=>'PageController@getAddtoCart'
]);

Route::get('del-cart/{ID}',[
    'as' => 'xoagiohang',
    'uses' => 'PageController@getDelItemCart'
]);

//------------------------------------------gio hàng (list)----------------------------------------

Route::get('list-cart',[
    'as' => 'xemgiohang',
    'uses' => 'PageController@getXemCart'
]);
Route::get('delete-item-list-cart/{ID}',[
    'as' => 'xoalistgiohang',
    'uses' => 'PageController@getDeleteItemListCart'
]);
Route::post('Save-Item-List-Cart/{ID}/{quanty}',[
    'as' => 'sualistgiohang',
    'uses' => 'PageController@postSaveItemListCart'
]);

//-----------------------------------Dat hàng---------------------------------------------------
Route::get('dat-hang',[
    'as' => 'dathang',
    'uses' => 'PageController@getCheckout'
]);

Route::post('dat-hang',[
    'as' => 'dathang',
    'uses' => 'PageController@postCheckout'
]);



//----------------------------dang ky/dangnhap/dangxuat của người dùng---------------------------------
route::get('dang-nhap',[
    'as'=>'login',
    'uses'=>'PageController@getLogin'
]);

route::post('dang-nhap',[
    'as'=>'login',
    'uses'=>'PageController@postLogin'
]);

route::get('dang-ky',[
    'as'=>'signin',
    'uses'=>'PageController@getSignin'
]);

route::post('dang-ky',[
    'as'=>'signin',
    'uses'=>'PageController@postSignin'
]);

route::get('dang-xuat',[
    'as'=>'logout',
    'uses'=>'PageController@postLogout'
]);
//--------------------------------------------------------------------------------------------------------


//--------------------------------------------thong tin Người dung----------------------------------


route::get('thong-tin',[
    'as'=>'thongtin',
    'uses'=>'PageController@getthongtin'
]);
route::post('thong-tin',[
    'as'=>'thongtin',
    'uses'=>'PageController@postthongtin'
]);


//---------------------------------------Tìm kiếm---------------------------------------------------------
route::get('search',[
    'as'=>'search',
    'uses'=>'PageController@getSearch'
]);



/*  ------ bỏ---------------
Route::get('image', function(){
    return view('admin.sach.danhsach');
});
Route::post('image', 'UploadController@uploadFile');*/



//--------------------------------------Admin-----------------------------------------------------------
Route::get('admin/login', 'UserController@getDangnhapAdmin');
Route::post('admin/login','UserController@postDangnhapAdmin');
// Route::get('admin/logout','UserController@getDangXuatAdmin');
route::get('admin-logout',[
    'as'=>'adminlogout',
    'uses'=>'UserController@getDangXuatAdmin'
]);


Route::group(['prefix' => 'admin','middleware'=>'adminLogin'], function () {

    Route::group(['prefix' => 'home'], function () {
        //admin/home/dashboard
        Route::get('dashboard','HomeController@getHome');

    });

    Route::group(['prefix' => 'chitietdonhang'], function () {
        //admin/chitietdonhang/danhsach
        Route::get('danhsach','ChitietdonhangController@getDanhSach');

        Route::get('sua','ChitietdonhangController@getSua');

        Route::get('them','ChitietdonhangController@getThem');
        Route::post('them','ChitietdonhangController@postThem');
    });

    Route::group(['prefix' => 'donhang'], function () {
        //admin/donhang/danhsach
        Route::get('danhsach','DonHangController@getDanhSach');

        Route::get('sua','DonHangController@getSua');

        Route::get('them','DonHangController@getThem');
        Route::post('them','DonHangController@postThem');

    });

    Route::group(['prefix' => 'giaohang'], function () {
        //admin/giaohang/danhsach
        Route::get('danhsach','GiaoHangController@getDanhSach');

        Route::get('sua','GiaoHangController@getSua');

        Route::get('them','GiaoHangController@getThem');
        Route::post('them','GiaoHangController@postThem');

    });
    Route::group(['prefix' => 'image'], function () {
        //admin/image/danhsach
        Route::get('danhsach','ImageController@getDanhSach');

        Route::get('sua/{ID}','ImageController@getSua');
        Route::post('sua/{ID}','ImageController@postSua');

        Route::get('them','ImageController@getThem');
        Route::post('them','ImageController@postThem');

        Route::get('xoa/{ID}','ImageController@getXoa');

    });
    Route::group(['prefix' => 'khachhang'], function () {
          //admin/khachhang/danhsach
        Route::get('danhsach','KhachHangController@getDanhSach');

        Route::get('sua/{ID}','KhachHangController@getSua');
        Route::post('sua/{ID}','KhachHangController@postSua');

        Route::get('them','KhachHangController@getThem');
        Route::post('them','KhachHangController@postThem');

        Route::get('xoa/{ID}','KhachHangController@getXoa');

    });
    Route::group(['prefix' => 'sach'], function () {
         //admin/sach/danhsach
         Route::get('danhsach','SachController@getDanhSach');

         Route::get('sua/{ID}','SachController@getSua');
         Route::post('sua/{ID}','SachController@postSua');

         Route::get('them','SachController@getThem');
         Route::post('them','SachController@postThem');

         Route::get('xoa/{ID}','SachController@getXoa');

    });
    Route::group(['prefix' => 'theloai'], function () {
         //admin/theloai/danhsach
        Route::get('danhsach','TheLoaiController@getDanhSach');

        Route::get('sua/{ID}','TheLoaiController@getSua');
        Route::post('sua/{ID}','TheLoaiController@postSua');

        Route::get('them','TheLoaiController@getThem');
        Route::post('them','TheLoaiController@postThem');

        Route::get('xoa/{ID}','TheLoaiController@getXoa');


    });
    Route::group(['prefix' => 'tacgia'], function () {
         //admin/tacgia/danhsach
        Route::get('danhsach','TacGiaController@getDanhSach');

        Route::get('sua/{ID}','TacGiaController@getSua');
        Route::post('sua/{ID}','TacGiaController@postSua');

        Route::get('them','TacGiaController@getThem');
        Route::post('them','TacGiaController@postThem');

        Route::get('xoa/{ID}','TacGiaController@getXoa');

    });
    Route::group(['prefix' => 'user'], function () {
        //admin/user/danhsach
        Route::get('danhsach','UserController@getDanhSach');

        Route::get('sua/{ID}','UserController@getSua');
        Route::post('sua/{ID}','UserController@postSua');

        Route::get('them','UserController@getThem');
        Route::post('them','UserController@postThem');

        Route::get('xoa/{ID}','UserController@getXoa');


    });


});

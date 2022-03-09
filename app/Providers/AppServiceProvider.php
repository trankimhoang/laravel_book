<?php

namespace App\Providers;

//use App\TheLoai as AppTheLoai;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use App\TheLoai;
use App\Cart;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //hien link trnag web phia duoi b/phân trang

        view()->composer('header',function($view){
            $loai_sp=TheLoai::all();


            $view->with('loai_sp',$loai_sp);/*'cart'=> Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalQty,'totalPrice'=>$cart->totalQty*/
        });
        view()->composer(['header','Page.dathang','Page.giohang'],function($view){
            if(Session('cart'))
            {
                $oldCart=session()->get('cart');
                $cart=new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }

        });
        // view()->composer(['Page.chitietsach'],function($view){
        //     if(Session('cartsl'))
        //     {
        //         $oldCart=session()->get('cartsl');
        //         $cart=new Cart($oldCart);
        //         $view->with(['cartsl'=>Session::get('cartsl'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
        //     }

        // });

        Validator::extend('recaptcha', 'App\Validators\Recaptcha@validate');
    }
}

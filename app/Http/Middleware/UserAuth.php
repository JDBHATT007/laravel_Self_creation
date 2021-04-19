<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->path()=="login" && $request->session()->has('user')){
            return redirect('/');
        }
        if($request->path()=="register" && $request->session()->has('user')){
            return redirect('/');
        }

        if(($request->path()=="checkout" || $request->path()=="ordernow" || $request->path()=="cartlist") && !$request->session()->has('user')){
            return redirect('/');
        }

        if(($request->path()=="removecart" || $request->path()=="increaseQuantity" || $request->path()=="decreaseQuantity" || $request->path()=="viewOrderDetail" || $request->path()=="me") && !$request->session()->has('user')){
            return redirect('/');
        }

        if(($request->path()=="checkout" || $request->path()=="ordernow" || $request->path()=="cartlist" || $request->path()=="me") && $request->session()->get('userType')!='user'){
            return redirect('/');
        }

        if(($request->path()=="removecart" || $request->path()=="increaseQuantity" || $request->path()=="decreaseQuantity" || $request->path()=="viewOrderDetail") && $request->session()->get('userType')!='user'){
            return redirect('/');
        }

        if(($request->path()=="deleteUser" || $request->path()=="addCategory" || $request->path()=="deleteCategory" || $request->path()=="addBrand") && $request->session()->get('userType')!='admin'){
            return redirect('/');
        }

        if(($request->path()=="deleteBrand" || $request->path()=="addProduct" || $request->path()=="deleteProduct" || $request->path()=="admindashboard") && $request->session()->get('userType')!='admin'){
            return redirect('/');
        }


        return $next($request);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_master;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index(){
        $data=Product::all();
        $category=Category::all();
        $brand=Brand::all();
        return view('home',['products'=>$data,'categories'=>$category,'brands'=>$brand]);
    }

    function allProducts(){
        $data=Product::all();
        return view('products',['products'=>$data]);
    }

    function categoryProduct($id){
        $data=Product::where('category',$id)->get();
        return view('categoryProduct',['products'=>$data]);
    }

    function brandProduct($id){
        $data=Product::where('brand',$id)->get();
        return view('brandProduct',['products'=>$data]);
    }

    function addCategory(Request $req){
        $a=Category::where('name',$req->name)->count();
        if($a==0){
            $cat=new Category;
            $cat->name=$req->name;
            $cat->save();
            return redirect('/admindashboard');
        }
        else{
            return "Category already exists.!";
        }
    }

    function deleteCategory($id){
        Category::where('id',$id)->delete();
        return redirect('/admindashboard');
    }

    function addBrand(Request $req){
        $a=Brand::where('name',$req->name)->count();
        if($a==0){
            $cat=new Brand;
            $cat->name=$req->name;
            $cat->save();
            return redirect('/admindashboard');
        }
        else{
            return "Brand already exists.!";
        }
    }

    function deleteBrand($id){
        Brand::where('id',$id)->delete();
        return redirect('/admindashboard');
    }

    function addProduct(Request $req){
        $a=Product::where('name',$req->name)->count();
        if($a==0){
            $product=new Product;
            $product->name=$req->name;
            $product->price=$req->price;
            $product->description=$req->desc;
            $product->gallery=$req->img_url;
            $product->brand=$req->brand;
            $product->category=$req->category;
            $product->save();
            return redirect('/admindashboard');
        }
        else{
            return "Brand already exists.!";
        }
    }

    function deleteProduct($id){
        Product::where('id',$id)->delete();
        return redirect('/admindashboard');
    }

    function detail($id)
    {
        $data=Product::find($id);
        return view('productdetail',['product'=>$data]);
    }

    function orderDetail($id){
        $data=Order::where('order_id',$id)->get();
        return view('orderDetails',['orders'=>$data]);
    }

    function search(Request $req){
        $data=Product::where('name','like','%'.$req->input('query').'%')->get();
        return view('search',['products'=>$data]);
    }

    function addToCart(Request $req)
    {
        if($req->session()->has('user')){
            $qty = Cart::where(['product_id'=>$req->product_id,'user_id'=>$req->session()->get('user')['id']])->count();
            if ($qty==0) {

                $cart = new Cart;
                $cart->user_id = $req->session()->get('user')['id'];
                $cart->product_id = $req->product_id;
                $cart->quantity = 1;
                $cart->save();
                return redirect('/')->with('success','Item added in to cart.');
            }
            else{
                return redirect('/')->with('warning','Item is already in cart.');
            }
        }
        else{
            return redirect('/login');
        }

    }

    static function cartitem(){
        $userid=Session::get('user')['id'];
        return Cart::where('user_id',$userid)->count();
    }

    function cartList(){
        $userId=Session::get('user')['id'];
        $products=DB::table('carts')
        ->join('products','carts.product_id','=','products.id')
        ->where('carts.user_id',$userId)
        ->select('products.*','carts.id as cart_id','carts.*')
        ->get();

        return view('cartlist',['products'=>$products]);

    }

    function removeCart($id){
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function increaseQuantity($id){
        $qty=Cart::where('id',$id)->get();
        //$q=$qty['quantity'];

        foreach($qty as $q){
            $tq=$q['quantity'];
        }
        $tq=$tq+1;
        Cart::where('id',$id)->update(['quantity'=>$tq]);
        //return $tq;
        return redirect('cartlist');
    }

    function decreaseQuantity($id){
        $qty=Cart::where('id',$id)->get();
        //$q=$qty['quantity'];

        foreach($qty as $q){
            $tq=$q['quantity'];
        }
        if($tq!=1){
            $tq=$tq-1;
            Cart::where('id',$id)->update(['quantity'=>$tq]);
        }
        //return $tq;
        return redirect('cartlist');
        //return redirect('cartlist');
    }

    function checkout(Request $req){
        $gt=$req->grand_total;

        return view('checkout',['total'=>$gt]);
    }

    function ordernow(Request $req){
        $userId=Session::get('user')['id'];
        $allcart=Cart::where('user_id',$userId)->get();

        $Random_order_id=rand(1000,9999);
        $orderMaster=new Order_master;
        $orderMaster->user_id=$userId;
        $orderMaster->order_id=$Random_order_id;
        $orderMaster->status="pending";
        $orderMaster->payment_method=$req->payment;
        $orderMaster->address=$req->address;
        $orderMaster->payment_status="pending";
        $orderMaster->amount=$req->grand_total;
        $orderMaster->save();

        foreach($allcart as $cart){
            $prod_price=Product::where('id',$cart['product_id'])->get();

            foreach($prod_price as $q){
                $prod_price_amount=$q['price'];
            }

            $order=new Order;
            $order->product_id=$cart['product_id'];
            $order->order_id=$Random_order_id;
            $order->amount=$cart['quantity']*$prod_price_amount;
            $order->product_price=$prod_price_amount;
            $order->quantity=$cart['quantity'];
            $order->save();
            Cart::where('user_id',$userId)->delete();
        }
        return redirect('/');
    }
}

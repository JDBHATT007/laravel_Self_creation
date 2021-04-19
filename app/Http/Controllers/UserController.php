<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order_master;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login(Request $req)
    {
        $user=User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password, $user->password))
        {
            return "Username or password is incorrect..!";
        }
        else{
            $req->session()->put('user',$user);
            $req->session()->put('userType',$user->type);

            return redirect('/');


        }
    }

    function register(Request $req)
    {
        $user=new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->type='user';
        $user->save();
        return redirect('/login');
    }

    function me(Request $req){
        $user=$req->session()->get('user');
        $orders=Order_master::where('user_id',$user->id)->get();
        //return $orders;
        return view('profile',['orders'=>$orders, 'user'=>$user]);
    }

    function updateProfile(Request $req){
        $user=$req->session()->get('user');
        $name=$req->name;


        User::where('id',$user->id)->update(['name'=>$name]);
        if($user->type != 'admin'){
            return redirect('/me');
        }
        else{
            return redirect('/admindashboard');
        }
    }

    function changePassword(Request $req){
        $user=$req->session()->get('user');
        $oldPassword=$req->oldPassword;
        $newPassword=$req->newPassword;
        $cnewPassword=$req->cnewPassword;
        if($oldPassword!=null && $newPassword!=null && $cnewPassword!=null){
            if(!Hash::check($req->oldPassword, $user->password)){
                return "Old password not matched";
            }
            else{
                if($cnewPassword==$newPassword){
                    User::where('id',$user->id)->update(['password'=>Hash::make($cnewPassword)]);
                }
                else{
                    return "Both new password must be same";
                }
            }
        }
        else{
            return "Please fill all the fields";
        }
        if($user->type != 'admin'){
            return redirect('/me');
        }
        else{
            return redirect('/admindashboard');
        }
    }

    function deleteUser($id){
        User::where('id',$id)->delete();
        return redirect('/admindashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthloginController extends Controller
{
    public function index(){
        return view('frontend.authlogin.login');
    }
    public function register(){
        return view('frontend.authlogin.register');
    }
    //login bằng email
    public function redirectgoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleback(){
        try {
            $usergoogle = Socialite::driver('google')->user();
        if($usergoogle){
            session()->put('user', $usergoogle);
            return redirect()->route('/');  
        }else{
            return redirect()->back()->with('error', 'Lỗi đăng nhập');
        };
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Lỗi đăng nhập email');
        }
    }
    //login bằng facebook
    public function redirectfacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    public function handlefacebookback(){
        try {
            $userfacebook = Socialite::driver('facebook')->user();
        if($userfacebook){
            session()->put('user', $userfacebook);
            return redirect()->route('/');  
        }else{
            return redirect()->back()->with('error', 'Lỗi đăng nhập');
        };
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Lỗi đăng nhập email');
        }
    }
}

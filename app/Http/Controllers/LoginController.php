<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    //登录页面
    public function index(){
        return view('login.index');
    }

    //登录行为
    public function login(){
        //验证
        $this->validate(request(),[
           'email' => 'required|email',
           'password'=> 'required|min:5|max:18',
           'is_remember' => 'integer'
        ]);

        $user = request(['email','password']);
        $is_remember = boolval(request('is_remember'));
        if (\Auth::attempt($user,$is_remember)){
            return redirect('posts');
        }

        return \Redirect::back()->withErrors("用户名密码错误");
    }

    //登出行为
    public function logout(){
        \Auth::logout();
        return redirect('/login');
    }
}

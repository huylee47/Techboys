<?php

namespace App\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService {
    public function index(){
        return view('login');
    }
    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $account = User::where('username', $username)->first();
        
        if (!$account) {
           return redirect()->back()->with('error','không tìm thấy tài khoản ');
        }
        
        if (!Hash::check($password, $account->password)) {
            return redirect()->back()->with('error','mật khẩu không đúng');
        }
        Auth::login($account);
        // $user = Auth::user();   
        return redirect('/admin')->with('sucess','đăng nhập thành công');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success','đăng xuất thành công');
    }
}
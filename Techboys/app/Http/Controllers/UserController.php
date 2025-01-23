<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ADMIN
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
    
        $account = User::where('username', $username)->first();
        
        if (!$account) {
            return redirect()->back()->with('error', 'Không tìm thấy tài khoản.');
        }
        
        if (!Hash::check($password, $account->password)) {
            return redirect()->back()->with('error', 'Mật khẩu không đúng.');
        }
        
        if ($account->role_id != 1 && $account->role_id != 2) {
            return redirect()->back()->with('error', 'Bạn không có quyền truy cập vào trang quản trị.');
        }
        
        Auth::login($account);
        
        return redirect()->route('admin.index')->with('success', 'Đăng nhập thành công.');
    }
    

}

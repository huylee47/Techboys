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

    public function index()
    {

        $loadAll = User::all();
        return view('admin.user.index', compact('loadAll'));
    }
    public function block(Request $request) {
        $user = User::find($request->id);
        $user->update(['status' => 0]);
        return redirect()->route('admin.user.index')->with('success', 'Khóa tài khoản thành công.');
    }
    
    public function open(Request $request) {
        $user = User::find($request->id);
        $user->update(['status' => 1]);
        return redirect()->route('admin.user.index')->with('success', 'Mở tài khoản thành công.');
    }

    // public function user(Request $request) {
    //     $user = User::find($request->id);
    //     $user->update(['role_id' => 2]);
    //     return redirect()->route('admin.user.index')->with('success', 'Thay đổi vai trò thành công.');
    // }
    
    // public function admin(Request $request) {
    //     $user = User::find($request->id);
    //     $user->update(['role_id' => 1]);
    //     return redirect()->route('admin.user.index')->with('success', 'Thay đổi vai trò thành công.');
    // }
    // public function edit(Request $request)
    // {
    //     //
    //     $show = User::find($request->id);
    //     return view('admin.user.edit', compact('show'));
    // }
    // public function update(Request $request){
    //     User::find($request->id)->update([
    //       'role_id' => $request->role_id
    //     ]);
    //     return redirect()->route('admin.user.index')->with('success', 'Cập nhật thành công');
    // }

}

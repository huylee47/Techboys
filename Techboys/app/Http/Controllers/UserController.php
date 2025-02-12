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
    public function block(Request $request)
    {
        $user = User::find($request->id);
        $user->update(['status' => 0]);
        return redirect()->route('admin.user.index')->with('success', 'Khóa tài khoản thành công.');
    }

    public function open(Request $request)
    {
        $user = User::find($request->id);
        $user->update(['status' => 1]);
        return redirect()->route('admin.user.index')->with('success', 'Mở tài khoản thành công.');
    }

    //client
    public function create()
    {
        return view('admin.log.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|max:11',
            'password' => 'required|string|min:8',
            'password1' => 'required|string|same:password'
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'name.max' => 'Họ tên không được vượt quá 255 ký tự.',
            'username.required' => 'Vui lòng nhập tên đăng nhập.',
            'username.max' => 'Tên đăng nhập không được vượt quá 255 ký tự.',
            'username.unique' => 'Tên đăng nhập đã tồn tại.',
            'email.required' => 'Vui lòng nhập email.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã tồn tại.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.max' => 'Số điện thoại không được vượt quá 11 ký tự.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password1.required' => 'Vui lòng nhập mật khẩu xác nhận.',
            'password1.same' => 'Mật khẩu xác nhận phải trùng với mật khẩu đã nhập.'
        ]);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => 1,
            'role_id' => 0,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success', 'Tạo thành công');
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Mail\verifyAccount;
use Illuminate\Auth\Notifications\VerifyEmail;
use Mail;
use App\Models\User;
use App\Models\UserResetToken;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\alert;

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
    public function create_user()
    {
        return view('admin.user.create');
    }
    public function store_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|max:11',
            'password' => 'required|string|min:8',
            'confirm_Password' => 'required|string|same:password'
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
            'confirm_Password.required' => 'Vui lòng nhập mật khẩu xác nhận.',
            'confirm_Password.same' => 'Mật khẩu xác nhận phải trùng với mật khẩu đã nhập.'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => 1,
            'role_id' => 1,
            'password' => Hash::make($request->password),
        ]);


        return redirect()->route('admin.user.index')->with('success', 'tạo tài khoản thành công.');
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
            'password-confirm' => 'required|string|same:password'
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
            'password-confirm.required' => 'Vui lòng nhập mật khẩu xác nhận.',
            'password-confirm.same' => 'Mật khẩu xác nhận phải trùng với mật khẩu đã nhập.'
        ]);

        $data = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => 1,
            'role_id' => 0,
            'password' => Hash::make($request->password),
        ]);

        if ($acc = $data) {
            Mail::to($acc->email)->send(new verifyAccount($acc));
            return redirect()->route('login')->with('success', 'Đăng ký thành công, vui lòng check gmail của bạn');
        }
        return redirect()->back()->with('no', 'tạo không thành công vui lòng kiểm tra lại');
    }

    public function veryfi($email)
    {
        User::where('email', $email)->whereNull('email_verified_at')->firstOrFail();
        User::where('email', $email)->update(['email_verified_at' => date('Y-m-d')]);
        return redirect()->route('login')->with('success', 'xác minh thành công');
    }

    public function forgot_password()
    {
        return view('admin.log.forgot');
    }
    public function check_forgot_password(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|exists:users,email',
        ], [
            'email.required' => 'Vui lòng nhập email.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'email.email' => 'Email không đúng định dạng.',
            'email.exists' => 'Email không tồn tại.'
        ]);
        $user = User::where('email', $request->email)->first();

        $token = \Str::random(20);
        $tokenData = [
            'email' => $request->email,
            'token' => $token
        ];
        if (UserResetToken::create($tokenData)) {
            Mail::to($request->email)->send(new ForgotPassword($user, $token));
            return redirect()->back()->with('success', 'Vui lòng kiểm tra gmail của bạn');
        }
        return redirect()->back()->with('no', 'Xảy ra lỗi vui long kiểm tra lại');
    }

    public function reset_password($token, Request $request) {
        $tokenRecord = UserResetToken::where('token', $token)->firstOrFail();
        return view('admin.log.reset_password', ['token' => $token]);
    }
    

    public function check_reset_password($token, Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8',
            'password-confirm' => 'required|string|same:password'
        ], [
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password-confirm.required' => 'Vui lòng nhập mật khẩu xác nhận.',
            'password-confirm.same' => 'Mật khẩu xác nhận phải trùng với mật khẩu đã nhập.'
        ]);

        $tokenRecord = UserResetToken::where('token', $token)->firstOrFail();
        $user = $tokenRecord->user;
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            return redirect()->route('login')->with('success', 'Đổi mật khẩu thành công');
        }

        return redirect()->back()->with('no', 'Đổi mật khẩu không thành công');
    }
}

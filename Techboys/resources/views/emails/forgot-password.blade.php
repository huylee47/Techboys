    <h3>Hi {{ $user->name }}</h3>
    <p>
Chúng tôi thấy bạn có yêu cầu thay đổi mật khẩu, hãy nhấn xác nhận đội mật khẩu nếu đó là bạn.
    </p>
    <p>
        <a href="{{ route('admin.reset_password',$token) }}"  >Xác nhận đổi mật khẩu</a> 
    </p>
   

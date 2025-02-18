<h3>Hi {{ $account->name }}</h3>
<p>Chúng tôi gửi cho bạn gmail xác nhận tài khoản trên web TechBoys, vui lòng nhấn xác minh tài khoản để xác minh tài khoản của bạn  </p>
<p>
    <a href="{{ route('clinet.veryfi',$account->email) }}">Xác minh tài khoản</a>
</p>
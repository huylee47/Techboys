<h3>h1{{ $account->name }}</h3>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil ut tempore recusandae cumque perferendis nesciunt necessitatibus nisi quisquam temporibus provident enim tempora facere fuga reprehenderit aliquam, earum alias, non possimus?</p>
<p>
    <a href="{{ route('admin.veryfy',$account->email) }}">Xác minh tài khoản</a>
</p>
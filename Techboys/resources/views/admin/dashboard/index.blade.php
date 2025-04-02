@extends('admin.layouts.master')
@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Tổng quan trang web</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Người đang trực tuyến</h6>
                                            <h6 class="font-extrabold mb-0">{{ $onlineUsers }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon blue">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Người dùng truy cập tháng này</h6>
                                            <h6 class="font-extrabold mb-0">{{ $visitorsThisMonth }} </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon red">
                                                <i class="iconly-boldBookmark"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Người dùng truy cập hôm nay </h6>
                                            <h6 class="font-extrabold mb-0">{{$visitorsToday}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon green">
                                                <i class="iconly-boldAdd-User"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Khách hàng đăng ký tài khoản tháng này</h6>
                                            <h6 class="font-extrabold mb-0">{{$registeredUsersMonth}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Profile Visit</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-profile-visit"></div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Bình luận gần đây</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-lg">
                                            <thead>
                                                <tr>
                                                    <th>Khách hàng</th>
                                                    <th>Nội dung bình luận</th>
                                                    <th>Sản phẩm</th>
                                                </tr>
                                            </thead>
                                            <tbody id="latest-comments">
                                                @foreach ($latestComments as $comment)
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    <img src=" {{ asset('home/assets/images/user.png') }}"
                                                                        alt="User Avatar">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0">{{ $comment['user']->name }}
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class="mb-0">{{ $comment['content'] }}</p>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class="mb-0">{{ $comment['product']->name }}</p>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <script>
                                                function fetchLatestComments() {
                                                    fetch("{{ route('admin.getLatestComments') }}")
                                                        .then(response => response.json())
                                                        .then(data => {
                                                            let tbody = document.getElementById('latest-comments');
                                                            tbody.innerHTML = '';
                                                            data.forEach(comment => {
                                                                let row = `
                                                                    <tr>
                                                                        <td class="col-3">
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="avatar avatar-md">
                                                                                    <img src="${comment.user.avatar ?? 'default-avatar.png'}" alt="User Avatar">
                                                                                </div>
                                                                                <p class="font-bold ms-3 mb-0">${comment.user.name}</p>
                                                                            </div>
                                                                        </td>
                                                                        <td class="col-auto">
                                                                            <p class="mb-0">${comment.content}</p>
                                                                        </td>
                                                                        <td class="col-auto">
                                                                            <p class="mb-0">${comment.product.name}</p>
                                                                        </td>
                                                                    </tr>
                                                                `;
                                                                tbody.innerHTML += row;
                                                            });
                                                        });
                                                }

                                                setInterval(fetchLatestComments, 5000);
                                            </script>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card">
                        <div class="card-body py-4 px-5">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                    <img src="{{ asset('admin/assets/images/faces/2.jpg') }}" alt="Avatar">
                                </div>
                                <div class="ms-3 name">
                                    <h6 class="font-bold">Xin chào ,{{ $user->name }}</h6>
                                </div>
                            </div>
                            <form action="{{ route('admin.logout') }}" method="POST" class="mt-3">
                                @csrf
                                <button type="submit" class="btn btn-danger w-50 ">
                                    <i class="bi bi-box-arrow-right"></i> Đăng xuất
                                </button>
                            </form>
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Hoá đơn được tạo gần đây</h4>
                        </div>
                        <div class="card-content pb-4">
                            <div class="recent-message d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                    <img src="">
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1">Hank Schrader</h5>
                                    <h6 class="text-muted mb-0">@johnducky</h6>
                                </div>
                            </div>
                            <div class="px-4">
                                <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Quản lý đơn hàng</button>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="card">
                        <div class="card-header">
                            <h4>Visitors Profile</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-visitors-profile"></div>
                        </div>
                    </div> --}}
                </div>
            </section>
        </div>
    @endsection
    @section('scripts')
    <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
    @vite(['resources/js/app.js'])
    @endsection


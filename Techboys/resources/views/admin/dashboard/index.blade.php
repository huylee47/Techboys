@extends('admin.layouts.master')
@section('main')
    <style>
        .bell-shake {
            animation: shake 0.8s ease-in-out infinite;
        }

        @keyframes shake {

            0%,
            100% {
                transform: rotate(0deg);
            }

            20% {
                transform: rotate(-15deg);
            }

            40% {
                transform: rotate(15deg);
            }

            60% {
                transform: rotate(-10deg);
            }

            80% {
                transform: rotate(10deg);
            }
        }

        .fade-in {
            opacity: 0;
            transform: translateY(-10px);
            animation: fadeIn 0.8s forwards;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Trang tổng quan </h3>
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
                                            <h6 class="text-muted font-semibold">Người truy cập tháng này</h6>
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
                                            <h6 class="text-muted font-semibold">Người truy cập hôm nay </h6>
                                            <h6 class="font-extrabold mb-0">{{ $visitorsToday }}</h6>
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
                                            <h6 class="text-muted font-semibold">Tài khoản đăng ký tháng</h6>
                                            <h6 class="font-extrabold mb-0">{{ $registeredUsersMonth }}</h6>
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
                                                // function fetchLatestComments() {
                                                //     fetch("{{ route('admin.getLatestComments') }}")
                                                //         .then(response => response.json())
                                                //         .then(data => {
                                                //             let tbody = document.getElementById('latest-comments');
                                                //             tbody.innerHTML = '';
                                                //             data.forEach(comment => {
                                                //                 let row = `
    //                     <tr>
    //                         <td class="col-3">
    //                             <div class="d-flex align-items-center">
    //                                 <div class="avatar avatar-md">
    //                                     <img src="${comment.user.avatar ?? 'default-avatar.png'}" alt="User Avatar">
    //                                 </div>
    //                                 <p class="font-bold ms-3 mb-0">${comment.user.name}</p>
    //                             </div>
    //                         </td>
    //                         <td class="col-auto">
    //                             <p class="mb-0">${comment.content}</p>
    //                         </td>
    //                         <td class="col-auto">
    //                             <p class="mb-0">${comment.product.name}</p>
    //                         </td>
    //                     </tr>
    //                 `;
                                                //                 tbody.innerHTML += row;
                                                //             });
                                                //         });
                                                // }

                                                // setInterval(fetchLatestComments, 5000);
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
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Hoá đơn gần đây</h4>
                            <button class="btn position-relative">
                                <i id="notification-bell" class="bi bi-bell-fill text-warning fs-4"></i>
                            </button>
                        </div>
                        
                        <div class="card-content pb-4" id="recent-bills" style="max-height: 400px; overflow-y: auto;">
                            @foreach ($recentBills as $bill)
                            <a href="{{route('admin.bill.show',['id'=>$bill->id])}}">
                                <div class="recent-message d-flex px-4 py-3 border-bottom">
                                    <div class="avatar avatar-lg">
                                        <img src="{{ asset('home/assets/images/user.png') }}" alt="User Avatar">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">{{ $bill->full_name }}</h5>
                                        <h6 class="text-muted mb-0">
                                            Mã đơn: {{ $bill->order_id }} - Tổng:
                                            {{ number_format($bill->total, 0, ',', '.') }}đ
                                        </h6>
                                        <small class="text-muted">{{ $bill->created_at->format('d/m/Y H:i') }}</small>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        <div class="px-4">
                            <a href="{{route('admin.bill.index')}}">
                            <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Quản lý đơn hàng</button></a>
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
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Pusher.logToConsole = true;
        
                Echo.channel('admin.newbill')
                    .listen("NewBillCreated", (event) => {
                        console.log('Có đơn hàng mới:', event);
        
                        // Chạy âm thanh thông báo
                        const audio = new Audio('https://audio-previews.elements.envatousercontent.com/files/107007232/preview.mp3');
                        audio.play();
        
                        let recentBillsContainer = document.getElementById('recent-bills');
                        let bellIcon = document.getElementById('notification-bell');
        
                        if (!recentBillsContainer || !bellIcon) {
                            console.error("Không tìm thấy phần tử 'recent-bills' hoặc 'notification-bell'");
                            return;
                        }
        
                        bellIcon.classList.add("bell-shake");
                        setTimeout(() => {
                            bellIcon.classList.remove("bell-shake");
                        }, 1500);
        
                        // Tạo HTML cho đơn hàng mới
                        let newBillHtml = `
                            <a href="{{ url('admin/bill/bill-detail') }}/${event.bill_id}/show" class="text-decoration-none">
                                <div class="recent-message d-flex px-4 py-3 border-bottom fade-in">
                                    <div class="avatar avatar-lg">
                                        <img src="{{ asset('home/assets/images/user.png') }}" alt="User Avatar">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">${event.full_name}</h5>
                                        <h6 class="text-muted mb-0">
                                            Mã đơn: ${event.order_id} - Tổng: ${event.total.toLocaleString()}đ
                                        </h6>
                                        <small class="text-muted">${new Date().toLocaleString('vi-VN')}</small>
                                    </div>
                                </div>
                            </a>
                        `;
        
                        // Thêm đơn hàng mới vào danh sách
                        recentBillsContainer.insertAdjacentHTML('afterbegin', newBillHtml);
        
                        // Cuộn đến đầu danh sách
                        recentBillsContainer.scrollTop = 0;
                    });
            });
        </script>
        
        
    @endsection

@extends('admin.layouts.master')
@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3>Quản lý khuyến mãi</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-9">
                                  
                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Sản phẩm đang khuyến mãi </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-lg">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Sản phẩm</th>
                                                    <th>Khuyến mãi</th>
                                                    <th>Giá trước-sau khuyến mãi</th>
                                                    <th>Bắt đầu</th>
                                                    <th>Kết thúc</th>
                                                    <th>Tùy chọn</th>

                                                </tr>
                                            </thead>
                                            <tbody id="latest-comments">
                                                {{-- @foreach($latestComments as $comment)
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    <img src="{{ $comment['user']->avatar ?? 'default-avatar.png' }}" alt="User Avatar">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0">{{ $comment['user']->name }}</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class="mb-0">{{ $comment['content'] }}</p>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class="mb-0">{{ $comment['product']->name }}</p>
                                                        </td>
                                                    </tr>
                                                @endforeach --}}
                                            </tbody>
                                            {{-- <script>
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
                                            </script> --}}
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
                            
                        </div>
                        
                    </div>
                    

                </div>
            </section>
        </div>
    @endsection

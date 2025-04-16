@extends('admin.layouts.master')
@section('main')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Bình luận</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách comment</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        {{-- Thông báo --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif


                        {{-- Bảng danh sách thẻ --}}
                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th class="col-0">STT</th>
                                    <th class="col-1">Người bình luận </th>
                                    <th class="col-1">Sản phẩm</th>
                                    <th class="col-3">Nội dung</th>
                                    <th class="col-1">Rate</th>
                                    <th class="col-3">Rep bình luận </th>
                                    <th class="col-1">Trạng thái</th>
                                    <th style="text-align: center" class="col-2">Chức năng</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loadAll as $key => $cmt)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $cmt->user->name }}</td>
                                        <td>{{ $cmt->product->name }}</td>
                                        <td>{{ $cmt->content }}
                                            <br>
                                              @if($cmt->storage && strtolower(pathinfo($cmt->storage->file, PATHINFO_EXTENSION)) === 'mp4')
                                                <video width="150" height="100" controls>
                                                    <source src="{{ asset('admin/assets/images/comment/' . $cmt->storage->file) }}?t={{ time() }}"
                                                        type="video/mp4">
                                                    Trình duyệt của bạn không hỗ trợ thẻ video.
                                                </video>
                                            @elseif($cmt->storage)
                                                <img src="{{ asset('admin/assets/images/comment/' . $cmt->storage->file) }}" alt=""
                                                    style="width: 150px; height: auto;">
                                            @endif
                                        </td>
                                       

                                             <td>{{ $cmt->rate }}</td>
                                        
                                        <td class="text-center">
                                            @foreach ($cmt->replies as $reply)
                                                <div>{{ $reply->rep_content }}</div>
                                            @endforeach
                                        </td>
                                   

                                        <td>
                                            @if ($cmt->status_id == 1)
                                                <span class="badge bg-success">Hiển thị</span>
                                            @else
                                                <span class="badge bg-danger">Đã ẩn</span>
                                            @endif
                                        </td>
                                        <td class="text-center">

                                            <form
                                                action="{{ $cmt->status_id == 1 ? route('admin.comment.block', ['id' => $cmt->id]) : route('admin.comment.open', ['id' => $cmt->id]) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                <input type="hidden" class="form-control" name="id" value="{{ $cmt->id }}">
                                                <button type="submit"
                                                    class="btn {{ $cmt->status == 1 ? ' bi-eye-slash ' : ' bi-eye-fill ' }}fs-4 mx-2" title="Nhấn để {{$cmt->status ==1 ? "hiện" : "ẩn "}} bình luận"
                                                    >
                                                </button>
                                            </form>
                                          
                                            <a href="{{ route('admin.comment.replyForm', ['id' => $cmt->id]) }}" class="bi-reply-fill" title="Nhấn để trả lời bình luận"></a>
                                        </td>
                                       
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
@endsection
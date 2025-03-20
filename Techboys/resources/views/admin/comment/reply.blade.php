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
                        <h3>Phản hồi bình luận</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.comment.index') }}">Danh sách comment</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Phản hồi bình luận</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <h5>Người bình luận: {{ $comment->user->name }}</h5>
                        <h5>Sản phẩm: {{ $comment->product->name }}</h5>
                        <p>Nội dung: {{ $comment->content }}</p>
                        <form action="{{ route('admin.comment.reply') }}" method="POST">
                            @csrf
                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                            <input type="hidden" name="product_id" value="{{ $comment->product_id }}">
                            <input type="hidden" name="content" value="{{ $comment->content }}">
                            <input type="hidden" name="rate" value="{{ $comment->rate }}">
                            <input type="hidden" name="file_id" value="{{ $comment->file_id }}">
                            <textarea name="rep_content" class="form-control" placeholder="Nhập phản hồi"></textarea>
                            <button type="submit" class="btn btn-primary mt-2">Gửi</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
@endsection

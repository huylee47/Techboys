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
                    <h3>Chi tiết liên hệ</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Phản hồi </li>
                            <li class="breadcrumb-item active" aria-current="page">Chi tiết phản hồi </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <h5>Thông tin liên hệ</h5>
                    <p><strong>Người liên hệ:</strong> {{ $contact->name }}</p>
                    <p><strong>Email:</strong> {{ $contact->email }}</p>
                    <p><strong>Số điện thoại:</strong> {{ $contact->phone }}</p>
                    <p><strong>Tin nhắn:</strong> {{ $contact->message }}</p>
                    <p><strong>Ngày gửi:</strong> {{ $contact->created_at->format('d/m/Y H:i') }}</p>
                    <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary mt-3">Quay lại danh sách</a>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

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
                        <h3>Tin tức</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách tin tức</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Thêm tin tức</a>
                        <table class="table table-striped table-bordered" id="table1">
                            <thead>
                                <tr>
                                    <th class="col-1">STT</th>
                                    <th class="col-2">Tiêu đề</th>
                                    <th class="col-2">Nội dung</th>
                                    <th class="col-3">Ảnh bìa</th>
                                    <th class="col-2">Ngày xuất bản</th>
                                    <th class="col-2">Hành động</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($loadAll as $key => $blog)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <?php
                                        $content = strip_tags(html_entity_decode($blog->content, ENT_QUOTES, 'UTF-8'));
                                        $shortContent = mb_substr($content, 0, 40, 'UTF-8') . (mb_strlen($content, 'UTF-8') > 30 ? '...' : '');
                                        ?>
                                        <td>{{ $shortContent }}</td>
                                        <td class="text-center"><img
                                                src="{{ url('admin/assets/images/blog') . '/' . $blog->image }}"
                                                alt="" style="width: 150px; height: auto;"></td>
                                        <td>{{ $blog->published_at }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.blogs.edit', ['id' => $blog['id']]) }}"
                                                class="bi-pencil-fill text-warning  fs-4 mx-2"
                                                title="Nhấn để sửa bài viết"></a>
                                            <a href="{{ route('admin.blogs.destroy', ['id' => $blog['id']]) }}"
                                                class="bi-trash-fill text-danger fs-4 mx-2" title="Nhấn để xoá bài viết"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')"></a>
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

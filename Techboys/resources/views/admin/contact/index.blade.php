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
                    <h3>Danh sách phản hồi </h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Phản hồi</li>
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
                    <table class="table table-striped table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th class="col-3">Người liên hệ</th>
                                <th class="col-2">Số điện thoại</th>
                                <th class="col-3">Tin nhắn</th>
                                <th class="col-2">Ngày tạo phản hồi</th>
                                <th class="col-2">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ Str::limit($contact->message, 50) }}</td>
                                    <td>{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.contact.detail', $contact->id) }}" class="btn btn-info mb-1">Xem</a>
                                        {{-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="openDeleteModal('{{ route('admin.contact.destroy', $contact->id) }}')">
                                        Xoá</button> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
{{-- <script>
    function openDeleteModal(actionUrl) {
        const form = document.getElementById('deleteForm');
        form.action = actionUrl;
    }
</script>
<!-- Modal xác nhận xoá -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-danger">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="deleteModalLabel">Xác nhận xoá</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
        </div>
        <div class="modal-body">
          Bạn có chắc chắn muốn xoá phản hồi này không?
        </div>
        <div class="modal-footer">
          <form method="POST" id="deleteForm">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
            <button type="submit" class="btn btn-danger">Xoá</button>
          </form>
        </div>
      </div>
    </div>
  </div> --}}
@endsection

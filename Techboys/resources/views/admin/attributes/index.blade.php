@extends('admin.layouts.master')
@section('main')
    <div id="main">
        <div class="page-title">
            <h3>Danh Sách Thuộc Tính</h3>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                <a href="{{route('admin.attributes.create')}}" class="btn btn-primary">Thêm thuộc tính</a>

                    <table class="table table-striped mt-4" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên Thuộc Tính</th>
                                <th>Giá Trị</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attributes as $attribute)
                                <tr>
                                    <td>{{ $attribute->id }}</td>
                                    <td>{{ $attribute->name }}</td>
                                    <td>
                                        @foreach ($attribute->values as $value)
                                            <span class="badge bg-primary">{{ $value->value }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="bi-pencil-fill text-warning  fs-4" title="Nhấn để sửa thuộc tính"></a>

                                        @php
                                            $canDelete = true;
                                            foreach ($attribute->values as $value) {
                                                if (in_array($value->id, $usedValuesArray)) {
                                                    $canDelete = false;
                                                    break;
                                                }
                                            }
                                        @endphp

                                        @if ($canDelete)
                                            <a href="#" class="bi-trash-fill text-danger fs-4" data-id="{{ $attribute->id }}"></a>
                                        @else
                                            <a class="bi-trash-fill text-secondary fs-4" disabled title="Thuộc tính đang được sử dụng , khônng thể xoá"></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal xác nhận xóa -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa thuộc tính này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <a href="#" id="confirmDelete" class="btn btn-danger">Xóa</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let deleteUrl = "";
            document.querySelectorAll(".delete-btn").forEach(button => {
                button.addEventListener("click", function() {
                    deleteUrl = "{{ route('admin.attributes.delete', '') }}/" + this.getAttribute("data-id");
                    document.getElementById("confirmDelete").setAttribute("href", deleteUrl);
                    let deleteModal = new bootstrap.Modal(document.getElementById("deleteModal"));
                    deleteModal.show();
                });
            });
        });
    </script>
@endsection

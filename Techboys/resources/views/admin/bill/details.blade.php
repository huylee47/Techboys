@extends('admin.layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ url('') }}/admin/assets/css/custom.css">
@endsection

@section('main')
    <div id="main">
        <header class="col-md-4 mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="card-title">Chi Tiết Hóa Đơn</h4>
                                        <span>Trạng thái đơn hàng:</span>
                                        @if ($bill->status_id == 1)
                                            <span class="badge bg-warning">Chờ xử lý đơn hàng</span>
                                        @elseif ($bill->status_id == 2)
                                            <span class="badge bg-info">Đang giao hàng</span>
                                        @elseif ($bill->status_id == 3)
                                            <span class="badge bg-success">Đã giao hàng</span>
                                        @elseif ($bill->status_id == 4)
                                            <span class="badge bg-success">Đã nhận hàng</span>
                                        @else
                                            <span class="badge bg-danger">Đã huỷ</span>
                                        @endif

                                        @if ($bill->payment_method == 1)
                                            <span class="badge bg-success">VNPAY</span>
                                        @else
                                            <span class="badge bg-success">COD</span>
                                        @endif

                                        @if ($bill->payment_status == 1)
                                            <span class="badge bg-success">Đã thanh toán</span>
                                        @else
                                            <span class="badge bg-warning">Chưa thanh toán</span>
                                        @endif
                                        @if ($bill->total < $total)
                                            <span class="badge bg-success">Áp dụng voucher/Khuyến mại</span>
                                        @endif
                                    </div>

                                    <div class="ms-auto">
                                        <a class="btn btn-primary" href="{{ route('admin.bill.index') }}">Quay lại</a>

                                        @if ($bill->status_id == 1)
                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exportModal">Xuất đơn</button>
                                            @if ($bill->payment_status != 1)
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal">Huỷ đơn</button>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                {{-- Thông tin hóa đơn --}}
                                <div class="row">
                                    @if (!empty($bill->order_id))
                                        <div class="col-md-4 mb-3">
                                            <label for="order_id">Mã Hóa Đơn</label>
                                            <input type="text" class="form-control" id="order_id"
                                                value="{{ $bill->order_id }}" readonly>
                                        </div>
                                    @else
                                        <div class="col-md-4 mb-3">
                                            <label for="order_id">Tra cứu hoá đơn bằng SĐT</label>
                                            <input type="text" class="form-control" id="order_id"
                                                value="{{ $bill->phone }}" readonly>
                                        </div>
                                    @endif

                                    <div class="col-md-4 mb-3">
                                        <label for="full_name">Tên khách hàng</label>
                                        <input type="text" class="form-control" id="full_name"
                                            value="{{ $bill->full_name }}" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="email">E-mail</label>
                                        <input type="text" class="form-control" id="email"
                                            value="{{ $bill->email }}" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="created_at">Ngày tạo</label>
                                        <input type="text" class="form-control" id="created_at"
                                            value="{{ $bill->created_at }}" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="address">Địa chỉ</label>
                                        <input type="text" class="form-control" id="address"
                                            value="{{ $bill->address }}" readonly>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="total">Tổng tiền</label>
                                        <input type="text" class="form-control" id="total"
                                            value="{{ number_format($bill->total, 0, ',', '.') }} đ" readonly>
                                    </div>
                                </div>

                                <h5 class="mt-4">Chi Tiết Hoá đơn</h5>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Số Lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Tổng tiền</th>
                                            <th>Khuyến mại</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($billDetails as $billDetail)
                                            @php
                                                $isPromotionActive = $productPromotions->contains(function ($promotion) use ($billDetail) {
                                                    return $promotion->product_id == $billDetail->product->id &&
                                                        $billDetail->created_at <= $promotion->end_date;
                                                });
                                            @endphp
                                            <tr>
                                                <td>
                                                    <img src="{{ url('') }}/admin/assets/images/product/{{ $billDetail->product->img }}"
                                                        alt="{{ $billDetail->product->img }}" class="img-fluid"
                                                        style="max-width: 100px; height: auto;">
                                                    {{ $billDetail->product->name }} {{ $billDetail->attributes }}
                                                </td>
                                                <td>{{ $billDetail->quantity }}</td>
                                                <td>{{ number_format($billDetail->price) }} đ</td>
                                                <td>{{ number_format($billDetail->price * $billDetail->quantity) }} đ</td>
                                                <td>{{ $isPromotionActive ? 'Có' : 'Không' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>

    {{-- Modal Xác Nhận Huỷ Đơn --}}
    <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelModalLabel">Xác Nhận Huỷ Đơn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn huỷ đơn hàng này không?</p>
                    <form id="cancelForm" action="{{ route('admin.bill.cancel', $bill->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="cancelNote" class="form-label">Ghi chú huỷ đơn <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="cancelNote" name="cancel_note" rows="3" required minlength="15" placeholder="Nhập lý do huỷ đơn..."></textarea>
                            <div class="invalid-feedback">Ghi chú phải có ít nhất 15 ký tự.</div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger" id="confirmCancel" disabled>Xác nhận huỷ</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Xác Nhận Xuất Đơn --}}
    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exportModalLabel">Xác Nhận Xuất Đơn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xuất đơn hàng này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <a href="{{ route('admin.bill.invoice', $bill->id) }}" class="btn btn-success">Xác nhận xuất đơn</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cancelNote = document.getElementById("cancelNote");
            const confirmCancel = document.getElementById("confirmCancel");
            const cancelForm = document.getElementById("cancelForm");
    
            cancelNote.addEventListener("input", function () {
                if (cancelNote.value.trim().length >= 15) {
                    confirmCancel.removeAttribute("disabled");
                } else {
                    confirmCancel.setAttribute("disabled", "true");
                }
            });
    
            confirmCancel.addEventListener("click", function () {
                cancelForm.submit();
            });
        });
    </script>
@endsection

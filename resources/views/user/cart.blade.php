@extends('layout.admin')

@section('content')
    <div class="container mt-4">
        <h2>Your Cart</h2>
        @if($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <form action="{{ route('checkout.confirm') }}" method="POST" id="checkout-form">
                @csrf
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all"></th>
                        <th>Product</th>
                        <th>Image</th>
                        <th style="max-width: 10%;">Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartItems as $item)
                        <tr data-item-id="{{ $item->id }}">
                            <td>
                                <input type="checkbox" name="selected_items[]" value="{{ $item->id }}" class="select-item" checked>
                            </td>
                            <td>{{ $item->product->name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->product->image) }}" alt="" style="width: 100px; height: 100px;">
                            </td>
                            <td style="width: 15%;">
                                <div class="input-group">
                                    <button type="button" class="btn btn-secondary btn-sm decrease-quantity">-</button>
                                    <input type="number" name="quantities[{{ $item->id }}]" value="{{ $item->quantity }}" class="form-control text-center quantity-input" min="1">
                                    <button type="button" class="btn btn-secondary btn-sm increase-quantity">+</button>
                                </div>
                            </td>
                            <td>${{ number_format($item->product->price, 2) }}</td>
                            <td class="total-price">{{ number_format($item->product->price * $item->quantity) }}VND</td>
                            <td>
                                <button class="btn btn-danger btn-sm btn-remove-item" data-id="{{ $item->id }}">Remove</button>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4" class="text-right"><strong>Total:</strong></td>
                        <td id="cart-total" colspan="3">{{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity)) }}VND</td>
                    </tr>
                    </tfoot>
                </table>
                <button type="submit" class="btn btn-success">Proceed to Checkout</button>
            </form>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const removeButtons = document.querySelectorAll('.btn-remove-item');
            function updateRowTotal(row) {
                const quantity = parseInt(row.querySelector(".quantity-input").value);
                const price = parseFloat(row.querySelector("td:nth-child(5)").textContent.replace(/[^\d.]/g, ""));
                const total = quantity * price;
                row.querySelector(".total-price").textContent = total.toLocaleString() + "VND";
                return total;
            }

            function updateCartTotal() {
                let total = 0;
                document.querySelectorAll("tbody tr").forEach(row => {
                    const checkbox = row.querySelector(".select-item");
                    if (checkbox && checkbox.checked) {
                        total += updateRowTotal(row);
                    }
                });
                document.getElementById("cart-total").textContent = total.toLocaleString() + "VND";
            }

            document.querySelectorAll(".increase-quantity, .decrease-quantity").forEach(btn => {
                btn.addEventListener("click", function () {
                    const row = this.closest("tr");
                    const input = row.querySelector(".quantity-input");
                    let val = parseInt(input.value);
                    if (this.classList.contains("increase-quantity")) val++;
                    else if (val > 1) val--;
                    input.value = val;
                    updateCartTotal();
                });
            });

            document.querySelectorAll(".quantity-input").forEach(input => {
                input.addEventListener("change", function () {
                    if (parseInt(this.value) < 1 || isNaN(parseInt(this.value))) {
                        this.value = 1;
                    }
                    updateCartTotal();
                });
            });

            document.querySelectorAll(".select-item").forEach(cb => {
                cb.addEventListener("change", updateCartTotal);
            });

            const selectAll = document.getElementById("select-all");
            if (selectAll) {
                selectAll.addEventListener("change", function () {
                    const isChecked = this.checked;
                    document.querySelectorAll(".select-item").forEach(cb => {
                        cb.checked = isChecked;
                    });
                    updateCartTotal();
                });
            }
            removeButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const itemId = this.dataset.id;

                    if (confirm('Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?')) {
                        fetch(`/cart/remove/${itemId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            }
                        })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Xoá thất bại');
                                }
                                return response.json();
                            })
                            .then(data => {
                                // Xoá thành công → cập nhật lại UI, ví dụ reload lại trang
                                location.reload();
                            })
                            .catch(error => {
                                alert('Có lỗi xảy ra khi xoá sản phẩm.');
                                console.error(error);
                            });
                    }
                });
            });

            updateCartTotal();
        });

    </script>
@endpush

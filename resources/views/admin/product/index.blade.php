@extends('layout.add')

@section('content')
<div class="uk-container uk-margin-top">
    <h1 class="uk-heading-line"><span>Quản Lý Sản Phẩm</span></h1>

    <div class="uk-margin">
        <a class="uk-button uk-button-primary" href="{{ route('products.create') }}">Thêm Sản Phẩm Mới</a>
    </div>

    <table class="uk-table uk-table-divider">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hình Ảnh</th>
                <th>Tên Sản Phẩm</th>
                <th>Danh Mục</th>
                <th>Giá</th>
                <th>Lượt Xem</th>
                <th>Trạng Thái</th>
                <th>Mô Tả</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100px; height: 100px;">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name ?? 'Chưa có' }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->luot_xem }}</td>
                    <td>
                        @if ($product->status == 1)
                        <button class="btn-active">Kích hoạt</button>
                        <!-- Màu xanh cho trạng thái kích hoạt -->
                        @else
                        <button class="btn-inactive">Không kích hoạt</button> <!-- Màu đỏ cho trạng thái không kích hoạt -->
                        @endif
                    </td>

                    <td>{{ Str::limit($product->content, 50) }}</td> <!-- Cắt ngắn mô tả tới 50 ký tự -->
                    <td>
                        <a class="uk-button uk-button-default uk-button-small" href="{{ route('products.show', $product) }}">Xem</a>
                        <a class="uk-button uk-button-secondary uk-button-small" href="{{ route('products.edit', $product) }}">Sửa</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="uk-button uk-button-danger uk-button-small">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="uk-text-center">Không tìm thấy sản phẩm nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

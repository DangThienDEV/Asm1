@extends('layout.add')

@section('content')
<div class="uk-container uk-margin-top">
    <h1 class="uk-heading-line"><span>Product Management</span></h1>

    <div class="uk-margin">
        <a class="uk-button uk-button-primary" href="{{ route('products.create') }}">Add New Product</a>
    </div>

    <table class="uk-table uk-table-divider">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
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
                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->luot_xem }}</td>
                    <td>
                        <a class="uk-button uk-button-default uk-button-small" href="{{ route('products.show', $product) }}">View</a>
                        <a class="uk-button uk-button-secondary uk-button-small" href="{{ route('products.edit', $product) }}">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="uk-button uk-button-danger uk-button-small">Delete</button>
                        </form>
                        
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="uk-text-center">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

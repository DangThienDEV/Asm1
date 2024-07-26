@extends('layout.add')

@section('content')
<div class="uk-container uk-margin-top">
        <h1 class="uk-heading-line"><span>Product Details</span></h1>

        <div class="uk-card uk-card-default uk-card-body">
            <h3 class="uk-card-title">Product Name</h3>
            <p><strong>Category:</strong> Category Name</p>
            <p><strong>Price:</strong> $99.99</p>
            <p><strong>Stock:</strong> 50</p>
        </div>

        <div class="uk-margin-top">
            <a class="uk-button uk-button-primary" href="product-edit.html">Edit Product</a>
            <a class="uk-button uk-button-danger" href="#">Delete Product</a>
            <a class="uk-button uk-button-default" href="product-management.html">Back to List</a>
        </div>
    </div>
@endsection
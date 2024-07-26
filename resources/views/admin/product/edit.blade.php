@extends('layout.add')

@section('content')

<div class="uk-container uk-margin-top">
        <h1 class="uk-heading-line"><span>Edit Product</span></h1>

        <form class="uk-form-stacked">
            <div class="uk-margin">
                <label class="uk-form-label" for="product-name">Product Name</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="product-name" type="text" value="Existing Product Name">
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="category">Category</label>
                <div class="uk-form-controls">
                    <select class="uk-select" id="category">
                        <option>Category 1</option>
                        <option selected>Category 2</option>
                        <option>Category 3</option>
                    </select>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="price">Price</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="price" type="number" step="0.01" value="99.99">
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="stock">Stock</label>
                <div class="uk-form-controls">
                    <input class="uk-input" id="stock" type="number" value="50">
                </div>
            </div>

            <div class="uk-margin">
                <button class="uk-button uk-button-primary" type="submit">Update</button>
                <a class="uk-button uk-button-default" href="product-management.html">Cancel</a>
            </div>
        </form>
    </div>
@endsection
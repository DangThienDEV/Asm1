@extends('layout.admin')
@section('content')
<div class="container mt-4">
        <h2>Shopping Cart</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50" class="img-fluid" alt="Product 1">
                            <div class="ms-3">
                                <h5 class="mb-0">Product 1</h5>
                            </div>
                        </div>
                    </td>
                    <td>$10.00</td>
                    <td>
                        <input type="number" class="form-control" value="1" min="1">
                    </td>
                    <td>$10.00</td>
                    <td>
                        <button class="btn btn-danger btn-sm">Remove</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50" class="img-fluid" alt="Product 2">
                            <div class="ms-3">
                                <h5 class="mb-0">Product 2</h5>
                            </div>
                        </div>
                    </td>
                    <td>$20.00</td>
                    <td>
                        <input type="number" class="form-control" value="2" min="1">
                    </td>
                    <td>$40.00</td>
                    <td>
                        <button class="btn btn-danger btn-sm">Remove</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <h5>Total: $50.00</h5>
        </div>
        <div class="d-flex justify-content-end">
            <a href="#" class="btn btn-primary">Proceed to Checkout</a>
        </div>
    </div>
@endsection
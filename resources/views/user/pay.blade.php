@extends('layout.admin')

@section('content')
<div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h2>Invoice</h2>
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5>Shop Name</h5>
                                <p>123 Street, City, Country</p>
                                <p>Email: shop@example.com</p>
                                <p>Phone: (123) 456-7890</p>
                            </div>
                            <div>
                                <h5>Invoice #: 0001</h5>
                                <p>Date: 2024-07-18</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-4">
                            <div>
                                <h5>Billing To:</h5>
                                <p>John Doe</p>
                                <p>456 Avenue, City, Country</p>
                                <p>Email: john@example.com</p>
                                <p>Phone: (987) 654-3210</p>
                            </div>
                        </div>
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Product 1</td>
                                <td>$10.00</td>
                            </tr>
                            <tr>
                                <td>Product 2</td>
                                <td>$20.00</td>
                            </tr>
                            <tr>
                                <td class="text-end"><strong>Total</strong></td>
                                <td>$30.00</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="card-footer bg-light text-end">
                        <button class="btn btn-primary" onclick="window.print()">Print Invoice</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
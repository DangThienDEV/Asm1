@extends('layout.add')

@section('content')
<div class="uk-container uk-margin-top">
        <h1 class="uk-heading-line"><span>Category Management</span></h1>

        <div class="uk-margin">
            <a class="uk-button uk-button-primary" href="#">Add New Category</a>
        </div>

        <table class="uk-table uk-table-divider">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Category Row -->
                <tr>
                    <td>1</td>
                    <td>Category Name</td>
                    <td>Category Description</td>
                    <td>
                        <a class="uk-button uk-button-default uk-button-small" href="#">View</a>
                        <a class="uk-button uk-button-secondary uk-button-small" href="#">Edit</a>
                        <a class="uk-button uk-button-danger uk-button-small" href="#">Delete</a>
                    </td>
                </tr>
                <!-- Repeat Category Row as needed -->
            </tbody>
        </table>
    </div>
    @endsection
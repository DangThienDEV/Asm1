@extends('layout.admin')

@section('content')
<div class="container">
    <h2>Register</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" unrequired>
            @error('name')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" unrequired>
            @error('email')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" unrequired>
            @error('password')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" unrequired>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection
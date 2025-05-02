@extends('layout.add')

@section('content')
<div class="uk-container">
    <div class="uk-margin">
        <div class="uk-flex uk-flex-between uk-flex-middle">
            <h2>Show Banner</h2>
            <a class="uk-button uk-button-primary" href="{{ route('banners.index') }}">Back</a>
        </div>
    </div>

    <div class="uk-margin">
        <div class="uk-card uk-card-default uk-card-body">
            <div class="uk-margin">
                <strong>Title:</strong>
                <p>{{ $banner->title }}</p>
            </div>
            <div class="uk-margin">
                <strong>Image:</strong>
                <div>
                <img src="{{ asset('storage/' . $banner->image) }}" width="100" alt="{{ $banner->title }}">
                </div>
            </div>
            <div class="uk-margin">
                <strong>Link:</strong>
                <p>{{ $banner->link }}</p>
            </div>
            <div class="uk-margin">
                <strong>Status:</strong>
                <p>{{ $banner->status ? 'Active' : 'Inactive' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

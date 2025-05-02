@extends('layout.add')

@section('content')
<div class="uk-container">
    <div class="uk-margin">
        <div class="uk-flex uk-flex-between uk-flex-middle">
            <h2>Edit Banner</h2>
            <a class="uk-button uk-button-primary" href="{{ route('banners.index') }}">Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><strong>Whoops!</strong> There were some problems with your input.</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="uk-form-stacked">
        @csrf
        @method('PUT')

        <div class="uk-margin">
            <label class="uk-form-label" for="title"><strong>Title:</strong></label>
            <div class="uk-form-controls">
                <input type="text" name="title" value="{{ $banner->title }}" class="uk-input" placeholder="Title">
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="image"><strong>Image:</strong></label>
            <div class="uk-form-controls">
                <input type="file" name="image" class="uk-input">
                @if($banner->image)
                    <img src="{{ asset('storage/' . $banner->image) }}" width="100" class="uk-margin-top">
                @endif
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="link"><strong>Link:</strong></label>
            <div class="uk-form-controls">
                <input type="text" name="link" value="{{ $banner->link }}" class="uk-input" placeholder="Link">
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label" for="status"><strong>Status:</strong></label>
            <div class="uk-form-controls">
                <select name="status" class="uk-select">
                    <option value="1" {{ $banner->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$banner->status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        <div class="uk-margin uk-text-center">
            <button type="submit" class="uk-button uk-button-primary">Submit</button>
        </div>
    </form>
</div>
@endsection

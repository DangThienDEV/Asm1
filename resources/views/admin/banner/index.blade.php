@extends('layout.add')

@section('content')
    <div class="uk-container uk-margin-top">
    <div class="uk-margin">
        <div class="uk-flex uk-flex-between uk-flex-middle">
            <h2>Banners</h2>
            <a class="uk-button uk-button-primary" href="{{ route('banners.create') }}">Create New Banner</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="uk-table uk-table-divider uk-table-hover uk-table-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Image</th>
                <th>Link</th>
                <th>Status</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banners as $banner)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $banner->title }}</td>
                <td><img src="{{ asset('storage/' . $banner->image) }}" width="100" alt="{{ $banner->title }}"></td>
                <td>{{ $banner->link }}</td>
                <td>{{ $banner->status ? 'Active' : 'Inactive' }}</td>
                <td>
                    <form action="{{ route('banners.destroy', $banner->id) }}" method="POST" class="uk-form">
                        <a class="uk-button uk-button-default" href="{{ route('banners.show', $banner->id) }}">Show</a>
                        <a class="uk-button uk-button-primary" href="{{ route('banners.edit', $banner->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="uk-button uk-button-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

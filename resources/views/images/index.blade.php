@extends('layouts.app')

@section('content')
    <h1>Uploaded Images</h1>
    <div class="row">
        @foreach ($images as $image)
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ asset('storage/' . $image->file_path) }}" alt="{{ $image->file_name }}" class="card-img-top"
                        width="100">
                    <div class="card-body">
                        <p class="card-text">{{ $image->file_name }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('images.edit', $image) }}"
                                    class="btn btn-sm btn-outline-secondary">Edit</a>
                                <form action="{{ route('images.destroy', $image) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">Upload Image</div>
                    <div class="card-body">
                        <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="image">Choose Image</label>
                                <input type="file" name="image" id="image" class="form-control-file">
                            </div>
                            <button type="submit" class="btn btn-primary">Upload Image</button>
                        </form>
                    </div>
                </div>

                <h1>Uploaded Images</h1>
                <div class="row">
                    @foreach ($images as $image)
                        <div class="col-md-6 mb-3">
                            <div class="card shadow-sm">
                                <img src="{{ asset('storage/' . $image->file_path) }}" alt="{{ $image->file_name }}"
                                    class="card-img-top" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $image->file_name }}</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('images.edit', $image) }}"
                                                class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <form action="{{ route('images.destroy', $image) }}" method="POST"
                                                class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

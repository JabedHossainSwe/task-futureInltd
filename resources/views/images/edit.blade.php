@extends('layouts.app')

@section('content')
    <h1>Edit Image</h1>
    <form action="{{ route('images.update', $image) }}" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input type="file" name="image" id="image" class="form-control" onchange="previewImage()">
        </div>
        <div id="image-preview" class="mt-3">
            <img src="{{ asset('storage/' . $image->file_path) }}" alt="{{ $image->file_name }}" width="100">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

@section('scripts')
    <script>
        function previewImage() {
            const preview = document.getElementById('image-preview');
            preview.innerHTML = '';
            const file = document.getElementById('image').files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.width = 100; // set the desired width
                preview.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    </script>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Edit Image</h1>
    <form action="{{ route('images.update', $image) }}" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Current Image:</label>
            <div id="image-preview" class="mt-2 mb-2">
                <img src="{{ asset('storage/' . $image->file_path) }}" alt="{{ $image->file_name }}"
                    style="max-width: 200px;">
            </div>
            <input type="file" name="image" id="image" class="form-control" onchange="previewImage()">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

@section('scripts')
    <script>
        function previewImage() {
            var fileInput = document.getElementById('image');
            var imagePreview = document.getElementById('image-preview');

            imagePreview.innerHTML = '';

            var files = fileInput.files;
            if (files.length > 0) {
                var file = files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    var img = new Image();
                    img.src = e.target.result;
                    img.style.maxWidth = '300px';
                    imagePreview.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection

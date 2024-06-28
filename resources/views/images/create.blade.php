@extends('layouts.app')

@section('content')
    <h1>Upload Images</h1>
    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf
        <div class="form-group">
            <input type="file" name="images[]" id="images" multiple class="form-control" onchange="previewImages()">
        </div>
        <div id="image-preview" class="mt-3"></div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
@endsection

@section('scripts')
    <script>
        function previewImages() {
            const preview = document.getElementById('image-preview');
            preview.innerHTML = '';
            const files = document.getElementById('images').files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.width = 100; // set the desired width
                    img.style.marginRight = '10px';
                    preview.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection

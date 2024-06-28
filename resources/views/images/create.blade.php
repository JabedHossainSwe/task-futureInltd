@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Upload Image') }}</div>

                    <div class="card-body">
                        <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="image">{{ __('Choose Image') }}</label>
                                <input type="file" name="image" id="image" class="form-control-file"
                                    onchange="previewImages()">
                            </div>
                            <div id="image-preview" class="mt-3"></div>
                            <button type="submit" class="btn btn-primary mt-3">{{ __('Upload Image') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function previewImages() {
            const preview = document.getElementById('image-preview');
            preview.innerHTML = '';
            const file = document.getElementById('image').files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.width = 300;
                img.style.marginRight = '10px';
                preview.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    </script>
@endsection

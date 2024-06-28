@extends('layouts.app')

@section('content')
    <h1>Upload Images</h1>
    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="images[]" multiple>
        <button type="submit">Upload</button>
    </form>
@endsection

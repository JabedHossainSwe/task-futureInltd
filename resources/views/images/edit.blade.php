@extends('layouts.app')

@section('content')
    <h1>Edit Image</h1>
    <form action="{{ route('images.update', $image) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="file" name="image">
        <button type="submit">Update</button>
    </form>
@endsection

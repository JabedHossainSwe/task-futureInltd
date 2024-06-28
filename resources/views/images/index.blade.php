@extends('layouts.app')

@section('content')
    <h1>Images</h1>
    <a href="{{ route('images.create') }}">Upload New Images</a>
    <ul>
        @foreach ($images as $image)
            <li>
                <img src="{{ asset('storage/' . $image->file_path) }}" alt="{{ $image->file_name }}" width="100">
                <a href="{{ route('images.edit', $image) }}">Edit</a>
                <form action="{{ route('images.destroy', $image) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection

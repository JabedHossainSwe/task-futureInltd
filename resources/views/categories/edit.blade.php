@extends('layouts.app')

@section('content')
    <h1>Edit Category</h1>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $category->name }}" placeholder="Category Name">
        <select name="parent_id">
            <option value="">No Parent</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" @if ($cat->id == $category->parent_id) selected @endif>{{ $cat->name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Update</button>
    </form>
@endsection

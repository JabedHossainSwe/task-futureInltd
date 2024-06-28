@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Edit Category</h1>
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}"
                    placeholder="Enter Category Name">
            </div>
            <div class="form-group">
                <label for="parent_id">Parent Category</label>
                <select name="parent_id" id="parent_id" class="form-control">
                    <option value="">No Parent</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" @if ($cat->id == $category->parent_id) selected @endif>
                            {{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

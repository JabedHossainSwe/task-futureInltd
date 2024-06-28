@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Categories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Create New Category</a>
        <ul class="list-group">
            @foreach ($categories as $category)
                <li class="list-group-item">
                    {{ $category->name }}
                    <div class="float-right">
                        <a href="{{ route('categories.edit', $category) }}"
                            class="btn btn-sm btn-outline-primary mr-2">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </div>
                    @if ($category->children->isNotEmpty())
                        <ul class="list-group mt-3">
                            @foreach ($category->children as $child)
                                <li class="list-group-item">
                                    {{ $child->name }}
                                    <div class="float-right">
                                        <a href="{{ route('categories.edit', $child) }}"
                                            class="btn btn-sm btn-outline-primary mr-2">Edit</a>
                                        <form action="{{ route('categories.destroy', $child) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endsection

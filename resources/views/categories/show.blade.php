@extends('layouts.app')

@section('content')
    <h1>{{ $category->name }}</h1>
    @if ($category->children->isNotEmpty())
        <h2>Subcategories</h2>
        <ul>
            @foreach ($category->children as $child)
                <li>{{ $child->name }}</li>
            @endforeach
        </ul>
    @endif

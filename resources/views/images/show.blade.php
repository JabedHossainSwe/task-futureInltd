@extends('layouts.app')

@section('content')
    <h1>{{ $image->file_name }}</h1>
    <img src="{{ asset('storage/' . $image->file_path) }}" alt="{{ $image->file_name }}">
@endsection

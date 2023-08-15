@extends('layouts.home_page')

@section('title', 'Category Management Page')

@section('header', 'Category Management')

@section('content')

    <a href="{{ route('showAddCategoryPage') }}">
        <button class="btn btn-secondary m-1">Add Category</button>
    </a>
    <br>
    <a href="{{ route('showCategoryListPage') }}">
        <button class="btn btn-secondary m-1">List Categories</button>
    </a>

@endsection

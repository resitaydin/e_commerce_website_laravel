@extends('layouts.home_page')

@section('title', 'Product Management Page')

@section('header', 'Product Management')

@section('content')

    <a href="{{ route('showAddProductPage') }}">
        <button class="btn btn-secondary m-1">Add Product</button>
    </a>
    <br>
    <a href="{{ route('showProductListPage') }}">
        <button class="btn btn-secondary m-1">List Products</button>
    </a>

@endsection

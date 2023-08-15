@extends('layouts.home_page')

@section('title', 'Product Management')
@section('header', 'Add Product')

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('addProduct') }}">
            @csrf
            <div class="mb-3">
                <label for="productTitle" class="form-label">Product Title</label>
                <input type="text" name="productTitle" class="form-control">
            </div>
            <div class="mb-3">
                <label for="productCategoryId" class="form-label">Product Category</label>
                <select name="productCategoryId" id="productCategoryId" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->id }} - {{ $category->categoryTitle }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="barcode" class="form-label">Product Barcode</label>
                <input type="text" name="barcode" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <div>
                    <input type="radio" id="html" name="productStatus" value="1">
                    <label for="html">Active</label>
                    <input type="radio" id="css" name="productStatus" value="0">
                    <label for="css">Inactive</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="saveAddProductForm">Save</button>
        </form>
    </div>
@endsection

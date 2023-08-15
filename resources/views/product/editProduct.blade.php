@extends('layouts.home_page')

@section('title', 'Product Management')
@section('header', 'Edit Product')

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

        <form method="POST" action="{{ route('editProduct', ['id' => $product->id]) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="productTitle" class="form-label">Product Title</label>
                <input type="text" name="productTitle" value="{{ $product->productTitle }}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="productCategoryId" class="form-label">Product Category</label>
                <select name="productCategoryId" id="productCategoryId" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->productCategoryId ? 'selected' : '' }}>
                            {{ $category->id }} - {{ $category->categoryTitle }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="barcode" class="form-label">Product Barcode</label>
                <input type="text" name="barcode" class="form-control" value="{{ $product->barcode }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <div>
                    <input type="radio" id="html" name="productStatus" value="1" {{ $product->productStatus ? 'checked' : '' }}>
                    <label for="html">Active</label>
                    <input type="radio" id="css" name="productStatus" value="0" {{ $product->productStatus ? '' : 'checked' }}>
                    <label for="css">Inactive</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="saveEditProductForm">Save</button>
        </form>
    </div>
@endsection

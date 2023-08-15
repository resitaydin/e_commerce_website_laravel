@extends('layouts.home_page')

@section('title', 'Product Management')
@section('header', 'Product List')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Barcode</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->productTitle }}</td>
                        <td>
                            @foreach ($categories as $category)
                                @if ($product->productCategoryId == $category->id)
                                    {{ $category->categoryTitle }}
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $product->barcode }}</td>
                        <td>{{ $product->productStatus ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('showEditProductPage', ['id' => $product->id]) }}"
                                class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure you want to delete {{ $product->productTitle }} category')"
                                href="{{ route('deleteProduct', ['id' => $product->id]) }}"
                                class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

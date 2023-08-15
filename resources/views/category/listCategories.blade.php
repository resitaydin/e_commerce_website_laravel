@extends('layouts.home_page')

@section('title', 'Category Management')
@section('header', 'Category List')

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
                    <th>Category Title</th>
                    <th>Category Description</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->categoryTitle }}</td>
                        <td>{{ $category->categoryDescription }}</td>
                        <td>{{ $category->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('showEditCategoryPage', ['id' => $category->id]) }}"
                                class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure you want to delete {{$category->categoryTitle}} category')"
                                href="{{ route('deleteCategory', ['id' => $category->id]) }}"
                                class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

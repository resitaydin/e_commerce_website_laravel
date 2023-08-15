@extends('layouts.home_page')

@section('title', 'Category Management')
@section('header', 'Add Category')

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

        <form method="POST" action="{{ route('addCategory') }}">
            @csrf
            <div class="mb-3">
                <label for="categoryTitle" class="form-label">Category Title</label>
                <input type="text" name="categoryTitle" class="form-control">
            </div>
            <div class="mb-3">
                <label for="categoryDescription" class="form-label">Category Description</label>
                <input type="text" name="categoryDescription" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <div>
                    <input type="radio" id="html" name="status" value="1">
                    <label for="html">Active</label>
                    <input type="radio" id="css" name="status" value="0">
                    <label for="css">Inactive</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="saveAddCategoryForm">Save</button>
        </form>
    </div>
@endsection

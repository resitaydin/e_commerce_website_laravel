@extends('layouts.home_page')

@section('title', 'User Management')
@section('header', 'Add User')

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

        <form method="POST" action="{{ route('addUser') }}">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username-form" name="username" class="form-control">
            </div>
            <div class="mb-3">
                <label for="userTitle" class="form-label">User Title</label>
                <input type="text" id="userTitle-form" name="userTitle" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password-form" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary" name="saveAddUserForm">Save</button>
        </form>
    </div>
@endsection

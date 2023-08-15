@extends('layouts.home_page')

@section('title', 'User Management')
@section('header', 'Edit User')

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

        <form method="POST" action="{{ route('editUser', ['id' => $user->id]) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" value="{{ $user->username }}" class="form-control">
                @error('username')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="userTitle" class="form-label">User Title</label>
                <input type="text" name="userTitle" value="{{ $user->userTitle }}" class="form-control">
                @error('userTitle')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" name="saveEditUserForm">Save</button>
        </form>
    </div>
@endsection

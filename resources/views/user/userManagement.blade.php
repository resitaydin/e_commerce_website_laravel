@extends('layouts.home_page')

@section('title', 'User Management')

@section('header', 'User Management')

@section('content')

    <a href="{{ route('showAddUserPage') }}">
        <button class="btn btn-secondary m-1">Add User</button>
    </a>
    <br>
    <a href="{{ route('showUserListPage') }}">
        <button class="btn btn-secondary m-1">List Users</button>
    </a>

@endsection

@extends('layouts.home_page')

@section('title', 'User Management')
@section('header', 'User List')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('deleteUsers') }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>User Title</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><input type="checkbox" name="selectedUsers[]" value="{{ $user->id }}" /></td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->userTitle }}</td>
                            <td><a href="{{ route('showEditUserPage', ['id' => $user->id]) }}"
                                class="btn btn-primary">Edit</a>
                            <td><a onclick="return confirm('Are you sure you want to delete {{$user->username}}')"
                                    href="{{ route('deleteUser', ['id' => $user->id]) }}"
                                        class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <input type="submit" class="btn btn-danger" value="Delete Users">
    </form>
@endsection

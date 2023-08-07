<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User List Page</title>
</head>

<body>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <h1>User List</h1>
    <form action="{{ route('deleteUsers') }}" method="POST">
        @csrf
        <table border="1">
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
                    <td><a href="{{ route('showEditUserPage', ['id' => $user->id]) }}">Edit</a></td>
                    <td><a href="{{ route('showDeleteUserPage', ['id' => $user->id]) }}">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <input type="submit" value="Delete Users">
    </form>
</body>
</html>

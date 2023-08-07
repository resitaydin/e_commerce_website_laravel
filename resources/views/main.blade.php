<html>
<head>
    <title> MAIN SCREEN </title>
</head>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
<body>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <p align="right"> <button type="submit">Logout</button> </p>
</form>
<a>  WELCOME TO MAIN SCREEN </a> <br>

<a href="{{ route('addUser') }}"> Add User </a> <br>
<a href="{{ route('userList') }}"> List Users </a>

</body>
</html>
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
    <a href="{{ route('logout') }}"> <p align="right"> Log Out </p> </a>
<a>  WELCOME TO MAIN SCREEN </a> <br>

<a href="{{ route('showAddUserPage') }}"> Add User </a> <br>
<a href="{{ route('showUserListPage') }}"> List Users </a>

</body>
</html>
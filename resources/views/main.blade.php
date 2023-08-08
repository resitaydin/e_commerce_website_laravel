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

<p> User Management </p>
<a href="{{ route('showAddUserPage') }}"> Add User </a> <br>
<a href="{{ route('showUserListPage') }}"> List Users </a>

<p> Category Management </p>
<a href="{{route('showAddCategoryPage')}}"> Add Category </a> <br>
<a href="{{route('showCategoryListPage')}}"> List Categories </a>

</body>
</html>
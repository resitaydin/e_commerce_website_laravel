<html>
<head>
    <title> Home Page </title>
</head>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
<body>
    <a href="{{ route('logout') }}"> <p align="right"> Log Out </p> </a>
<b>  WELCOME TO THE E-COMMERCE ADMIN PANEL </b> <br>

<p> User Management </p>
<a href="{{ route('showAddUserPage') }}"> Add User </a> <br>
<a href="{{ route('showUserListPage') }}"> List Users </a>

<p> Category Management </p>
<a href="{{route('showAddCategoryPage')}}"> Add Category </a> <br>
<a href="{{route('showCategoryListPage')}}"> List Categories </a>

<p> Product Management </p>
<a href="{{route('showAddProductPage')}}"> Add Product </a> <br>
<a href="{{route('showProductListPage')}}"> List Products </a>

</body>
</html>

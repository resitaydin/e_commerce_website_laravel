<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> MAIN SCREEN </title>
</head>
<body>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <p align="right"> <button type="submit">Logout</button> </p>
</form>
<a>  WELCOME TO MAIN SCREEN </a>
<form action="{{ route('addUser') }}">
    @csrf
    <button type="submit">Add User</button>
</form>

</body>
</html>
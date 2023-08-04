<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h2>Add User</h2>

    @if($errors)
        <p> {{$errors->first()}}</p>
    @endif
    
    <form method="POST" action="{{ route('saveAddUser') }}">
        @csrf 
        <div class="add-user-form">
            <label for="username">Username</label>
            <input type="text" id="username-form" name="username" class="form-control" >
            <span> @error('name') {{$message}}  @enderror </span>
        </div>
        <div class="add-user-form">
            <label for="userTitle">User Title</label>
            <input type="text" id="userTitle-form" name="userTitle" class="form-control" >
            <span> @error('name') {{$message}}  @enderror </span>
        </div>
        <div class="add-user-form">
            <label for="password">Password</label>
            <input type="password" id="password-form" name="password" class="form-control" >
            <span> @error('name') {{$message}}  @enderror </span>
        </div>
        <input type="submit" value="Save" name="saveAddUserForm">
    </form>
</div>
</body>
</html>

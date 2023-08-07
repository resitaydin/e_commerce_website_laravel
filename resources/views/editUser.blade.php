<!DOCTYPE html>
<html>
<head>
    <title> Edit User Page</title>
</head>

<body>
<div class="container">
    <h2> Edit User </h2>

    @if($errors)
        <p> {{$errors->first()}}</p>
    @endif
    
    <form method="POST" action= "{{route('updateUser', ['id' => $user->id])}}">
        @csrf 
        @method ('PUT')
        <div class="add-user-form">
            <label for="username">Username</label>
            <input type="text" name="username" value = "{{$user->username}}" class="form-control" >
            <span> @error('name') {{$message}}  @enderror </span>
        </div>
        <div class="add-user-form">
            <label for="userTitle">User Title</label>
            <input type="text" name="userTitle" value = "{{$user->userTitle}}" class="form-control" >
            <span> @error('name') {{$message}}  @enderror </span>
        </div>
        <div class="add-user-form">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" >
            <span> @error('name') {{$message}}  @enderror </span>
        </div>
        <input type="submit" value="Save" name="saveEditUserForm">
    </form>
</div>
</body>
</html>
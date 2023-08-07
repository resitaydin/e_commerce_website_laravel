<!DOCTYPE html>
<html>
<head>
    <title> Delete User Page</title>
</head>

<body>
<div class="container">
    <h2> Delete User </h2>

    @if($errors)
        <p> {{$errors->first()}}</p>
    @endif
    
    <form method="POST" action= "{{route('deleteUser', ['id' => $user->id])}}">
        @csrf 
        <div class="delete-user-form">
            <label for="username">Username => </label>
            <b>{{$user->username}} </b>
        </div>
        <div class="delete-user-form">
            <label for="userTitle">User Title => </label>
            <b>{{$user->userTitle }}</b>
        </div>
        <div class="delete-user-form">
            <label for="password">Password => </label>
            <b>*************</b>
        </div>
        <input type="submit" value="Confirm and Delete" name="saveDeleteUserForm">
    </form>
</div>
</body>
</html>
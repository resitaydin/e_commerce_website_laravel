<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

@guest
<body>
    <div class="container">
        @if($errors)
            <p> {{$errors->first()}}</p>
        @endif
        <h2>Admin Panel Login Screen</h2>
        <form action="{{ route('loginPost') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <input type="submit" value="Login" name="login">
        </form>
    </div>
    </body>
@else
    <script> window.location.href = "{{ route('main') }}";</script>
@endguest
    
</html>

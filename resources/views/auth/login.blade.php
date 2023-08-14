<!DOCTYPE html>
<html>
<head>
    <title> E-commerce Admin Panel </title>
    <link rel="stylesheet" href="styles.css">
</head>

@guest
<body>
    <div class="container">
        @if($errors)
            <p> {{$errors->first()}}</p>
        @endif
        
        <h2> E-commerce Admin Panel </h2>
        <form action="{{ route('login') }}" method="POST">
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
            <a href="{{route('showForgetPasswordPage')}}"> Forgot Password? </a>
        </form>
    </div>
    </body>
    @if (session('success'))
        <div class="alert alert-success"> {{ session('success') }} </div> @endif

    @if (session('error'))
        <div class="alert alert-danger"> {{ session('error') }} </div> @endif
@else
    <script> window.location.href = "{{ route('main') }}";</script>
@endguest
    
</html>

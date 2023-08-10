<!DOCTYPE html>
<html>

<body>
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success"> {{ session('success') }} </div> @endif

        @if (session('error'))
        <div class="alert alert-danger"> {{ session('error') }} </div> @endif

        <p> We will send a link to your email, use that link to reset your password.</p>
        <form action="{{ route('forgetPassword') }}" method="POST">
            @csrf
                <label for="email">Email address </label> <br>
                <input type="email" id="email" name="email" class="form-control"> <br>

                <label for="username">Username</label> <br>
                <input type="text" id="username" name="username" class="form-control"> <br>

            <input type="submit" value="Submit" name="submit">
        </form>
        @if($errors)
        <p> {{$errors->first()}}</p>
        
    @endif
    </div>
    </body>
    
</html>
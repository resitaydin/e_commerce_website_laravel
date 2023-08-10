<!DOCTYPE html>
<html>

<body>
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success"> {{ session('success') }} </div> @endif

        @if (session('error'))
        <div class="alert alert-danger"> {{ session('error') }} </div> @endif

        <form action="{{ route('resetPassword', ['token' => $token]) }}" method="POST">
            @csrf
            <input type="text" name="token" hidden value = "{{$token}}">

                <label for="password"> New Password </label> <br>
                <input type="password" name="password" class="form-control"> <br>

                <label for="password_confirmation">Password Confirm</label> <br>
                <input type="password" name="password_confirmation" class="form-control"> <br>

            <input type="submit" value="Submit" name="submit">
        </form>
                @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>
    </body>
    
</html>

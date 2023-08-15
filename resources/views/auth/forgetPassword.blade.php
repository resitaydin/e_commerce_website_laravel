<!DOCTYPE html>
<html>

<head>
    <title>Forget Password</title>
    <!-- Include your Bootstrap CSS link here -->
    <link rel="stylesheet" href="{{asset('../assets/css/styles.min.css')}} ">
</head>

<body>
    <div class="container mt-5">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <h2>Reset Password</h2>
        <p>We will send a link to your email, use that link to reset your password.</p>
        <form action="{{ route('forgetPassword') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @if($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <!-- Include your Bootstrap JS script here -->
    <script src="{{asset('../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}} "></script>
</body>

</html>

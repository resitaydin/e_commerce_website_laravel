<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
    <!-- Include your Bootstrap CSS link here -->
    <link rel="stylesheet" href="../assets/css/styles.min.css">
</head>

<body>
    <div class="container mt-5">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('resetPassword', ['token' => $token]) }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Password Confirm</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @error('password')
        <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror
    </div>

    <!-- Include your Bootstrap JS script here -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

@extends('layouts/home_page')
<html>

@section('header', 'Welcome to the Dashboard')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
<body>

</body>
</html>

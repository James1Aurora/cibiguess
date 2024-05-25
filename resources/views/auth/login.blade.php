@extends('layouts.clear')

@section('title', 'Sign In | Cibiguess')

@section('styles')
    <link href="{{ asset('css/log.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="gradient-wrapper">
        <div class="gradient-wrapper-two"></div>
    </div>
    <div class="box">
        <div class="border-line"></div>
        <form id="loginForm" action="{{ route('login.post') }}" method="POST">
            @csrf
            @method('POST')
            <h2>Login</h2>
            <div class="input-box">
                <input type="text" id="username" required="required" />
                <span>Username</span>
                <i></i>
            </div>
            <div class="input-box">
                <input type="password" id="password" required="required" />
                <span>Password</span>
                <i></i>
            </div>
            <div class="imp-links">
                <label for="checkbox"><input type="checkbox" name="checkbox" id="" />Remember
                    Me</label>
                <a href="#">Forget Password</a>
            </div>
            <button class="btn" type="submit">Login</button>
            <div class="login-register">
                <p>
                    Don't Have Account? <a href="{{ route('register') }}">Register</a>
                </p>
            </div>
        </form>
    </div>
@endsection

{{-- <script>
    document
        .getElementById("loginForm")
        .addEventListener("submit", function(event) {
            var username = document
                .getElementById("username")
                .value.trim();
            var password = document
                .getElementById("password")
                .value.trim();

            if (username === "" || password === "") {
                alert("Please enter both username and password.");
                event.preventDefault(); // Prevent form submission
            }
        });
</script> --}}

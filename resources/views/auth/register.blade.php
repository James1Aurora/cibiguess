@extends('layouts.clear')

@section('title', 'Sign Up | Cibiguess')

@section('styles')
    <link href="{{ asset('css/regist.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="gradient-wrapper">
        <div class="gradient-wrapper-two"></div>
    </div>

    <div class="box">
        <div class="border-line"></div>
        <form id="registerForm" action="{{ route('register.post') }}" method="POST">
            @csrf
            @method('POST')
            <h2>Register</h2>
            <div class="input-box">
                <input type="text" id="username" required="required" />
                <span>Username</span>
                <i></i>
            </div>
            <div class="input-box">
                <input type="email" id="email" required="required" />
                <span>Email</span>
                <i></i>
            </div>
            <div class="input-box">
                <input type="password" id="password" required="required" />
                <span>Password</span>
                <i></i>
            </div>
            <div class="input-box">
                <input type="password" id="confirmPassword" required="required" />
                <span>Confirm Password</span>
                <i></i>
            </div>
            <button class="btn" type="submit">Register</button>
            <div class="login-register">
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </form>
    </div>

@endsection

{{-- <script>
    document
        .getElementById("registerForm")
        .addEventListener("submit", function(event) {
            var username = document
                .getElementById("username")
                .value.trim();
            var email = document.getElementById("email").value.trim();
            var password = document
                .getElementById("password")
                .value.trim();
            var confirmPassword = document
                .getElementById("confirmPassword")
                .value.trim();

            if (
                username === "" ||
                email === "" ||
                password === "" ||
                confirmPassword === ""
            ) {
                alert("Please fill in all fields.");
                event.preventDefault(); // Prevent form submission
            } else if (password !== confirmPassword) {
                alert("Passwords do not match.");
                event.preventDefault(); // Prevent form submission
            }
        });
</script> --}}

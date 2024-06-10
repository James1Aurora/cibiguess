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
            @if (session('error'))
                <div class="alert alert-danger" id="loginError" style="display: none;">{{ session('error') }}</div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        alert("{{ session('error') }}");
                    });
                </script>
            @endif
            <div class="input-box">
                <input type="email" id="email" name="email" required="required" />
                <span>Email</span>
                <i></i>
            </div>
            <div class="input-box">
                <input type="password" id="password" name="password" required="required" />
                <span>Password</span>
                <i></i>
            </div>
            <div class="imp-links">
                <label for="remember"><input type="checkbox" name="remember" id="remember" />Remember Me</label>
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

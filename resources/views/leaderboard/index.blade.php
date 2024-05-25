@extends('layouts.clearDark')

@section('title', 'Home')

@section('styles')
    <link href="{{ asset('css/leaderboard.css') }}" rel="stylesheet" />

@endsection

@section('content')
    <section>
        <div class="gradient-wrapper">
            <div class="gradient-one"></div>
        </div>

        <div class="wrapper">
            <div class="btn-group-top">
                <a href="main-menu.html" class="btn btn-transparent btn-square">
                    <span class="material-symbols-outlined m-0 !text-xl">
                        home
                    </span>
                </a>
            </div>
        </div>

        <div class="content-wrapper">
            <div class="leaderboard">
                <h1>Best Score</h1>
                <ol>
                    <li>
                        <mark>Akmal Wijaro</mark>
                        <small>31500</small>
                    </li>
                    <li>
                        <mark>Budi Santoso</mark>
                        <small>30100</small>
                    </li>
                    <li>
                        <mark>Maya Dewi</mark>
                        <small>29200</small>
                    </li>
                    <li>
                        <mark>Rudi Pratama</mark>
                        <small>24500</small>
                    </li>
                    <li>
                        <mark>Siti Rahayu</mark>
                        <small>20300</small>
                    </li>
                </ol>
            </div>
        </div>

        <div class="gradient-wrapper-two">
            <div class="gradient-two"></div>
        </div>
    </section>
@endsection

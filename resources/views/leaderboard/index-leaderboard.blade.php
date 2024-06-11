@extends('layouts.clearDark')

@section('title', 'Leaderboard | CibiGuess')

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
                <a href="{{ route('game.menu') }}" class="btn btn-transparent btn-square">
                    <span class="material-symbols-outlined m-0 !text-xl">
                        home
                    </span>
                </a>
            </div>
        </div>

        <div class="content-wrapper">
            <div class="leaderboard">
                <h1>Monthly Leaderboards</h1>
                <ol>
                    @forelse ($new_histories as $history)
                        <li>
                            <mark>{{ $history->userId }}</mark>
                            <small>{{ $history->score }} pts</small>
                        </li>
                    @empty
                        <p>No scores found</p>
                    @endforelse
                </ol>
            </div>
        </div>

        <div class="gradient-wrapper-two">
            <div class="gradient-two"></div>
        </div>
    </section>
@endsection

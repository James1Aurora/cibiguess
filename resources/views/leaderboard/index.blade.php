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
                    @if ($histories->isEmpty())
                        <p>No scores found</p>
                    @else
                        @foreach ($histories as $history)
                            <li>
                                <mark>{{ $history->user->name }}</mark>
                                <small>{{ $history->score }} pts</small>
                            </li>
                        @endforeach
                        @for ($i = count($histories); $i < 10; $i++)
                            <li>
                                <mark>N/A</mark>
                                <small>0 pts</small>
                            </li>
                        @endfor
                    @endif
                </ol>
                </ol>
            </div>
        </div>

        <div class="gradient-wrapper-two">
            <div class="gradient-two"></div>
        </div>
    </section>
@endsection

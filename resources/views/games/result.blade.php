@extends('layouts.clearDark')

@section('title', 'Game Result | CibiGuess')

@section('content')
    <section class="w-svw min-h-svh relative flex justify-center items-center overflow-x-hidden">
        <div class="bg-cover bg-center relative w-full min-h-svh"
            style="background-image: url('{{ asset('images/maps/' . $lastQuestion['spotImage']) }}')">
            <div class="flex justify-center items-center w-full min-h-svh bg-black/35 backdrop-blur-[5px] p-2 pb-14 sm:pb-2">
                <div
                    class="relative container bg-gray-800/40 border border-gray-500 backdrop-blur-md text-center max-w-3xl p-4 rounded-lg mx-auto mt-16 sm:mt-0">
                    <p class="tracking-tight font-semibold text-2xl">
                        {{ $finalResult['message'] }}
                    </p>

                    <div class="my-8">
                        <p class="tracking-tight text-lg -mb-1">
                            Your score
                        </p>
                        <p class="tracking-tight font-semibold text-2xl">
                            {{ $finalResult['totalScore'] }}/{{ $finalResult['maxScore'] }} points
                        </p>
                        <p>
                            of {{ $finalResult['totalMap'] }} maps on
                            <span class="text-cyan-300">{{ $gameDetails['miniMap']->building ?? 'Random' }}</span>
                        </p>

                        <p>
                            Difficulty:
                            <span
                                class="@if ($gameDetails['difficulty'] == 'easy') text-cyan-300 @elseif ($gameDetails['difficulty'] == 'normal') text-yellow-500 @elseif ($gameDetails['difficulty'] == 'hard') text-red-500 @endif">{{ ucwords($gameDetails['difficulty']) }}</span>
                        </p>

                        {{-- <div class="mt-3 flex flex-col items-center gap-3">
                            <p class="font-semibold tracking-tighter text-lg">
                                You got new achievements
                            </p>
                            <div
                                class="flex flex-col items-center p-4 rounded-lg border border-cyan-500 bg-gray-800 gap-4 transition-all ease-in-out w-full sm:max-w-48 hover:border-cyan-400">
                                <div class="mb-3 rounded-full w-24 h-24 bg-gray-400 overflow-hidden">
                                    <img src="{{ asset('images/masjid.png') }}" alt="Image of Profile"
                                        class="object-cover object-center" />
                                </div>
                                <div class="text-center">
                                    <p class="font-semibold tracking-tighter">
                                        As Sakinah
                                    </p>
                                    <p class="text-gray-400">Religious</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <div class="flex flex-col justify-center gap-2 sm:flex-row">
                        <a class="inline-flex justify-center items-center gap-2 text-white border border-gray-500 bg-gray-600/50 hover:bg-gray-700/40 focus:ring-4 focus:ring-gray-800 font-medium rounded-md text-sm px-5 py-2.5 focus:outline-none transition ease-in-out duration-75"
                            href="{{ route('leaderboard') }}">
                            Leaderboard
                            <span class="material-symbols-outlined m-0 !text-[18px]">
                                trophy
                            </span>
                        </a>
                        <a class="inline-flex justify-center items-center gap-2 text-white border border-gray-500 bg-gray-600/50 hover:bg-gray-700/40 focus:ring-4 focus:ring-gray-800 font-medium rounded-md text-sm px-5 py-2.5 focus:outline-none transition ease-in-out duration-75"
                            href="{{ url('/game/start?building=' . (isset($gameDetails['miniMap']) ? $gameDetails['miniMap']->name : 'random') . '&difficulty=' . $gameDetails['difficulty']) }}">
                            Play Again
                            <span class="material-symbols-outlined m-0 !text-[18px]">
                                replay
                            </span>
                        </a>
                        <a class="inline-flex justify-center items-center gap-2 text-white border border-gray-500 bg-gray-600/50 hover:bg-gray-700/40 focus:ring-4 focus:ring-gray-800 font-medium rounded-md text-sm px-5 py-2.5 focus:outline-none transition ease-in-out duration-75"
                            href="{{ route('game.menu') }}">
                            Main menu
                            <span class="material-symbols-outlined m-0 !text-[18px]">
                                sports_esports
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

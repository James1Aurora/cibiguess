@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <section class="mx-auto max-w-7xl mb-4">
        <div class="rounded-lg p-4 w-full flex items-center bg-gradient-to-r from-cyan-500 to-cyan-700 h-28 sm:h-36">
            <div>
                <p class="text-white text-sm -mb-1">
                    Hello, Good Morning
                </p>
                <p class="font-semibold tracking-tight text-xl text-white">
                    Administrator, Ucok!
                </p>
            </div>
        </div>

        <div class="mt-3">
            <div class="mb-3 grid grid-cols-1 gap-2 group-[.open]:grid-cols-1 md:group-[.open]:grid-cols-3 md:grid-cols-3">
                {{-- CANVA BIKIN OVERFLOW --}}
                <div
                    class="bg-cyan-200 w-full h-full border border-gray-300 p-2 rounded-lg hidden group-[.open]:hidden md:group-[.open]:block md:block">
                    <p class="text-cyan-700 font-semibold tracking-tight text-lg sm:text-2xl">
                        About CibiGuess data
                    </p>
                </div>
                <div>
                    <div class="w-full border border-gray-300 p-2 rounded-lg max-h-72">
                        <p class="text-sm font-medium text-center">
                            Montly Active Users
                        </p>
                        <canvas id="totalPlays" class=""></canvas>
                    </div>
                </div>
                <div>
                    <div class="w-full border border-gray-300 p-2 rounded-lg max-h-72">
                        <p class="text-sm font-medium text-center">
                            Avg. Score by Difficulty
                        </p>
                        <canvas id="avgPlays" class=""></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <section class="mx-auto max-w-7xl mb-4">
        <div class="rounded-lg p-4 w-full flex items-center bg-gradient-to-r from-cyan-500 to-cyan-700 h-28 sm:h-36">
            <div>
                <p class="text-white text-sm -mb-1" id="timeName">
                    Hello, Good Morning!
                </p>
                <p class="font-semibold tracking-tight text-xl text-white">
                    Administrator, {{ $user->name }}!
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
                        {{-- <p class="text-sm font-medium text-center">
                            Montly Active Users
                        </p> --}}
                        <canvas id="totalPlays" class=""></canvas>
                    </div>
                </div>
                <div>
                    <div class="w-full border border-gray-300 p-2 rounded-lg max-h-72">
                        {{-- <p class="text-sm font-medium text-center">
                            Avg. Score by Difficulty
                        </p> --}}
                        <canvas id="avgScore" class=""></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     const timeOfDay = getTimeOfDay();

        //     document.getElementById('timeName').innerText = getTimeOfDay();
        // });

        // function getTimeOfDay() {
        //     const now = new Date();
        //     const hours = now.getHours();

        //     if (hours >= 5 && hours < 12) {
        //         return "Hello, Good Morning!";
        //     } else if (hours >= 12 && hours < 18) {
        //         return "Hello, Good Evening!";
        //     } else {
        //         return "Hello, Good Night!";
        //     }
        // }

        // TOTAL PLAYS
        const totalPlaysData = {
            labels: [{{ Js::from($monthLabels['before']) }}, {{ Js::from($monthLabels['current']) }},
                {{ Js::from($monthLabels['after']) }}
            ],
            datasets: [{
                label: 'Monthly Active Users',
                backgroundColor: 'rgb(31, 169, 207)',
                borderColor: 'rgb(31, 169, 207)',
                data: [{{ Js::from($activeUsers['first']) }}, {{ Js::from($activeUsers['mid']) }},
                    {{ Js::from($activeUsers['end']) }}.
                ],
            }]
        };

        const totalPlaysConfig = {
            type: 'line',
            data: totalPlaysData,
            options: {}
        };

        const totalPlays = new Chart(
            document.getElementById('totalPlays'),
            totalPlaysConfig
        );

        // AVERAGE SCORE
        const avgScoreData = {
            labels: ['Easy', 'Medium', 'Hard'],
            datasets: [{
                label: 'Avg. Score by Difficulty',
                backgroundColor: 'rgb(31, 169, 207)',
                borderColor: 'rgb(31, 169, 207)',
                data: [{{ Js::from($avgScore['easy']) }}, {{ Js::from($avgScore['medium']) }},
                    {{ Js::from($avgScore['hard']) }}.
                ],
            }]
        };

        const avgScoreConfig = {
            type: 'line',
            data: avgScoreData,
            options: {}
        };

        const avgScore = new Chart(
            document.getElementById('avgScore'),
            avgScoreConfig
        );
    </script>
@endsection

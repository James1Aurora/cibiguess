@extends('layouts.clearDark')
<head>
<link rel="icon" type="image/svg+xml" href="{{ asset('images/icon-cibiguess.svg') }}" />
</head>
@section('title', 'Reviews | Cibiguess')

@section('content')
    <main class="w-svw min-h-svh relative flex flex-col justify-center items-center overflow-hidden p-2 lg:p-1">
        <div class="absolute top-0 w-full">
            <div class="flex justify-between m-2">
                <a href="{{ route('game.menu') }}"
                    class="inline-flex justify-center items-center gap-2 text-white border border-gray-500 bg-gray-800/50 hover:bg-gray-950/60 focus:ring-4 focus:ring-gray-600 font-medium rounded-md text-sm px-2 py-2.5 focus:outline-none transition ease-in-out duration-75">
                    <span class="material-symbols-outlined m-0 !text-xl">
                        home
                    </span>
                    <span class="hidden sm:block">Go back</span>
                </a>
                <a href="{{ route('review.create') }}"
                    class="inline-flex justify-center items-center gap-2 text-white border border-gray-500 bg-gray-800/50 hover:bg-gray-950/60 focus:ring-4 focus:ring-gray-600 font-medium rounded-md text-sm px-2 py-2.5 focus:outline-none transition ease-in-out duration-75">
                    <span class="material-symbols-outlined m-0 !text-xl">
                        star
                    </span>
                    <span class="hidden sm:block">Make a review</span>
                </a>
            </div>
        </div>

        <section class="relative container max-w-5xl mx-auto mt-16 sm:mt-0">
            <div class="absolute left-20 -top-60 p-64 -z-10">
                <div
                    class="relative flex place-items-center before:absolute before:h-[240px] before:w-[800px] before:rounded-full before:bg-gradient-to-br before:from-white/25 before:to-transparent before:blur-3xl before:content-[''] before:-z-20 after:absolute after:-z-20 after:h-[580px] after:w-[1300px] after:rounded-full after:-translate-x-1/3 after:blur-3xl after:bg-gradient-to-br after:from-purple-600/45 after:via-purple-800/35 after:content-[''] before:lg:h-[540px]">
                </div>
            </div>

            <div class="relative">
                <div class="bg-[#031821]/40 border border-gray-600 backdrop-blur-md rounded-lg p-2 sm:p-4">
                    <div class="text-center">
                        <p class="tracking-tight font-semibold text-2xl">
                            What's people say
                            <span class="text-cyan-400">about us</span>
                        </p>
                        <p class="text-gray-300">
                            Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Itaque dicta esse at facilis.
                            Modi similique dolorum at temporibus.
                        </p>
                    </div>

                    @if ($reviews->isEmpty())
                        <p class="text-gray-300 text-center my-5">No reviews found</p>
                    @else
                        <div class="mt-5 grid grid-cols-2 gap-1 sm:gap-3 md:grid-cols-3 lg:grid-cols-4">
                            @foreach ($reviews as $review)
                                @php
                                    $formattedDate = $review->created_at->translatedFormat('j F Y');
                                @endphp

                                <div class="flex flex-col justify-between border border-gray-600 rounded-md p-2">
                                    <p class="mb-2">
                                        {{ $review->comment }}
                                    </p>
                                    <div>
                                        <p class="flex items-center gap-1 text-yellow-500">
                                            <span class="material-symbols-outlined !text-lg">
                                                star
                                            </span>
                                            {{ $review->rating }}
                                        </p>
                                        <p class="text-gray-300 italic text-sm">
                                            {{ $review->user->name }} ~ {{ $formattedDate }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            </div>

            <div class="absolute right-20 -bottom-96 p-64 rotate-180 -z-10">
                <div
                    class="relative flex place-items-center before:absolute before:h-[240px] before:w-[500px] before:rounded-full before:bg-gradient-to-br before:from-white/25 before:to-transparent before:blur-3xl before:content-[''] before:-z-20 after:absolute after:-z-20 after:h-[580px] after:w-[1300px] after:rounded-full after:-translate-x-1/3 after:blur-3xl after:bg-gradient-to-br after:from-yellow-600/25 after:via-yellow-800/15 after:content-[''] before:lg:h-[540px];">
                </div>
            </div>
        </section>
    </main>

    @if (session('success'))
        <x-toast message="{{ session('success') }}" type="info">{{ session('success') }}</x-toast>
    @endif

    @if (session('error'))
        <x-toast message="{{ session('error') }}" type="error">{{ session('error') }}</x-toast>
    @endif
@endsection

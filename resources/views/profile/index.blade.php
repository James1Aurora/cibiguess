@extends('layouts.clearDark')

@section('title', 'Profile | CibiGuess')

@section('content')
    <section class="min-h-svh overflow-x-hidden">
        <a href="{{ route('game.menu') }}"
            class="inline-flex justify-center items-center m-4 mb-2 text-white border border-gray-500 bg-gray-800/50 hover:bg-gray-950/60 focus:ring-4 focus:ring-gray-600 font-medium rounded-md text-sm h-12 w-12 focus:outline-none transition ease-in-out duration-75">
            <span class="material-symbols-outlined m-0 !text-xl">
                home
            </span>
        </a>

        <section class="container max-w-6xl mx-auto h-full relative p-4 mt-2 mb-12 md:p-2">
            <div class="absolute -top-28 p-64 -z-10 -right-10">
                <div
                    class="relative flex place-items-center before:absolute before:h-[240px] before:w-[300px] before:rounded-full before:bg-gradient-to-br before:from-white/25 before:to-transparent before:blur-3xl before:content-[''] before:-z-20 after:absolute after:-z-20 after:h-[340px] after:w-[600px] after:rounded-full after:-translate-x-1/3 after:blur-3xl after:bg-gradient-to-br after:from-cyan-400/45 after:via-cyan-200/35 after:content-[''] before:lg:h-[540px]">
                </div>
            </div>

            <div class="border border-gray-500 bg-gray-700/50 backdrop-blur-md rounded-lg p-4">
                <div class="flex items-center p-4 rounded-lg border border-gray-500 bg-gray-800 w-fit gap-4">
                    <div class="rounded-full w-24 h-24 bg-gray-400 overflow-hidden">
                        <img src="{{ asset('images/user-default.jpg') }}" alt="Image of Profile"
                            class="object-cover object-center" />
                    </div>
                    <div>
                        <p class="font-semibold tracking-tighter text-lg">
                            {{ $user->name }}
                        </p>
                        <p class="text-gray-400">{{ $user->email }}</p>
                    </div>
                </div>

                <div class="mt-5">
                    <p class="font-semibold tracking-tighter text-lg mb-3">
                        Achievements
                    </p>

                    @if ($user->userBadges->count() > 0)
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-2">
                            @foreach ($user->userBadges as $bdg)
                                <div
                                    class="flex flex-col items-center p-4 rounded-lg border border-gray-500 bg-gray-800 gap-4 transition-all ease-in-out hover:border-gray-400">
                                    <div class="mb-3 rounded-full w-24 h-24 bg-gray-400 overflow-hidden">
                                        <img src="{{ asset('storage/badges/' . $bdg->badge->image) }}"
                                            alt="{{ $bdg->badge->title }}" class="object-cover object-center" />
                                    </div>
                                    <div class="text-center">
                                        <p class="font-semibold tracking-tighter">
                                            {{ $bdg->badge->title }}
                                        </p>
                                        <p class="text-gray-400 text-xs">{{ $bdg->badge->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-400 text-center py-5">
                            No achievements yet
                        </p>
                    @endif
                </div>
            </div>
        </section>
    </section>
@endsection

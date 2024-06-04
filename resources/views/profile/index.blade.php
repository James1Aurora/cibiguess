@extends('layouts.clearDark')

@section('title', 'Profile | Cibiguess')

@section('content')
    <section class="w-screen h-screen overflow-hidden relative">
        <div class="absolute -top-28 p-64 -z-10 -right-10">
            <div
                class="relative flex place-items-center before:absolute before:h-[240px] before:w-[300px] before:rounded-full before:bg-gradient-to-br before:from-white/25 before:to-transparent before:blur-3xl before:content-[''] before:-z-20 after:absolute after:-z-20 after:h-[340px] after:w-[600px] after:rounded-full after:-translate-x-1/3 after:blur-3xl after:bg-gradient-to-br after:from-cyan-400/45 after:via-cyan-200/35 after:content-[''] before:lg:h-[540px]">
            </div>
        </div>

        <a href="{{ route('game.menu') }}"
            class="md:absolute inline-flex justify-center items-center m-4 text-white border border-gray-500 bg-gray-800/50 hover:bg-gray-950/60 focus:ring-4 focus:ring-gray-600 font-medium rounded-md text-sm h-12 w-12 focus:outline-none transition ease-in-out duration-75">
            <span class="material-symbols-outlined m-0 !text-xl">
                home
            </span>
        </a>

        <section class="container max-w-6xl mx-auto h-full relative p-4 mt-2 mb-12 md:p-2">
            <div class="border border-gray-500 bg-gray-700/50 backdrop-blur-md rounded-lg p-4">
                <div class="flex items-center p-4 rounded-lg border border-gray-500 bg-gray-800 w-fit gap-4">
                    <div class="rounded-full w-24 h-24 bg-gray-400 overflow-hidden">
                        <img src="{{ asset('images/user-default.jpg') }}" alt="Image of Profile"
                            class="object-cover object-center" />
                    </div>
                    <div>
                        <p class="font-semibold tracking-tighter text-lg">
                            Akmal Wijaro
                        </p>
                        <p class="text-gray-400">The Seeker</p>
                    </div>
                </div>

                <div class="mt-5">
                    <p class="font-semibold tracking-tighter text-lg mb-3">
                        Achievements
                    </p>

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-2">
                        <div
                            class="flex flex-col items-center p-4 rounded-lg border border-gray-500 bg-gray-800 gap-4 transition-all ease-in-out hover:border-gray-400">
                            <div class="mb-3 rounded-full w-24 h-24 bg-gray-400 overflow-hidden">
                                <img src="images/masjid.png" alt="Image of Profile" class="object-cover object-center" />
                            </div>
                            <div class="text-center">
                                <p class="font-semibold tracking-tighter">
                                    As Sakinah
                                </p>
                                <p class="text-gray-400">Religious</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col items-center p-4 rounded-lg border border-gray-500 bg-gray-800 gap-4 transition-all ease-in-out hover:border-gray-400">
                            <div class="mb-3 rounded-full w-24 h-24 bg-gray-400 overflow-hidden">
                                <img src="images/unkown.png" alt="Image of Profile" class="object-cover object-center" />
                            </div>
                            <div class="text-center">
                                <p class="font-semibold tracking-tighter">
                                    ???
                                </p>
                                <p class="text-gray-400">Unkown</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col items-center p-4 rounded-lg border border-gray-500 bg-gray-800 gap-4 transition-all ease-in-out hover:border-gray-400">
                            <div class="mb-3 rounded-full w-24 h-24 bg-gray-400 overflow-hidden">
                                <img src="images/unkown.png" alt="Image of Profile" class="object-cover object-center" />
                            </div>
                            <div class="text-center">
                                <p class="font-semibold tracking-tighter">
                                    ???
                                </p>
                                <p class="text-gray-400">Unkown</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col items-center p-4 rounded-lg border border-gray-500 bg-gray-800 gap-4 transition-all ease-in-out hover:border-gray-400">
                            <div class="mb-3 rounded-full w-24 h-24 bg-gray-400 overflow-hidden">
                                <img src="images/unkown.png" alt="Image of Profile" class="object-cover object-center" />
                            </div>
                            <div class="text-center">
                                <p class="font-semibold tracking-tighter">
                                    ???
                                </p>
                                <p class="text-gray-400">Unkown</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col items-center p-4 rounded-lg border border-gray-500 bg-gray-800 gap-4 transition-all ease-in-out hover:border-gray-400">
                            <div class="mb-3 rounded-full w-24 h-24 bg-gray-400 overflow-hidden">
                                <img src="images/unkown.png" alt="Image of Profile" class="object-cover object-center" />
                            </div>
                            <div class="text-center">
                                <p class="font-semibold tracking-tighter">
                                    ???
                                </p>
                                <p class="text-gray-400">Unkown</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col items-center p-4 rounded-lg border border-gray-500 bg-gray-800 gap-4 transition-all ease-in-out hover:border-gray-400">
                            <div class="mb-3 rounded-full w-24 h-24 bg-gray-400 overflow-hidden">
                                <img src="images/unkown.png" alt="Image of Profile" class="object-cover object-center" />
                            </div>
                            <div class="text-center">
                                <p class="font-semibold tracking-tighter">
                                    ???
                                </p>
                                <p class="text-gray-400">Unkown</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col items-center p-4 rounded-lg border border-gray-500 bg-gray-800 gap-4 transition-all ease-in-out hover:border-gray-400">
                            <div class="mb-3 rounded-full w-24 h-24 bg-gray-400 overflow-hidden">
                                <img src="images/unkown.png" alt="Image of Profile" class="object-cover object-center" />
                            </div>
                            <div class="text-center">
                                <p class="font-semibold tracking-tighter">
                                    ???
                                </p>
                                <p class="text-gray-400">Unkown</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col items-center p-4 rounded-lg border border-gray-500 bg-gray-800 gap-4 transition-all ease-in-out hover:border-gray-400">
                            <div class="mb-3 rounded-full w-24 h-24 bg-gray-400 overflow-hidden">
                                <img src="images/unkown.png" alt="Image of Profile" class="object-cover object-center" />
                            </div>
                            <div class="text-center">
                                <p class="font-semibold tracking-tighter">
                                    ???
                                </p>
                                <p class="text-gray-400">Unkown</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col items-center p-4 rounded-lg border border-gray-500 bg-gray-800 gap-4 transition-all ease-in-out hover:border-gray-400">
                            <div class="mb-3 rounded-full w-24 h-24 bg-gray-400 overflow-hidden">
                                <img src="images/unkown.png" alt="Image of Profile" class="object-cover object-center" />
                            </div>
                            <div class="text-center">
                                <p class="font-semibold tracking-tighter">
                                    ???
                                </p>
                                <p class="text-gray-400">Unkown</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col items-center p-4 rounded-lg border border-gray-500 bg-gray-800 gap-4 transition-all ease-in-out hover:border-gray-400">
                            <div class="mb-3 rounded-full w-24 h-24 bg-gray-400 overflow-hidden">
                                <img src="images/unkown.png" alt="Image of Profile" class="object-cover object-center" />
                            </div>
                            <div class="text-center">
                                <p class="font-semibold tracking-tighter">
                                    ???
                                </p>
                                <p class="text-gray-400">Unkown</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col items-center p-4 rounded-lg border border-gray-500 bg-gray-800 gap-4 transition-all ease-in-out hover:border-gray-400">
                            <div class="mb-3 rounded-full w-24 h-24 bg-gray-400 overflow-hidden">
                                <img src="images/unkown.png" alt="Image of Profile" class="object-cover object-center" />
                            </div>
                            <div class="text-center">
                                <p class="font-semibold tracking-tighter">
                                    ???
                                </p>
                                <p class="text-gray-400">Unkown</p>
                            </div>
                        </div>
                        <div
                            class="flex flex-col items-center p-4 rounded-lg border border-gray-500 bg-gray-800 gap-4 transition-all ease-in-out hover:border-gray-400">
                            <div class="mb-3 rounded-full w-24 h-24 bg-gray-400 overflow-hidden">
                                <img src="images/unkown.png" alt="Image of Profile" class="object-cover object-center" />
                            </div>
                            <div class="text-center">
                                <p class="font-semibold tracking-tighter">
                                    ???
                                </p>
                                <p class="text-gray-400">Unkown</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection

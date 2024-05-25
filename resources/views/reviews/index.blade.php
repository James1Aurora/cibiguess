@extends('layouts.clearDark')

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

                    <div class="mt-5 grid grid-cols-2 gap-1 sm:gap-3 md:grid-cols-3 lg:grid-cols-4">
                        <div class="flex flex-col justify-between border border-gray-600 rounded-md p-2">
                            <p class="mb-2">
                                "Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Neque, cum quasi
                                aspernatur eius quas perspiciatis."
                            </p>
                            <div>
                                <p class="flex items-center gap-1 text-yellow-500">
                                    <span class="material-symbols-outlined !text-lg">
                                        star
                                    </span>
                                    4.7
                                </p>
                                <p class="text-gray-300 italic text-sm">
                                    Ilham God ~ 24 Sep 2024
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between border border-gray-600 rounded-md p-2">
                            <p class="mb-2">
                                "Lorem ipsum dolor sit amet consectetur
                                adipisicing."
                            </p>
                            <div>
                                <p class="flex items-center gap-1 text-yellow-500">
                                    <span class="material-symbols-outlined !text-lg">
                                        star
                                    </span>
                                    5.0
                                </p>
                                <p class="text-gray-300 italic text-sm">
                                    Sigit Rendang ~ 24 Sep 2024
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between border border-gray-600 rounded-md p-2">
                            <p class="mb-2">
                                "Lorem, ipsum dolor sit amet consectetur
                                adipisicing elit. Quo, nulla."
                            </p>
                            <div>
                                <p class="flex items-center gap-1 text-yellow-500">
                                    <span class="material-symbols-outlined !text-lg">
                                        star
                                    </span>
                                    5.0
                                </p>
                                <p class="text-gray-300 italic text-sm">
                                    Tuker ~ 23 Sep 2024
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between border border-gray-600 rounded-md p-2">
                            <p class="mb-2">
                                "Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Quam suscipit qui non."
                            </p>
                            <div>
                                <p class="flex items-center gap-1 text-yellow-500">
                                    <span class="material-symbols-outlined !text-lg">
                                        star
                                    </span>
                                    4.9
                                </p>
                                <p class="text-gray-300 italic text-sm">
                                    Komar Sutis ~ 21 Sep 2024
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between border border-gray-600 rounded-md p-2">
                            <p class="mb-2">
                                "Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Neque, cum quasi
                                aspernatur eius quas perspiciatis."
                            </p>
                            <div>
                                <p class="flex items-center gap-1 text-yellow-500">
                                    <span class="material-symbols-outlined !text-lg">
                                        star
                                    </span>
                                    4.7
                                </p>
                                <p class="text-gray-300 italic text-sm">
                                    Ilham God ~ 24 Sep 2024
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between border border-gray-600 rounded-md p-2">
                            <p class="mb-2">
                                "Lorem ipsum dolor sit amet consectetur
                                adipisicing."
                            </p>
                            <div>
                                <p class="flex items-center gap-1 text-yellow-500">
                                    <span class="material-symbols-outlined !text-lg">
                                        star
                                    </span>
                                    5.0
                                </p>
                                <p class="text-gray-300 italic text-sm">
                                    Sigit Rendang ~ 24 Sep 2024
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between border border-gray-600 rounded-md p-2">
                            <p class="mb-2">
                                "Lorem, ipsum dolor sit amet consectetur
                                adipisicing elit. Quo, nulla."
                            </p>
                            <div>
                                <p class="flex items-center gap-1 text-yellow-500">
                                    <span class="material-symbols-outlined !text-lg">
                                        star
                                    </span>
                                    5.0
                                </p>
                                <p class="text-gray-300 italic text-sm">
                                    Tuker ~ 23 Sep 2024
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between border border-gray-600 rounded-md p-2">
                            <p class="mb-2">
                                "Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Quam suscipit qui non."
                            </p>
                            <div>
                                <p class="flex items-center gap-1 text-yellow-500">
                                    <span class="material-symbols-outlined !text-lg">
                                        star
                                    </span>
                                    4.9
                                </p>
                                <p class="text-gray-300 italic text-sm">
                                    Komar Sutis ~ 21 Sep 2024
                                </p>
                            </div>
                        </div>
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
@endsection

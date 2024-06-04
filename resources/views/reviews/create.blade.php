@extends('layouts.clearDark')

@section('title', 'Create Review | Cibiguess')

@section('content')
    <main class="w-svw min-h-svh relative flex flex-col justify-center items-center overflow-hidden p-2 lg:p-1">
        <div class="absolute top-0 w-full">
            <div class="flex justify-between m-2">
                <a href="{{ route('review') }}"
                    class="inline-flex justify-center items-center gap-2 text-white border border-gray-500 bg-gray-800/50 hover:bg-gray-950/60 focus:ring-4 focus:ring-gray-600 font-medium rounded-md text-sm px-2 py-2.5 focus:outline-none transition ease-in-out duration-75">
                    <span class="material-symbols-outlined m-0 !text-xl">
                        home
                    </span>
                    <span class="hidden sm:block">Go back</span>
                </a>
            </div>
        </div>

        <section class="relative container max-w-xl mx-auto mt-16 sm:mt-0">
            <div class="absolute left-20 -top-60 p-64 -z-10">
                <div
                    class="relative flex place-items-center before:absolute before:h-[240px] before:w-[800px] before:rounded-full before:bg-gradient-to-br before:from-white/25 before:to-transparent before:blur-3xl before:content-[''] before:-z-20 after:absolute after:-z-20 after:h-[580px] after:w-[1300px] after:rounded-full after:-translate-x-1/3 after:blur-3xl after:bg-gradient-to-br after:from-purple-600/45 after:via-purple-800/35 after:content-[''] before:lg:h-[540px]">
                </div>
            </div>

            <div class="relative">
                <div class="bg-[#031821]/40 border border-gray-600 backdrop-blur-md rounded-lg p-2 sm:p-4">
                    <div>
                        <p class="text-center tracking-tight font-semibold text-2xl">
                            Let us know
                            <span class="text-cyan-400">your review</span>
                        </p>

                        <div class="mt-4">
                            <label for="name" class="w-fit font-medium">Name</label>
                            <div class="mt-1">
                                <input id="name" type="text" name="name" placeholder="Your name..."
                                    class="w-full px-1.5 py-2 border-b bg-transparent border-gray-300 shadow-sm transition-all ease-in-out duration-100 hover:border-cyan-200 focus:border-cyan-400 outline-none text-sm sm:text-base" />
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="name" class="w-fit font-medium">E-mail</label>
                            <div class="mt-1">
                                <input id="email" type="email" name="email" placeholder="example@mail.com"
                                    class="w-full px-1.5 py-2 border-b bg-transparent border-gray-300 shadow-sm transition-all ease-in-out duration-100 hover:border-cyan-200 focus:border-cyan-400 outline-none text-sm sm:text-base" />
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="mb-2">Rating</p>
                            <div class="flex gap-1">
                                <span
                                    class="material-symbols-outlined m-0 !leading-none text-yellow-400 filled !text-[22px]">
                                    kid_star
                                </span>
                                <span class="material-symbols-outlined m-0 !leading-none text-yellow-400 !text-[22px]">
                                    kid_star
                                </span>
                                <span class="material-symbols-outlined m-0 !leading-none text-yellow-400 !text-[22px]">
                                    kid_star
                                </span>
                                <span class="material-symbols-outlined m-0 !leading-none text-yellow-400 !text-[22px]">
                                    kid_star
                                </span>
                                <span class="material-symbols-outlined m-0 !leading-none text-yellow-400 !text-[22px]">
                                    kid_star
                                </span>
                            </div>
                        </div>
                        <div class="my-4">
                            <label for="message" class="w-fit font-medium">Message</label>
                            <div class="mt-1">
                                <textarea name="message" id="message" rows="5"
                                    class="w-full px-1.5 py-2 border-b bg-transparent border-gray-300 shadow-sm transition-colors ease-in-out duration-100 hover:border-cyan-200 focus:border-cyan-400 outline-none text-sm sm:text-base"
                                    placeholder="Your message..."></textarea>
                            </div>
                        </div>
                        <div class="grid gap-2 grid-cols-2">
                            <a class="outline-none inline-flex justify-center items-center gap-2 text-white border border-gray-600 bg-gray-700 hover:bg-gray-800 focus:ring-1 focus:ring-gray-500 font-medium rounded-md text-sm px-5 py-2.5 focus:outline-none transition-all ease-in-out duration-150"
                                href="/public/main-menu.html">
                                Cancel
                            </a>
                            <button type="button"
                                class="outline-none inline-flex justify-center items-center gap-2 text-white border border-cyan-600 bg-cyan-700 hover:bg-cyan-800 focus:ring-1 focus:ring-cyan-500 font-medium rounded-md text-sm px-5 py-2.5 focus:outline-none transition-all ease-in-out duration-150"
                                href="#">
                                Submit
                            </button>
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

@extends('layouts.clearDark')
<head>
<link rel="icon" type="image/svg+xml" href="{{ asset('images/icon-cibiguess.svg') }}" />
</head>
@section('title', 'Donate | Cibiguess')

@section('content')
    <main class="w-svw min-h-svh flex justify-center items-center overflow-x-hidden p-2 lg:p-1">
        <section class="relative container max-w-xl mx-auto">
            <div class="absolute -top-28 p-64 -z-10 -right-10">
                <div
                    class="relative flex place-items-center before:absolute before:h-[240px] before:w-[300px] before:rounded-full before:bg-gradient-to-br before:from-white/25 before:to-transparent before:blur-3xl before:content-[''] before:-z-20 after:absolute after:-z-20 after:h-[340px] after:w-[600px] after:rounded-full after:-translate-x-1/3 after:blur-3xl after:bg-gradient-to-br after:from-cyan-400/45 after:via-cyan-200/35 after:content-[''] before:lg:h-[540px]">
                </div>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('game.menu') }}"
                    class="flex items-center gap-1 text-sm p-1 mb-2 transition-all ease-in-out duration-150 rounded-md hover:bg-gray-900/80"><span
                        class="material-symbols-outlined !text-lg">
                        reply </span>Main Menu</a>
            </div>

            <div class="border border-gray-600 p-4 rounded-lg bg-[#031821]/40 backdrop-blur-md">
                <div class="text-center mb-3">
                    <p class="text-2xl font-semibold tracking-tight">
                        Donate Us
                    </p>
                    <p class="text-sm text-gray-300">
                        Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Optio, quidem.
                    </p>
                </div>

                <!-- add form donation here, contains name, email, amount, payment method, and message -->
                <form class="mt-3">
                    <div class="block sm:grid grid-cols-2 gap-5">
                        <div class="mt-4">
                            <label for="name" class="w-fit font-medium">Name</label>
                            <div class="mt-1">
                                <input type="text" name="name" id="name" placeholder="Your name..."
                                    class="w-full px-1.5 py-2 border-b bg-transparent border-gray-300 shadow-sm transition-all ease-in-out duration-100 hover:border-cyan-200 focus:border-cyan-400 outline-none text-sm sm:text-base" />
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="email" class="w-fit font-medium">Email</label>
                            <div class="mt-1">
                                <input type="email" name="email" id="email" placeholder="yourmail@example.com"
                                    class="w-full px-1.5 py-2 border-b bg-transparent border-gray-300 shadow-sm transition-all ease-in-out duration-100 hover:border-cyan-200 focus:border-cyan-400 outline-none text-sm sm:text-base" />
                            </div>
                        </div>
                    </div>
                    <div class="my-4">
                        <label for="amount" class="w-fit font-medium">Amount</label>
                        <div class="mt-1 flex items-center gap-1">
                            <p>Rp</p>
                            <input type="number" name="amount" id="amount" placeholder="10000"
                                class="w-full px-1.5 py-2 border-b bg-transparent border-gray-300 shadow-sm transition-all ease-in-out duration-100 hover:border-cyan-200 focus:border-cyan-400 outline-none text-sm sm:text-base number-input-no-arrow" />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2 sm:grid-cols-4">
                        <button type="button"
                            class="cursor-pointer border border-gray-600 rounded-lg px-2 py-4 flex justify-center items-center transition-colors ease-in-out duration-150 backdrop-blur-md hover:bg-yellow-900/70 hover:border-yellow-600">
                            <p>Rp 5.000</p>
                        </button>
                        <button type="button"
                            class="cursor-pointer border border-gray-600 rounded-lg px-2 py-4 flex justify-center items-center transition-colors ease-in-out duration-150 backdrop-blur-md hover:bg-purple-900/70 hover:border-purple-600">
                            <p>Rp 10.000</p>
                        </button>
                        <button type="button"
                            class="cursor-pointer border border-gray-600 rounded-lg px-2 py-4 flex justify-center items-center transition-colors ease-in-out duration-150 backdrop-blur-md hover:bg-cyan-900/70 hover:border-cyan-600">
                            <p>Rp 50.000</p>
                        </button>
                        <button type="button"
                            class="cursor-pointer border border-gray-600 rounded-lg px-2 py-4 flex justify-center items-center transition-colors ease-in-out duration-150 backdrop-blur-md hover:bg-red-900/70 hover:border-red-600">
                            <p>Rp 100.000</p>
                        </button>
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
                            href="#">
                            Cancel
                        </a>
                        <a class="outline-none inline-flex justify-center items-center gap-2 text-white border border-cyan-600 bg-cyan-700 hover:bg-cyan-800 focus:ring-1 focus:ring-cyan-500 font-medium rounded-md text-sm px-5 py-2.5 focus:outline-none transition-all ease-in-out duration-150"
                            href="#">
                            Donate Now
                        </a>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection

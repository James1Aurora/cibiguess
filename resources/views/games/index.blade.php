@extends('layouts.clearDark')

<head>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/icon-cibiguess.svg') }}" />
</head>
@section('title', 'Main Menu | Cibiguess')

@section('content')
    <div>
        <section class="w-svw h-svh overflow-hidden relative">
            <div class="absolute right-80 -top-60 p-64 -z-10">
                <div
                    class="relative flex place-items-center before:absolute before:h-[240px] before:w-[800px] before:rounded-full before:bg-gradient-to-br before:from-white/25 before:to-transparent before:blur-3xl before:content-[''] before:-z-20 after:absolute after:-z-20 after:h-[580px] after:w-[1300px] after:rounded-full after:-translate-x-1/3 after:blur-3xl after:bg-gradient-to-br after:from-purple-600/45 after:via-purple-800/35 after:content-[''] before:lg:h-[540px]">
                </div>
            </div>

            <div class="max-w-7xl mx-auto h-full flex justify-between items-center p-4">
                <div class="w-1/4 sm:w-2/5">
                    <div class="mb-5">
                        <p
                            class="tracking-tighter font-bold text-2xl bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-blue-400 via-blue-300 to-blue-100/50 leading-snug bg-clip-text text-transparent sm:text-4xl">
                            CibiGuess
                        </p>
                    </div>
                    <div class="w-fit">
                        <a class="flex w-full justify-center items-center mb-6 gap-2 text-white border border-gray-500 bg-gray-600/50 hover:bg-gray-700/40 focus:ring-4 focus:ring-gray-800 font-medium rounded-md px-5 py-2.5 focus:outline-none transition ease-in-out duration-75"
                            href="{{ route('home') }}">
                            <span class="hidden sm:block">Home</span>
                            <span class="material-symbols-outlined m-0 !leading-none !text-[18px]">
                                home
                            </span>
                        </a>
                        <a class="flex w-full justify-center items-center mb-6 gap-2 text-white border border-gray-500 bg-gray-600/50 hover:bg-gray-700/40 focus:ring-4 focus:ring-gray-800 font-medium rounded-md px-5 py-2.5 focus:outline-none transition ease-in-out duration-75"
                            href="{{ route('profile') }}">
                            <span class="hidden sm:block">Profile</span>
                            <span class="material-symbols-outlined m-0 !leading-none !text-[18px]">
                                contacts
                            </span>
                        </a>
                        <a class="flex w-full justify-center items-center mb-6 gap-2 text-white border border-gray-500 bg-gray-600/50 hover:bg-gray-700/40 focus:ring-4 focus:ring-gray-800 font-medium rounded-md px-5 py-2.5 focus:outline-none transition ease-in-out duration-75"
                            href="{{ route('donate') }}">
                            <span class="hidden sm:block">Donate Us</span>
                            <span class="material-symbols-outlined m-0 !leading-none !text-[18px]">
                                trophy
                            </span>
                        </a>
                        <a class="flex w-full justify-center items-center mb-6 gap-2 text-white border border-gray-500 bg-gray-600/50 hover:bg-gray-700/40 focus:ring-4 focus:ring-gray-800 font-medium rounded-md px-5 py-2.5 focus:outline-none transition ease-in-out duration-75"
                            href="{{ route('review') }}">
                            <span class="hidden sm:block">User Reviews</span>
                            <span class="material-symbols-outlined m-0 !leading-none !text-[18px]">
                                logout
                            </span>
                        </a>
                        <a class="flex w-full justify-center items-center mb-6 gap-2 text-white border border-gray-500 bg-gray-600/50 hover:bg-gray-700/40 focus:ring-4 focus:ring-gray-800 font-medium rounded-md px-5 py-2.5 focus:outline-none transition ease-in-out duration-75"
                            href="{{ route('leaderboard') }}">
                            <span class="hidden sm:block">Leaderboard</span>
                            <span class="material-symbols-outlined m-0 !leading-none !text-[18px]">
                                trophy
                            </span>
                        </a>
                        <a class="flex w-full justify-center items-center mb-6 gap-2 text-white border border-gray-500 bg-gray-600/50 hover:bg-gray-700/40 focus:ring-4 focus:ring-gray-800 font-medium rounded-md px-5 py-2.5 focus:outline-none transition ease-in-out duration-75"
                            href="{{ route('logout') }}">
                            <span class="hidden sm:block">Logout</span>
                            <span class="material-symbols-outlined m-0 !leading-none !text-[18px]">
                                logout
                            </span>
                        </a>
                    </div>
                </div>
                <div class="w-3/4 sm:w-3/5">
                    <div class="w-full flex flex-col items-center gap-4">
                        <div
                            class="bg-[#031821]/40 border border-gray-700 backdrop-blur-md rounded-lg max-w-xl w-full p-4 text-center">
                            <p class="tracking-tight font-semibold text-2xl">
                                Hi, {{ $user->name }}
                            </p>

                            <div class="my-8">
                                <p class="tracking-tight text-lg -mb-1">
                                    Your best score was
                                </p>
                                <p class="tracking-tight font-semibold text-2xl">
                                    {{ $highScores->score ?? 0 }} points
                                </p>
                            </div>

                            <button type="button" onclick="showModal()"
                                class="inline-flex items-center gap-2 text-white border border-cyan-200 bg-cyan-400 hover:bg-cyan-600 focus:ring-4 focus:ring-cyan-600 font-medium rounded-md text-sm px-5 py-2.5 focus:outline-none transition ease-in-out duration-75">
                                Play Now
                                <span class="material-symbols-outlined m-0 !text-[18px]">
                                    sports_esports
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="absolute right-80 -bottom-96 p-64 rotate-180">
                <div
                    class="relative flex place-items-center before:absolute before:h-[240px] before:w-[500px] before:rounded-full before:bg-gradient-to-br before:from-white/25 before:to-transparent before:blur-3xl before:content-[''] before:-z-20 after:absolute after:-z-20 after:h-[580px] after:w-[1300px] after:rounded-full after:-translate-x-1/3 after:blur-3xl after:bg-gradient-to-br after:from-yellow-600/25 after:via-yellow-800/15 after:content-[''] before:lg:h-[540px]">
                </div>
            </div>
        </section>

        <!-- MODAL GAME SETTINGS -->
        <div id="modal-game" class="fixed inset-0 z-10 hidden opacity-0 items-center justify-center overflow-y-auto"
            aria-labelledby="modal-title" role="dialog" aria-modal="false">
            <!-- Background backdrop -->
            <div id="backdrop-modal-game" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity"></div>

            <!-- Modal panel -->
            <div class="relative bg-gray-700/80 border border-gray-500 rounded-lg shadow-xl max-w-2xl w-full p-4 sm:p-6">
                <form action="{{ route('game.start') }}" method="GET">
                    {{-- @csrf --}}
                    {{-- @method('POST') --}}
                    <div>
                        <p class="font-semibold tracking-tight text-lg">
                            Difficulty
                        </p>
                        <p class="mb-2 text-sm text-gray-400">
                            Are you sure you want to deactivate your account? All of
                            your data will be permanently removed. This action
                            cannot be undone.
                        </p>
                        <ul class="grid w-full gap-4 grid-cols-3">
                            <li>
                                <input id="easy" type="radio" name="difficulty" value="easy" class="hidden peer"
                                    required />
                                <label for="easy"
                                    class="inline-flex items-center w-full p-3 bg-gray-600 border border-gray-400 rounded-lg cursor-pointer peer-checked:border-cyan-500 peer-checked:text-cyan-500 hover:bg-gray-600 hover:border-cyan-500">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">
                                            Easy
                                        </div>
                                        {{-- <div class="w-full text-sm md:text-base">
                                            Good for small websites
                                        </div> --}}
                                    </div>
                                </label>
                            </li>
                            <li>
                                <input id="medium" type="radio" name="difficulty" value="medium" class="hidden peer" />
                                <label for="medium"
                                    class="inline-flex items-center w-full p-3 bg-gray-600 border border-gray-400 rounded-lg cursor-pointer peer-checked:border-yellow-500 peer-checked:text-yellow-500 hover:bg-gray-600 hover:border-yellow-500">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">
                                            Medium
                                        </div>
                                        {{-- <div class="w-full text-sm md:text-base">
                                            Good for large websites
                                        </div> --}}
                                    </div>
                                </label>
                            </li>
                            <li>
                                <input id="hard" type="radio" name="difficulty" value="hard" class="hidden peer" />
                                <label for="hard"
                                    class="inline-flex items-center w-full p-3 bg-gray-600 border border-gray-400 rounded-lg cursor-pointer peer-checked:border-red-400 peer-checked:text-red-400 hover:bg-gray-600 hover:border-red-500">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">
                                            Hard
                                        </div>
                                        {{-- <div class="w-full text-sm md:text-base">
                                            Good for large websites
                                        </div> --}}
                                    </div>
                                </label>
                            </li>
                        </ul>

                        <p class="font-semibold tracking-tight text-lg mt-3">
                            Building Mode
                        </p>
                        <p class="mb-2 text-sm text-gray-400">
                            Are you sure you want to deactivate your account? All of
                            your data will be permanently removed. This action
                            cannot be undone.
                        </p>
                        <ul class="grid w-full gap-4 grid-cols-2 md:grid-cols-4">
                            <li>
                                <input id="masjid" type="radio" name="building" value="masjid" class="hidden peer"
                                    required />
                                <label for="masjid"
                                    class="block h-full w-full p-2 bg-gray-600 border border-gray-400 rounded-lg cursor-pointer peer-checked:border-cyan-500 peer-checked:text-cyan-500 hover:bg-gray-600 hover:border-cyan-500">
                                    <img src="images/masjid.png" alt="Image of As Sakinah Mosque"
                                        class="rounded-lg h-24 w-full object-cover bg-center object-center" />
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">
                                            Masjid As Sakinah
                                        </div>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <input id="lapangan" type="radio" name="building" value="lapangan"
                                    class="hidden peer" />
                                <label for="lapangan"
                                    class="block h-full w-full p-2 bg-gray-600 border border-gray-400 rounded-lg cursor-pointer peer-checked:border-cyan-500 peer-checked:text-cyan-500 hover:bg-gray-600 hover:border-cyan-500">
                                    <img src="images/lapangan.jpg" alt="Image of Basketball Court"
                                        class="rounded-lg h-24 w-full object-cover bg-center object-center" />
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">
                                            Lapangan Belakang
                                        </div>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <input id="asrama" type="radio" name="building" value="asrama"
                                    class="hidden peer" />
                                <label for="asrama"
                                    class="block h-full w-full p-2 bg-gray-600 border border-gray-400 rounded-lg cursor-pointer peer-checked:border-cyan-500 peer-checked:text-cyan-500 hover:bg-gray-600 hover:border-cyan-500">
                                    <img src="images/asrama-perempuan.png" alt="Image of Girls Dorm"
                                        class="rounded-lg h-24 w-full object-cover bg-center object-center" />
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">
                                            Asrama Perempuan
                                        </div>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <input id="random" type="radio" name="building" value="random"
                                    class="hidden peer" />
                                <label for="random"
                                    class="block h-full w-full p-2 bg-gray-600 border border-gray-400 rounded-lg cursor-pointer peer-checked:border-cyan-500 peer-checked:text-cyan-500 hover:bg-gray-600 hover:border-cyan-500">
                                    <img src="images/random.png" alt="Randomize"
                                        class="rounded-lg h-24 w-full object-cover bg-center object-center" />
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">
                                            Random
                                        </div>
                                    </div>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <!-- Button -->
                    <div class="mt-4 flex gap-2 justify-end">
                        <button id="close-modal-help" type="button"
                            class="inline-flex justify-center items-center px-3 py-2 text-sm font-semibold transition-all ease-in-out duration-100 text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                            onclick="hideModal()">
                            Close
                        </button>
                        <button type="submit"
                            class="inline-flex justify-center items-center px-3 py-2 text-sm font-semibold transition-all ease-in-out duration-100 bg-cyan-500 border border-cyan-300 rounded-md shadow-sm hover:bg-cyan-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Play Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const modal = document.getElementById("modal-game");
        const backdrop = document.getElementById("backdrop-modal-game");

        // Fungsi untuk menampilkan modal dan backdrop
        function showModal() {
            modal.classList.remove("hidden");
            modal.classList.add("flex");
            modal.classList.add("opacity-100");
            modal.classList.remove("opacity-0", "pointer-events-none");
            backdrop.classList.remove("opacity-0", "pointer-events-none");
            backdrop.classList.add("opacity-75");
            backdrop.style.pointerEvents = "auto";
            modal.setAttribute("aria-hidden", "false");
            modal.setAttribute("aria-modal", "true");
        }

        // Fungsi untuk menyembunyikan modal dan backdrop
        function hideModal() {
            modal.classList.add("hidden");
            modal.classList.remove("flex");
            modal.classList.add("opacity-0", "pointer-events-none");
            modal.classList.remove("opacity-100");
            backdrop.classList.remove("opacity-75");
            backdrop.classList.add("opacity-0", "pointer-events-none");
            backdrop.style.pointerEvents = "none";
            modal.setAttribute("aria-hidden", "true");
            modal.setAttribute("aria-modal", "false");
        }

        backdrop.addEventListener("click", hideModal);
    </script>
@endsection

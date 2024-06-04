<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Edit Maps</title>
        <link rel="stylesheet" href="{{ asset('css/output.css') }}">
        <link rel="stylesheet" href="{{ asset('css/add-maps.css') }}">
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        />

    </head>
    <body>
        <!-- SIDEBAR -->
        <div
            class="bg-white group sidebar fixed h-full w-[78px] z-10 transition-all duration-500 ease-in-out px-3.5 py-1.5 left-0 top-0 border border-r border-gray-300 [&.open]:w-[250px] hidden sm:block"
        >
            <div class="h-[60px] flex justify-between items-center relative">
                <div>
                    <p
                        class="text-2xl font-bold opacity-0 transition-all duration-75 ease-in-out group-[.open]:opacity-100"
                    >
                        CibiGuess
                    </p>
                </div>
                <i
                    class="material-symbols-outlined h-[60px] min-w-[50px] !leading-[60px] text-center absolute -translate-y-2/4 !text-xl transition-all duration-500 ease-in-out cursor-pointer right-0 top-2/4"
                    id="btn"
                    >menu</i
                >
            </div>
            <!-- <p
                class="text-sm opacity-0 transition-all duration-75 ease-in-out hidden group-[.open]:opacity-100 group-[.open]:block"
            >
                Sistem Informasi Sign Language Augmented Reality
            </p> -->
            <ul class="h-full mt-5">
                <li class="group/nav-link relative mx-0 my-2">
                    <a
                        href="dashboard.html"
                        class="bg-cyan-500 text-white flex h-full w-full items-center no-underline transition-all duration-500 ease-in-out rounded-lg group-hover/nav-link:bg-cyan-500 group-hover/nav-link:text-white"
                    >
                        <i
                            class="material-symbols-outlined filled h-[50px] min-w-[47px] !text-xl text-center !leading-[50px]"
                            >window</i
                        >
                        <span
                            class="whitespace-nowrap opacity-0 pointer-events-none text-sm group-[.open]:opacity-100 group-[.open]:pointer-events-auto"
                            >Dashboard</span
                        >
                    </a>
                    <span
                        class="bg-white absolute z-10 shadow-lg rounded text-sm opacity-0 whitespace-nowrap pointer-events-none transition-all duration-500 ease-in-out px-3 py-1.5 left-[calc(100%_+_15px)] -top-5 group-[.open]:hidden group-hover/nav-link:opacity-100 group-hover/nav-link:pointer-events-auto group-hover/nav-link:-translate-y-2/4 group-hover/nav-link:top-2/4"
                        >Dashboard</span
                    >
                </li>
                <li class="group/nav-link relative mx-0 my-2">
                    <a
                        href="#"
                        class="flex h-full w-full items-center no-underline transition-all duration-500 ease-in-out rounded-lg group-hover/nav-link:bg-cyan-500 group-hover/nav-link:text-white"
                    >
                        <i
                            class="material-symbols-outlined h-[50px] min-w-[47px] !text-xl text-center !leading-[50px]"
                            >location_on</i
                        >
                        <span
                            class="whitespace-nowrap opacity-0 pointer-events-none text-sm group-[.open]:opacity-100 group-[.open]:pointer-events-auto"
                            >Map</span
                        >
                    </a>
                    <span
                        class="bg-white absolute z-10 shadow-lg rounded text-sm opacity-0 whitespace-nowrap pointer-events-none transition-all duration-500 ease-in-out px-3 py-1.5 left-[calc(100%_+_15px)] -top-5 group-[.open]:hidden group-hover/nav-link:opacity-100 group-hover/nav-link:pointer-events-auto group-hover/nav-link:-translate-y-2/4 group-hover/nav-link:top-2/4"
                        >Map</span
                    >
                </li>
                <li class="group/nav-link relative mx-0 my-2">
                    <a
                        href="#"
                        class="flex h-full w-full items-center no-underline transition-all duration-500 ease-in-out rounded-lg group-hover/nav-link:bg-cyan-500 group-hover/nav-link:text-white"
                    >
                        <i
                            class="material-symbols-outlined h-[50px] min-w-[47px] !text-xl text-center !leading-[50px]"
                            >account_box</i
                        >
                        <span
                            class="whitespace-nowrap opacity-0 pointer-events-none text-sm group-[.open]:opacity-100 group-[.open]:pointer-events-auto"
                            >User</span
                        >
                    </a>
                    <span
                        class="bg-white absolute z-10 shadow-lg rounded text-sm opacity-0 whitespace-nowrap pointer-events-none transition-all duration-500 ease-in-out px-3 py-1.5 left-[calc(100%_+_15px)] -top-5 group-[.open]:hidden group-hover/nav-link:opacity-100 group-hover/nav-link:pointer-events-auto group-hover/nav-link:-translate-y-2/4 group-hover/nav-link:top-2/4"
                        >User</span
                    >
                </li>
                <li class="group/nav-link relative mx-0 my-2">
                    <a
                        href="#"
                        class="flex h-full w-full items-center no-underline transition-all duration-500 ease-in-out rounded-lg group-hover/nav-link:bg-cyan-500 group-hover/nav-link:text-white"
                    >
                        <i
                            class="material-symbols-outlined h-[50px] min-w-[47px] !text-xl text-center !leading-[50px]"
                            >local_police</i
                        >
                        <span
                            class="whitespace-nowrap opacity-0 pointer-events-none text-sm group-[.open]:opacity-100 group-[.open]:pointer-events-auto"
                            >Badge</span
                        >
                    </a>
                    <span
                        class="bg-white absolute z-10 shadow-lg rounded text-sm opacity-0 whitespace-nowrap pointer-events-none transition-all duration-500 ease-in-out px-3 py-1.5 left-[calc(100%_+_15px)] -top-5 group-[.open]:hidden group-hover/nav-link:opacity-100 group-hover/nav-link:pointer-events-auto group-hover/nav-link:-translate-y-2/4 group-hover/nav-link:top-2/4"
                        >Badge</span
                    >
                </li>
                <li
                    class="mx-0 my-2 fixed h-[60px] w-[78px] transition-all duration-[0.5s] ease-[ease] overflow-hidden px-3.5 py-2.5 left-0 -bottom-2 group-[.open]:w-[250px] group-[.open]:border-t group-[.open]:border-gray-300"
                >
                    <div class="flex items-center flex-nowrap">
                        <div>
                            <div class="text-sm whitespace-nowrap">
                                Akwan Cakra
                            </div>
                            <div class="text-xs whitespace-nowrap">
                                Administrator
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <i
                            class="material-symbols-outlined text-white bg-cyan-500 !text-xl h-[60px] min-w-[50px] text-center !leading-[60px] absolute -translate-y-2/4 w-full transition-all duration-500 ease-in-out right-0 top-2/4 group-[.open]:w-[50px] group-[.open]:bg-none hover:text-white"
                            id="log_out"
                            >logout</i
                        >
                    </a>
                </li>
            </ul>
        </div>

        <!-- BOTTOM BAR -->
        <div
            class="fixed bottom-0 border-t border-gray-300 grid grid-cols-4 w-full h-16 bg-white z-20 sm:hidden"
        >
            <a
                href="dashboard.html"
                class="flex flex-col justify-center items-center transition-colors duration-200 ease-in-out text-cyan-500 hover:text-cyan-500"
            >
                <span class="material-symbols-outlined filled"> home </span>
                <p class="text-xs">Home</p>
            </a>
            <a
                href="#"
                class="flex flex-col justify-center items-center transition-colors duration-200 ease-in-out hover:text-cyan-500"
            >
                <span class="material-symbols-outlined"> location_on </span>
                <p class="text-xs">Map</p>
            </a>
            <a
                href="#"
                class="flex flex-col justify-center items-center transition-colors duration-200 ease-in-out hover:text-cyan-500"
            >
                <span class="material-symbols-outlined"> account_box </span>
                <p class="text-xs">User</p>
            </a>
            <a
                href="#"
                class="flex flex-col justify-center items-center transition-colors duration-200 ease-in-out hover:text-cyan-500"
            >
                <span class="material-symbols-outlined"> local_police </span>
                <p class="text-xs">Badge</p>
            </a>
        </div>



<!-- FORM EDIT MAPS -->
    <section class="group" id="sideContent">
        <div class="relative min-h-screen left-0 w-full transition-all duration-500 ease-in-out z-0 top-0 p-4 sm:group-[.open]:w-[calc(100%-_-
    250px)] sm:group-[.open]:left-[250px] sm:left-[78px] sm:w-[calc(100%-_-
    78px)]">
            <section class="mx-auto max-w-7xl mb-4">
                <div class="header">
                    <div class="t-header">
                        <p>EDIT MAPS YANG SUDAH ADA</p>
                    </div>
                </div>

        @if (session('success'))
            <div class="container mx-auto px-4 py-8 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('fail'))
            <div class="container mx-auto px-4 py-8  bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('fail') }}</span>
            </div>
        @endif

                <br>

                <div class="container mx-auto px-4 py-8 rounded-lg mt-4 border border-gray-400" style="background-color: #ffffff; max-width: 1000px; padding: 20px;">
                    <h2 class="text-gray-800 text-center mb-4">Edit Maps/Questions</h2>
                    <form class="flex flex-col space-y-4" action="{{ route('maps.update', $map->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-col" style="margin-bottom:30px;">
                            <label for="difficulty" class="text-gray-600">Difficulty</label>
                            <select id="difficulty" name="difficulty" value="{{$map->difficulty}}" class="rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-500">
                                <option value="easy" {{ $map->difficulty == 'easy' ? 'selected' : '' }}>Easy</option>
                                <option value="normal" {{ $map->difficulty == 'normal' ? 'selected' : '' }}>Normal</option>
                                <option value="hard" {{ $map->difficulty == 'hard' ? 'selected' : '' }}>Hard</option>
                            </select>
                        </div>
                        <div class="flex flex-col " style="margin-bottom:30px;">
                            <label for="building" class="text-gray-600">Building</label>
                            <input type="text" id="building" name="building" value="{{ $map->building }}" class="rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-500" autocomplete="off">
                        </div>
                        <div class="flex flex-col" style="margin-bottom:30px;">
                            <label for="spotImage" class="text-gray-600">Titik Spot pada Map</label>
                            <input type="file" id="spotImage" name="spotImage" value="{{ $map->spotImage }}" class="rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-500" onchange="previewImage(this)">
                            <img id="preview" src="#" alt="Preview spotImage"  style="display: none; max-width: 70%; margin-top: 10px;">
                        </div>
                        <div class="flex flex-col" style="margin-bottom:30px;">
                            <label for="mapImage" class="text-gray-600">Gambar Asli</label>
                            <input type="file" id="mapImage" name="mapImage" value="{{ $map->mapImage }}" class="rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-500" onchange="previewImage(this)">
                            <img id="preview" src="#" alt="Preview mapImage" style="display: none; max-width: 70%; margin-top: 10px;">
                        </div>
                        <div class="flex flex-col" style="margin-bottom:30px;">
                            <label for="answerX" class="text-gray-600">Mark Jawaban (X Coordinate)</label>
                            <input type="text" id="answerX" name="answerX" value="{{ $map->answerX }}" class="rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-500" autocomplete="off">
                        </div>
                        <div class="flex flex-col" style="margin-bottom:30px;">
                            <label for="answerY" class="text-gray-600">Mark Jawaban (Y Coordinate)</label>
                            <input type="text" id="answerY" name="answerY" value="{{ $map->answerY }}" class="rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-500" autocomplete="off">
                        </div>

                        <div class="flex justify-end" style="margin-bottom:30px;">
                            <button type="button" onclick="resetForm()" class="text-black py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50" style="min-width: 100px;"><a href = "/daftar-maps">Cancel</button>
                            <button type="submit" name="submit" class="text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2" style="background-color: rgb(6 182 212); min-width: 100px;">Submit</button>
                            @error('submit')
                                    <span class="text-danger">{{$message}}</span>
                             @enderror
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </section>


        <script src="/public/js/sidebar.js"></script>
        <script>
            function previewImage(input) {
                var preview = document.getElementById('preview');
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        preview.style.display = 'block';
                        preview.src = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function resetForm() {
                document.getElementById("difficulty").selectedIndex = 0;
                document.getElementById("building").value = "";
                document.getElementById("gambar").value = "";
                document.getElementById("preview").src = "#";
                document.getElementById("answerX").value = "";
                document.getElementById("answerY").value = "";
            }
        </script>
    </body>
</html>

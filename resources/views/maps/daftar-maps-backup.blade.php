<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Maps</title>
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    <link rel="stylesheet" href="{{ asset('css/daftar-maps.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- SIDEBAR -->
    <div
        class="bg-white group sidebar fixed h-full w-[78px] z-10 transition-all duration-500 ease-in-out px-3.5 py-1.5 left-0 top-0 border border-r border-gray-300 [&.open]:w-[250px] hidden sm:block">
        <div class="h-[60px] flex justify-between items-center relative">
            <div>
                <p
                    class="text-2xl font-bold opacity-0 transition-all duration-75 ease-in-out group-[.open]:opacity-100">
                    CibiGuess
                </p>
            </div>
            <i class="material-symbols-outlined h-[60px] min-w-[50px] !leading-[60px] text-center absolute -translate-y-2/4 !text-xl transition-all duration-500 ease-in-out cursor-pointer right-0 top-2/4"
                id="btn">menu</i>
        </div>
        <!-- <p
                class="text-sm opacity-0 transition-all duration-75 ease-in-out hidden group-[.open]:opacity-100 group-[.open]:block"
            >
                Sistem Informasi Sign Language Augmented Reality
            </p> -->
        <ul class="h-full mt-5">
            <li class="group/nav-link relative mx-0 my-2">
                <a href="dashboard.html"
                    class="bg-cyan-500 text-white flex h-full w-full items-center no-underline transition-all duration-500 ease-in-out rounded-lg group-hover/nav-link:bg-cyan-500 group-hover/nav-link:text-white">
                    <i
                        class="material-symbols-outlined filled h-[50px] min-w-[47px] !text-xl text-center !leading-[50px]">window</i>
                    <span
                        class="whitespace-nowrap opacity-0 pointer-events-none text-sm group-[.open]:opacity-100 group-[.open]:pointer-events-auto">Dashboard</span>
                </a>
                <span
                    class="bg-white absolute z-10 shadow-lg rounded text-sm opacity-0 whitespace-nowrap pointer-events-none transition-all duration-500 ease-in-out px-3 py-1.5 left-[calc(100%_+_15px)] -top-5 group-[.open]:hidden group-hover/nav-link:opacity-100 group-hover/nav-link:pointer-events-auto group-hover/nav-link:-translate-y-2/4 group-hover/nav-link:top-2/4">Dashboard</span>
            </li>
            <li class="group/nav-link relative mx-0 my-2">
                <a href="#"
                    class="flex h-full w-full items-center no-underline transition-all duration-500 ease-in-out rounded-lg group-hover/nav-link:bg-cyan-500 group-hover/nav-link:text-white">
                    <i
                        class="material-symbols-outlined h-[50px] min-w-[47px] !text-xl text-center !leading-[50px]">location_on</i>
                    <span
                        class="whitespace-nowrap opacity-0 pointer-events-none text-sm group-[.open]:opacity-100 group-[.open]:pointer-events-auto">Map</span>
                </a>
                <span
                    class="bg-white absolute z-10 shadow-lg rounded text-sm opacity-0 whitespace-nowrap pointer-events-none transition-all duration-500 ease-in-out px-3 py-1.5 left-[calc(100%_+_15px)] -top-5 group-[.open]:hidden group-hover/nav-link:opacity-100 group-hover/nav-link:pointer-events-auto group-hover/nav-link:-translate-y-2/4 group-hover/nav-link:top-2/4">Map</span>
            </li>
            <li class="group/nav-link relative mx-0 my-2">
                <a href="#"
                    class="flex h-full w-full items-center no-underline transition-all duration-500 ease-in-out rounded-lg group-hover/nav-link:bg-cyan-500 group-hover/nav-link:text-white">
                    <i
                        class="material-symbols-outlined h-[50px] min-w-[47px] !text-xl text-center !leading-[50px]">account_box</i>
                    <span
                        class="whitespace-nowrap opacity-0 pointer-events-none text-sm group-[.open]:opacity-100 group-[.open]:pointer-events-auto">User</span>
                </a>
                <span
                    class="bg-white absolute z-10 shadow-lg rounded text-sm opacity-0 whitespace-nowrap pointer-events-none transition-all duration-500 ease-in-out px-3 py-1.5 left-[calc(100%_+_15px)] -top-5 group-[.open]:hidden group-hover/nav-link:opacity-100 group-hover/nav-link:pointer-events-auto group-hover/nav-link:-translate-y-2/4 group-hover/nav-link:top-2/4">User</span>
            </li>
            <li class="group/nav-link relative mx-0 my-2">
                <a href="#"
                    class="flex h-full w-full items-center no-underline transition-all duration-500 ease-in-out rounded-lg group-hover/nav-link:bg-cyan-500 group-hover/nav-link:text-white">
                    <i
                        class="material-symbols-outlined h-[50px] min-w-[47px] !text-xl text-center !leading-[50px]">local_police</i>
                    <span
                        class="whitespace-nowrap opacity-0 pointer-events-none text-sm group-[.open]:opacity-100 group-[.open]:pointer-events-auto">Badge</span>
                </a>
                <span
                    class="bg-white absolute z-10 shadow-lg rounded text-sm opacity-0 whitespace-nowrap pointer-events-none transition-all duration-500 ease-in-out px-3 py-1.5 left-[calc(100%_+_15px)] -top-5 group-[.open]:hidden group-hover/nav-link:opacity-100 group-hover/nav-link:pointer-events-auto group-hover/nav-link:-translate-y-2/4 group-hover/nav-link:top-2/4">Badge</span>
            </li>
            <li
                class="mx-0 my-2 fixed h-[60px] w-[78px] transition-all duration-[0.5s] ease-[ease] overflow-hidden px-3.5 py-2.5 left-0 -bottom-2 group-[.open]:w-[250px] group-[.open]:border-t group-[.open]:border-gray-300">
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
                    <i class="material-symbols-outlined text-white bg-cyan-500 !text-xl h-[60px] min-w-[50px] text-center !leading-[60px] absolute -translate-y-2/4 w-full transition-all duration-500 ease-in-out right-0 top-2/4 group-[.open]:w-[50px] group-[.open]:bg-none hover:text-white"
                        id="log_out">logout</i>
                </a>
            </li>
        </ul>
    </div>

    <!-- BOTTOM BAR -->
    <div class="fixed bottom-0 border-t border-gray-300 grid grid-cols-4 w-full h-16 bg-white z-20 sm:hidden">
        <a href="dashboard.html"
            class="flex flex-col justify-center items-center transition-colors duration-200 ease-in-out text-cyan-500 hover:text-cyan-500">
            <span class="material-symbols-outlined filled"> home </span>
            <p class="text-xs">Home</p>
        </a>
        <a href="#"
            class="flex flex-col justify-center items-center transition-colors duration-200 ease-in-out hover:text-cyan-500">
            <span class="material-symbols-outlined"> location_on </span>
            <p class="text-xs">Map</p>
        </a>
        <a href="#"
            class="flex flex-col justify-center items-center transition-colors duration-200 ease-in-out hover:text-cyan-500">
            <span class="material-symbols-outlined"> account_box </span>
            <p class="text-xs">User</p>
        </a>
        <a href="#"
            class="flex flex-col justify-center items-center transition-colors duration-200 ease-in-out hover:text-cyan-500">
            <span class="material-symbols-outlined"> local_police </span>
            <p class="text-xs">Badge</p>
        </a>
    </div>

    <!-- DAFTAR MAPS -->
    <section class="group" id="sideContent">
        <div
            class="relative min-h-screen left-0 w-full transition-all duration-500 ease-in-out z-0 top-0 p-4 sm:group-[.open]:w-[calc(100%_-_250px)] sm:group-[.open]:left-[250px] sm:left-[78px] sm:w-[calc(100%_-_78px)]">
            <div class="container mx-auto px-4 py-4 rounded-lg" style="background-color: #b6b4b4; height: 100px;">
                <p class="text-white" style="margin-left: 10px;">DAFTAR MAPS</p>
                <button class="px-2 bg-blue-500 text-white rounded-r-lg border"
                    style="background-color: rgb(6 182 212); margin-left: 10px;">
                    <a href="{{ route('add-maps') }}">TAMBAH MAPS</a>
                </button>
            </div>

            @if (session('success'))
                <div class="container mx-auto px-4 py-8 bg-green-100 border border-green-400 text-green-700 px-4 rounded relative"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('fail'))
                <div class="container mx-auto px-4 py-8  bg-red-100 border border-red-400 text-red-700 px-4 rounded relative"
                    role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('fail') }}</span>
                </div>
            @endif

            <div class="container mx-auto px-4 rounded-lg mt-4"
                style="background-color: #ffffff; height: 700px; border: 1px solid #acacac;">
                <!-- Search Bar -->
                <div class="flex justify-end px-5 py-4 mt-4">
                    <input type="text" placeholder="Search..."
                        class="p-2 rounded-l-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button class="p-2 bg-blue-500 text-white rounded-r-lg border"
                        style="background-color: rgb(6 182 212)">
                        <i class="fas fa-magnifying-glass text-blue-500"></i>
                    </button>
                </div>

                <div class="table-container" style="max-width: 100%; overflow-x: auto;">
                    <table class="w-full border border-slate-600">
                        <thead>
                            <tr>
                                <td class="p-4 font-bold">Image Asli</td>
                                <td class="p-4 font-bold">Spot Map</td>
                                <td class="p-4 font-bold">Difficulty</td>
                                <td class="p-4 font-bold">Building</td>
                                <td class="p-4 font-bold">AnswerX</td>
                                <td class="p-4 font-bold">AnswerY</td>
                                <td class="p-4 font-bold">Actions</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($maps as $map)
                                <tr>
                                    <td class="p-4 align-top"><img src="{{ asset('images/' . $map->mapImage) }}"
                                            alt="{{ $map->mapImage }}" style="max-width: 100px;"></td>
                                    <td class="p-4 align-top"><img src="{{ asset('images/' . $map->spotImage) }}"
                                            alt="{{ $map->spotImage }}" style="max-width: 100px;"></td>
                                    <td class="p-4 align-top">{{ $map->difficulty }}</td>
                                    <td class="p-4 align-top">{{ $map->building }}</td>
                                    <td class="p-4 align-top">{{ $map->answerX }}</td>
                                    <td class="p-4 align-top">{{ $map->answerY }}</td>
                                    <td class="p-4 align-top">
                                        @csrf
                                        @method('PUT')
                                        <button class="p-2 bg-blue-500 text-white rounded-r-lg border"
                                            style="background-color: rgb(6 182 212)">
                                            <a href="{{ route('edit-maps', $map->id) }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </button>
                                        <form action="{{ route('maps.destroy', $map->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 bg-red-500 text-white rounded-r-lg border"
                                                style="background-color: rgb(220 38 38)"
                                                onclick="return confirm('Are you sure you want to delete this map?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="flex justify-center mt-4 mb-4">
                    <div class="join">
                        <a href="javascript:void(0)" class="join-item btn btn-active" onclick="goToSlide(1)">1</a>
                        <a href="javascript:void(0)" class="join-item btn" onclick="goToSlide(2)">2</a>
                        <a href="javascript:void(0)" class="join-item btn" onclick="goToSlide(3)">3</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- MARGIN FOR BOTTOM NAVIGATION -->
    <div class="h-10 w-full sm:hidden"></div>


    <script>
        let originalTableContent = null;

        function goToSlide(slideNumber) {
            // Mengambil referensi ke tabel
            var table = document.querySelector('.w-full.border.border-slate-600');

            // Jika slideNumber adalah 2 atau 3, kosongkan konten tabel
            if (slideNumber === 2 || slideNumber === 3) {
                // Menyimpan konten tabel asli jika belum disimpan sebelumnya
                if (!originalTableContent) {
                    originalTableContent = table.innerHTML;
                }
                table.innerHTML = ''; // Mengosongkan konten tabel
            } else {
                // Mengembalikan konten tabel asli jika ada
                if (originalTableContent) {
                    table.innerHTML = originalTableContent;
                }
                // Implementasi navigasi ke slide 1
                console.log('Navigating to slide:', slideNumber);
            }
        }
    </script>
    <script src="{{ 'js/sidebar.js' }}"></script>
</body>

</html>

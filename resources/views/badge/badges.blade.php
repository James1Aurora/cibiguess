@extends('layouts.admin')

@section('title', 'Badges List | CibiGuess')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    <link rel="stylesheet" href="{{ asset('css/badges.css') }}">
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
@endsection

@section('content')
    <!-- DAFTAR BADGES -->
    <section class="group" id="sideContent">
        <div class="relative min-h-screen left-0 w-full transition-all duration-500 ease-in-out z-0 top-0 p-4 sm:group-[.open]:w-[calc(100%_-_250px)] sm:group-[.open]:left-[250px] sm:left-[78px] sm:w-[calc(100%_-_78px)]">
            <div class="container mx-auto px-4 py-4 rounded-lg" style="background-color: #b6b4b4; height: 100px;">
                <p class="text-black" style="margin-left: 10px; font-weight: bold;">DAFTAR BADGES</p>
                <button class="px-2 bg-blue-500 text-white rounded-r-lg border" style="background-color: rgb(6 182 212); margin-left: 10px;">
                    <a href="{{ route('add-badge') }}">TAMBAH BADGE</a>
                </button>
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

            <div class="container mx-auto px-4 rounded-lg mt-4" style="background-color: #ffffff; height: 700px; border: 1px solid #acacac;">
                <!-- Search Bar -->
                <form action="{{ route('badges') }}" method="GET" class="flex justify-end px-5 py-4 mt-4">
                    <div class="flex">
                        <div>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="p-2 rounded-l-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>                    
                            <button class="p-2 bg-blue-500 text-white rounded-r-lg border" style="background-color: rgb(6 182 212)">
                                <i class="fas fa-magnifying-glass text-blue-500"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="table-container" style="max-width: 100%; overflow-x: auto;">
                    <table class="w-full border border-slate-600">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="p-4 font-bold">Title</th>
                                <th class="p-4 font-bold">Description</th>
                                <th class="p-4 font-bold">Image</th>
                                <th class="p-4 font-bold">Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($badges as $badge)
                                <tr>
                                    <th class="p-4 align-top">{{ $loop->iteration }}</th>
                                    <td class="p-4 align-top">{{ $badge->title }}</td>
                                    <td class="p-4 align-top">{{ $badge->description }}</td>
                                    <td class="p-4 align-top">
                                        <img src="{{ asset('storage/badges/' . $badge->image) }}" 
                                            class="border border-gray-300 rounded-lg w-20 h-20 object-cover object-center" style="max-width: 100px;" />
                                    </td>
                                    <td>
                                        @csrf
                                        @method('PUT')
                                        <button class="p-2 bg-blue-500 text-white rounded-r-lg border" style="background-color: rgb(6 182 212)">
                                            <a href="{{ route('edit-badge', $badge->id) }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </button>
                                            <form action="{{ route('badge.destroy', $badge->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 bg-red-500 text-white rounded-r-lg border" style="background-color: rgb(220 38 38)" onclick="return confirm('Are you sure you want to delete this badge?')">
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
@endsection

<!-- MARGIN FOR BOTTOM NAVIGATION -->
{{-- <div class="h-10 w-full sm:hidden"></div> --}}

@section('scripts')
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
        {{-- <script src="{{ ('js/sidebar.js') }}"></script> --}}
@endsection


@extends('layouts.admin')

@section('title', 'Question List | CibiGuess')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/daftar-maps.css') }}">
@endsection

@section('content')
    <!-- DAFTAR MAPS -->
    <section class="group" id="sideContent">
        <div
            class="relative min-h-screen left-0 w-full transition-all duration-500 ease-in-out z-0 top-0 p-4 sm:group-[.open]:w-[calc(100%_-_250px)] sm:group-[.open]:left-[250px] sm:left-[78px] sm:w-[calc(100%_-_78px)]">
            <div class="container mx-auto px-4 py-4 rounded-lg bg-cyan-600">
                <p class="text-black" style="margin-left: 10px; font-weight: bold;">QUESTION LIST</p>
                <button class="bg-blue-500 text-white rounded-r-lg border !m-0" style="background-color: rgb(6 182 212);"
                    onclick="checkMapsBeforeAdding()">
                    Add Question
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

            <div class="container mx-auto px-4 rounded-lg mt-4 bg-white border border-gray-300">
                <!-- Search Bar -->
                <div class="flex justify-end px-5 py-4 mt-4">
                    <input type="text" placeholder="Search..."
                        class="p-2 rounded-l-lg border border-gray-300 focus:outline-none h-10 focus:ring-2 focus:ring-blue-500">
                    <button class="p-2 bg-blue-500 text-white rounded-r-lg border h-10 flex justify-center items-center"
                        style="background-color: rgb(6 182 212)">
                        <span class="material-symbols-outlined !leading-none !text-xl">
                            search
                        </span>
                    </button>
                </div>

                <div class="table-container" style="max-width: 100%; overflow-x: auto;">
                    <table class="w-full border border-slate-600">
                        <thead>
                            <tr>
                                <td class="p-4 font-bold">Mini Map</td>
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
                                    <td class="p-4 align-top"><img
                                            src="{{ asset('storage/minimaps/' . $map->miniMap->image) }}"
                                            alt="{{ $map->mapImage }}" style="max-width: 100px;"></td>
                                    <td class="p-4 align-top"><img src="{{ asset('storage/maps/' . $map->spotImage) }}"
                                            alt="{{ $map->spotImage }}" style="max-width: 100px;"></td>
                                    <td class="p-4 align-top">{{ $map->difficulty }}</td>
                                    <td class="p-4 align-top">{{ $map->miniMap->building }}</td>
                                    <td class="p-4 align-top">{{ $map->answerX }}</td>
                                    <td class="p-4 align-top">{{ $map->answerY }}</td>
                                    <td class="p-4 align-top">
                                        @csrf
                                        @method('PUT')
                                        <button class="p-2 bg-blue-500 text-white rounded-r-lg border"
                                            style="background-color: rgb(6 182 212)">
                                            <a href="{{ route('edit-maps', $map->id) }}">
                                                <span class="material-symbols-outlined !leading-none !text-xl">
                                                    edit
                                                </span>
                                            </a>
                                        </button>
                                        <form action="{{ route('maps.destroy', $map->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 bg-red-500 text-white rounded-r-lg border"
                                                style="background-color: rgb(220 38 38)"
                                                onclick="return confirm('Are you sure you want to delete this map?')">
                                                <span class="material-symbols-outlined !leading-none !text-xl">
                                                    delete
                                                </span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="mt-4 flex justify-center">
                    {{ $maps->links('vendor.pagination.custom') }}
                </div>
                {{-- <div class="flex justify-center mt-4 mb-4">
                    <div class="join">
                        <a href="javascript:void(0)" class="join-item btn btn-active" onclick="goToSlide(1)">1</a>
                        <a href="javascript:void(0)" class="join-item btn" onclick="goToSlide(2)">2</a>
                        <a href="javascript:void(0)" class="join-item btn" onclick="goToSlide(3)">3</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection

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

        function checkMapsBeforeAdding() {
            var miniMapCount = {{ $miniMapCount }};
            if (miniMapCount === 0) {
                alert('Anda Belum memiliki minimaps');
            } else {
                window.location.href = "{{ route('add-maps') }}";
            }
        }
    </script>
@endsection

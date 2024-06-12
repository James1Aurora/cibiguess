@extends('layouts.admin')

@section('title', 'Add Badge | CibiGuess')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addBadge.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
@endsection

@section('content')
    <section class="group" id="sideContent">
        <div
            class="relative min-h-screen left-0 w-full transition-all duration-500 ease-in-out z-0 top-0 p-4 sm:group-[.open]:w-[calc(100%_-_250px)] sm:group-[.open]:left-[250px] sm:left-[78px] sm:w-[calc(100%_-_78px)]">
            <div class="container mx-auto px-4 py-4 h-64 rounded-lg" style="background-color: #b6b4b4; height: 100px;">
                <p class="text-black" style="margin-left: 10px; font-weight: bold;">TAMBAH BADGE</p>
                <button class="px-2 bg-blue-500 text-white rounded-r-lg border"
                    style="background-color: rgb(6 182 212); margin-left: 10px;">
                    <a href="{{ route('badges') }}">DAFTAR BADGE</a>
                </button>
            </div>

            @if (session('success'))
                <div class="container mx-auto px-4 py-8 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('fail'))
                <div class="container mx-auto px-4 py-8  bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('fail') }}</span>
                </div>
            @endif

            <br>

            <div class="container mx-auto px-4 py-8 rounded-lg mt-4 border border-gray-400"
                style="background-color: #ffffff; max-width: 1000px; padding: 20px;">
                <h2 class="text-gray-800 text-center mb-4">Menambahkan Badge</h2>

                <form class="flex flex-col space-y-4" method="POST" action="{{ route('badge.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="badgeId" name="badgeId">
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Title</span>
                        </div>
                        <input type="text" id="title" name="title" placeholder="Type here"
                            class="input input-bordered w-full" />
                    </label>
                    @error('title')
                        <div class="mb-1">
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        </div>
                    @enderror
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Criteria</span>
                        </div>
                        <select class="select select-bordered" name="criteria" id="criteria">
                            <option disabled selected>Pilih salah satu</option>
                            <option value="score" @if (old('criteria') == 'score') selected @endif>Score</option>
                            <option value="completed_maps" @if (old('criteria') == 'completed_maps') selected @endif>Completed Maps
                            </option>
                            <option value="difficulty" @if (old('criteria') == 'difficulty') selected @endif>Difficulty</option>
                            <option value="location" @if (old('criteria') == 'location') selected @endif">Location</option>
                        </select>
                    </label>
                    @error('criteria')
                        <div class="mb-1">
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        </div>
                    @enderror
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Threshold</span>
                        </div>
                        <input type="text" id="threshold" name="threshold" placeholder="Angka atau karakter..."
                            class="input input-bordered w-full" />
                    </label>
                    @error('threshold')
                        <div class="mb-1">
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="flex flex-col " style="margin-bottom:30px;">
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Description</span>
                            </div>
                            <textarea class="textarea textarea-bordered h-24 w-full  " placeholder="Enter Description Here" id="description"
                                name="description"></textarea>
                        </label>
                    </div>
                    @error('description')
                        <div class="mb-1">
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="flex flex-col" style="margin-bottom:30px;">
                        <label for="badgeImage" class="text-gray-600">Gambar Badge</label>
                        <input type="file" id="badgeImage" name="image"
                            class="rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-500"
                            onchange="previewImage(this)">
                        <img id="preview" src="#" alt="Preview badgeImage"
                            style="display: none; max-width: 70%; margin-top: 10px;">
                    </div>
                    </label>
                    @error('image')
                        <div class="mb-1">
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        </div>
                    @enderror

                    <div class="flex justify-end" style="margin-bottom:30px;">
                        <button type="button" onclick="resetForm()"
                            class="text-black py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                            style="min-width: 100px;">Cancel</button>
                        <button type="submit" name="submit"
                            class="text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2"
                            style="background-color: rgb(6 182 212); min-width: 100px;">Submit</button>
                    </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script src="{{ 'js/sidebar.js' }}"></script>
    <script>
        function previewImage(input) {
            var preview = document.getElementById('preview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.style.display = 'block';
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function resetForm() {
            document.getElementById("title").value = "";
            document.getElementById("description").value = "";
            document.getElementById("badgeImage").value = "";
        }
    </script>
@endsection

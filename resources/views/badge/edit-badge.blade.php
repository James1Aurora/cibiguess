
@extends('layouts.admin')

@section('title', 'Home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addBadge.css') }}">
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
@endsection

@section('content')

<section class="group" id="sideContent">
    <div class="relative min-h-screen left-0 w-full transition-all duration-500 ease-in-out z-0 top-0 p-4 sm:group-[.open]:w-[calc(100%-_-
        250px)] sm:group-[.open]:left-[250px] sm:left-[78px] sm:w-[calc(100%-_-
        78px)]">
        <section class="mx-auto max-w-7xl mb-4">
            <div class="header">
                <div class="t-header">
                    <p>EDIT BADGES</p>
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
                <h2 class="text-gray-800 text-center mb-4">Edit Badge</h2>
                <form class="flex flex-col space-y-4" action="{{ route('badge.update', $badge->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Ubah menjadi metode PUT -->
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Title</span>
                        </div>
                        <input type="text" id="titleEdit" name="title" value="{{ $badge->title }}" placeholder="Type here"
                            class="input input-bordered w-full" />
                    </label>
                    @error('title')
                        <div class="mb-1">
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        </div>
                    @enderror
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Description</span>
                        </div>
                        <textarea class="textarea textarea-bordered h-24 w-full" placeholder="Descriptions..." id="descriptionEdit" name="description">{{ $badge->description }}</textarea> <!-- Perbaiki penempatan nilai textarea -->
                    </label>
                    @error('description')
                        <div class="mb-1">
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="flex flex-col" style="margin-bottom:30px;">
                        <label for="image" class="text-gray-600">Gambar Badge</label>
                        <input type="file" id="image" name="image" class="rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-500" onchange="previewImage(this)">
                        <img id="preview" src="{{ asset('storage/badges/' . $badge->image) }}" alt="Preview badgeImage" style="display: block; max-width: 70%; margin-top: 10px;"> <!-- Pastikan gambar sebelumnya ditampilkan -->
                    </div>
                    @error('image')
                        <div class="mb-1">
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        </div>
                    @enderror

                    <div class="flex justify-end" style="margin-bottom:30px;">
                        <button type="button" onclick="resetForm()" class="text-black py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50" style="min-width: 100px;"><a href="{{ route('badges') }}">Cancel</button>
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

@endsection

@section('scripts')

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
                document.getElementById("title").value = "";
                document.getElementById("description").value = "";
                document.getElementById("badgeImage").value = "";
            }
        </script>
@endsection

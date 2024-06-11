@extends('layouts.admin')

@section('title', 'Home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/add-maps.css') }}">
@endsection

@section('content')
    <div class="bg-cyan-500 p-3 rounded-lg mb-5">
        <p class="text-white mb-3 font-semibold tracking-tight text-xl">Edit Map</p>
        <a class="btn bg-white px-3 py-2 w-fit flex justify-center items-center transition-colors duration-200 ease-in-out cursor-pointer pointer-events-auto text-sm h-fit min-h-fit hover:bg-cyan-600"
            href="{{ route('daftar-maps') }}">
            <span class="material-symbols-outlined !text-xl !leading-none">
                arrow_back
            </span>
            Kembali
        </a>
    </div>

    @if (session('success'))
        <div class="container mx-auto px-4 mb-2 bg-green-100 border border-green-400 text-green-700 py-3 rounded relative"
            role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('fail'))
        <div class="container mx-auto mb-2  bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
            role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('fail') }}</span>
        </div>
    @endif

    <div class="container mx-auto px-4 py-8 rounded-lg mt-4 border border-gray-400"
        style="background-color: #ffffff; max-width: 1000px; padding: 20px;">
        <h2 class="text-gray-800 text-center mb-4">Edit Maps/Questions</h2>
        <form class="flex flex-col space-y-4" action="{{ route('maps.update', $map->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="answerX" id="answerX" value="{{ $map->answerX }}">
            <input type="hidden" name="answerY" id="answerY" value="{{ $map->answerY }}">

            <div class="flex flex-col" style="margin-bottom:30px;">
                <label for="difficulty" class="text-gray-600">Difficulty</label>
                <select id="difficulty" name="difficulty" value="{{ $map->difficulty }}"
                    class="rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-500">
                    <option value="easy" {{ $map->difficulty == 'easy' ? 'selected' : '' }}>Easy</option>
                    <option value="normal" {{ $map->difficulty == 'normal' ? 'selected' : '' }}>Normal
                    </option>
                    <option value="hard" {{ $map->difficulty == 'hard' ? 'selected' : '' }}>Hard</option>
                </select>
            </div>
            @error('difficulty')
                <div class="mb-1">
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                </div>
            @enderror

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Unggah map/lokasi</span>
                </div>
                <input type="file" class="file-input file-input-bordered w-full" id="spotImage" name="spotImage"
                    onchange="previewImage(this)" />
            </label>
            @error('spotImage')
                <div class="mb-1">
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                </div>
            @enderror

            <div class="rounded-lg w-fit border border-gray-300 relative mb-3">
                <img id="preview" src="{{ asset('images/maps/' . $map->spotImage) }}" alt="spot map" draggable="false"
                    class="max-w-[350px] max-h-[250px] object-cover object-center" />
            </div>

            <select class="select select-bordered" name="building" id="building" onchange="getMiniMap(this)">
                <option disabled selected>Pilih salah satu</option>
                @foreach ($miniMaps as $miniMap)
                    <option value="{{ $miniMap->id }}" data-building="{{ $miniMap->image }}"
                        data-building-id="{{ $miniMap->buildingId }}" @if ($miniMap->id == $map->buildingId) selected @endif>
                        {{ $miniMap->building }}</option>
                @endforeach
            </select>
            @error('building')
                <div class="mb-1">
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                </div>
            @enderror

            <div class="rounded-lg bg-gray-700 max-w-[350px] max-h-[250px] relative" id="map-wrapper">
                <img id="map-spot" src="{{ asset('images/maps/' . $map->miniMap->image) }}" alt="spot map"
                    draggable="false" />
            </div>

            <div class="flex justify-end" style="margin-bottom:30px;">
            <a href="{{ route('maps') }}" class="btn btn-outline px-3 py-2 h-fit min-h-fit text-sm me-1">Cancel</a> 
            <button type="submit" class="btn btn-primary px-3 py-2 h-fit min-h-fit text-sm">
                Submit <span class="material-symbols-outlined filled !text-xl !leading-none">
                    save
                </span>
                @error('submit')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        let mapSpot;

        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi elemen map dan marker
            mapSpot = document.getElementById('map-spot');
            const originalMapWidth = 350;
            const originalMapHeight = 250;
            let marker = null;
            let answerX, answerY;

            // Fungsi untuk menempatkan marker pada posisi awal
            function placeInitialMarker() {
                // Ambil koordinat awal dari Blade variable
                const initialX = {{ $map->answerX }};
                const initialY = {{ $map->answerY }};

                // Buat elemen marker baru
                marker = document.createElement("div");
                marker.classList.add(
                    "absolute",
                    "h-3",
                    "w-3",
                    "bg-red-500",
                    "rounded-full",
                    "transform",
                    "-translate-x-1/2",
                    "-translate-y-1/2"
                );

                // Atur posisi marker sesuai dengan koordinat awal
                marker.style.left = `${initialX}px`;
                marker.style.top = `${initialY}px`;

                // Tambahkan marker ke dalam gambar peta
                mapSpot.parentNode.appendChild(marker);
            }

            // Tempatkan marker pada posisi awal saat halaman dimuat
            placeInitialMarker();

            // Fungsi untuk menangani klik pada gambar peta
            mapSpot.addEventListener("click", function(event) {
                // Mengambil koordinat klik
                answerX = event.offsetX;
                answerY = event.offsetY;

                // Hapus marker yang sudah ada jika ada
                if (marker !== null) {
                    marker.remove();
                }

                // Buat elemen marker baru
                marker = document.createElement("div");
                marker.classList.add(
                    "absolute",
                    "h-3",
                    "w-3",
                    "bg-red-500",
                    "rounded-full",
                    "transform",
                    "-translate-x-1/2",
                    "-translate-y-1/2"
                );

                // Atur posisi marker sesuai dengan koordinat klik
                marker.style.left = `${answerX}px`;
                marker.style.top = `${answerY}px`;

                // Tambahkan marker ke dalam gambar peta
                mapSpot.parentNode.appendChild(marker);

                // Ukuran gambar map setelah resize
                const mapWidth = mapSpot.clientWidth;
                const mapHeight = mapSpot.clientHeight;

                // Skala untuk normalisasi koordinat
                const scaleX = originalMapWidth / mapWidth;
                const scaleY = originalMapHeight / mapHeight;

                // Koordinat jawaban setelah normalisasi ke gambar map yang baru
                const finalAnswerX = answerX * scaleX;
                const finalAnswerY = answerY * scaleY;

                // Set nilai input hidden dengan koordinat yang sudah dinormalisasi
                document.getElementById("answerX").value = finalAnswerX;
                document.getElementById("answerY").value = finalAnswerY;
            });
        });

        window.addEventListener('DOMContentLoaded', function() {
            if (!mapSpot.getAttribute('src') || mapSpot.getAttribute('src') === '#') {
                mapSpot.style.display = 'none';
            } else {
                mapSpot.style.display = 'block';
            }
        });

        function getMiniMap(selectElement) {
            if (selectElement) {
                var selectedOption = selectElement.options[selectElement
                    .selectedIndex]; // Mengambil elemen option yang dipilih
                var filename = selectedOption.getAttribute('data-building');

                if (filename) {
                    mapSpot.src = "{{ asset('images/maps') }}" + "/" + filename;
                    mapSpot.style.display = 'block';
                } else {
                    mapSpot.style.display = 'none';
                }
            } else {
                mapSpot.style.display = 'none';
            }
        }

        function previewImage(input) {
            var file = input.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var preview = document.getElementById('preview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                document.getElementById('preview').style.display = 'none';
            }
        }

        function resetForm() {
            document.getElementById("difficulty").selectedIndex = 0;
            document.getElementById("building").value = "";
            document.getElementById("spotImage").value = "";
            document.getElementById("preview").src = "#";
            document.getElementById("answerX").value = "";
            document.getElementById("answerY").value = "";
        }
    </script>
@endsection

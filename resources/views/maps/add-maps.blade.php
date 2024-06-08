@extends('layouts.admin')

@section('title', 'Home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/add-maps.css') }}">
@endsection

@section('content')
    <div class="bg-cyan-500 p-3 rounded-lg mb-5">
        <p class="text-white mb-3 font-semibold tracking-tight text-xl">Tambah Map</p>
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
        <h2 class="text-gray-800 text-center mb-4">Tambah Map</h2>
        <form class="flex flex-col space-y-4" action="{{ route('maps.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="answerX" id="answerX" value="0">
            <input type="hidden" name="answerY" id="answerY" value="0">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Difficulty</span>
                </div>
                <select class="select select-bordered" name="difficulty" id="difficulty">
                    <option disabled selected>Pilih salah satu</option>
                    <option>Easy</option>
                    <option>Medium</option>
                    <option>Hard</option>
                </select>
            </label>
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
                <img id="preview" src="#" alt="spot map" draggable="false"
                    class="max-w-[350px] max-h-[250px] object-cover object-center" style="display: none;" />
            </div>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Mini Map</span>
                </div>
                <select class="select select-bordered" name="building" id="building"
                    onchange="getMiniMap(this.options[this.selectedIndex].getAttribute('data-building'))">
                    <option disabled selected>Pilih salah satu</option>
                    @foreach ($miniMaps as $map)
                        <option value="{{ $map->id }}" data-building="{{ $map->image }}">{{ $map->building }}
                        </option>
                    @endforeach
                </select>
            </label>
            @error('building')
                <div class="mb-1">
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                </div>
            @enderror

            <div class="rounded-lg bg-gray-700 max-w-[350px] max-h-[250px] relative" id="map-wrapper">
                <img id="map-spot" src="#" alt="spot map" draggable="false" style="display: none;" />
            </div>

            <div class="flex justify-end" style="margin-bottom:30px;">
                <button type="button" onclick="resetForm()" class="btn btn-ghost">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ 'js/sidebar.js' }}"></script>
    <script>
        const mapSpot = document.getElementById('map-spot');
        const originalMapWidth = 350;
        const originalMapHeight = 250;
        let marker = null;
        let answerX, answerY;

        mapSpot.addEventListener("click", function(event) {
            // Mengambil koordinat klik
            answerX = event.offsetX;
            answerY = event.offsetY;

            // Hapus mark titik yang sudah ada jika ada
            if (marker !== null) {
                marker.remove();
            }

            // Buat elemen mark titik baru
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

            // Atur posisi mark titik sesuai dengan koordinat klik
            marker.style.left = `${answerX}px`;
            marker.style.top = `${answerY}px`;

            // Tambahkan mark titik ke dalam gambar peta
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

            document.getElementById("answerX").value = finalAnswerX;
            document.getElementById("answerY").value = finalAnswerY;
        });

        window.addEventListener('DOMContentLoaded', function() {
            if (!mapSpot.getAttribute('src') || mapSpot.getAttribute('src') === '#') {
                mapSpot.style.display = 'none';
            } else {
                mapSpot.style.display = 'block';
            }
        });

        function getMiniMap(filename) {
            if (filename) {
                mapSpot.src = "{{ asset('images/maps') }}" + "/" + filename;
                mapSpot.style.display = 'block';
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

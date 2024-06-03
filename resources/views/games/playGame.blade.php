@extends('layouts.clear')

@section('title', 'Play Game | CibiGuess')

@section('content')
    <section class="w-screen h-screen overflow-hidden flex justify-center items-center">
        <div class="bg-cover bg-center w-full h-full p-4"
            style="background-image: url('{{ asset('images/maps/' . $question['spotImage']) }}')">
            <div class="flex flex-col justify-between h-full">
                <div class="flex justify-between items-center gap-2">
                    <a href="{{ route('game.menu') }}"
                        class="inline-flex justify-center items-center text-white border border-gray-500 bg-gray-800/50 hover:bg-gray-950/60 focus:ring-4 focus:ring-gray-600 font-medium rounded-md text-sm h-12 w-12 focus:outline-none transition ease-in-out duration-75">
                        <span class="material-symbols-outlined m-0 !text-xl">
                            home
                        </span>
                    </a>

                    <button type="button"
                        class="inline-block text-white border border-gray-500 bg-gray-800/50 hover:bg-gray-950/60 focus:ring-4 focus:ring-gray-600 font-medium rounded-md text-sm h-12 w-12 focus:outline-none transition ease-in-out duration-75"
                        onclick="showModal()">
                        <span class="material-symbols-outlined m-0 !text-xl">
                            help
                        </span>
                    </button>
                </div>

                <div class="flex justify-end items-center gap-2">
                    <button type="button"
                        class="inline-flex items-center gap-2 text-white border border-gray-500 bg-gray-800/50 hover:bg-gray-950/60 focus:ring-4 focus:ring-gray-600 font-medium rounded-md text-sm px-5 py-2.5 focus:outline-none transition ease-in-out duration-75"
                        onclick="showModalMap()">
                        Show map
                        <span class="material-symbols-outlined m-0 !text-lg">
                            map
                        </span>
                    </button>

                    {{-- <a href="{{ route('game.result') }}"
                        class="inline-flex items-center gap-2 text-white border border-gray-500 bg-gray-800/50 hover:bg-gray-950/60 focus:ring-4 focus:ring-gray-600 font-medium rounded-md text-sm px-5 py-2.5 focus:outline-none transition ease-in-out duration-75">
                        Skip
                        <span class="material-symbols-outlined m-0 !text-lg">
                            navigate_next
                        </span>
                    </a> --}}
                </div>
            </div>
        </div>
    </section>

    <!-- MODAL HELP -->
    <div id="modal-help" class="fixed inset-0 z-10 hidden opacity-0 items-center justify-center overflow-y-auto"
        aria-labelledby="modal-title" role="dialog" aria-modal="false">
        <!-- Background backdrop -->
        <div id="backdrop-modal-help" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity"></div>

        <!-- Modal panel -->
        <div class="relative bg-white rounded-lg shadow-xl max-w-md w-full p-4 sm:p-6">
            <div>
                <!-- Content -->
                <div class="flex h-12 w-12 mb-2 flex-shrink-0 items-center justify-center rounded-full bg-cyan-100">
                    <span class="material-symbols-outlined text-cyan-700">help</span>
                </div>

                <h3 class="font-semibold tracking-tight text-lg text-gray-900" id="modal-title">
                    How to play
                </h3>
                <div class="mt-2 text-sm text-gray-500">
                    <p>
                        Guess the location based on the provided image.
                    </p>
                </div>
            </div>

            <!-- Button -->
            <div class="mt-4 flex justify-end">
                <button id="close-modal-help" type="button"
                    class="inline-flex justify-center items-center px-3 py-2 text-sm font-semibold text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                    onclick="hideModal()">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL MAP -->
    <div id="modal-map" class="fixed inset-0 z-10 hidden opacity-0 items-center justify-center overflow-y-auto"
        aria-labelledby="modal-title" role="dialog" aria-modal="false">
        <!-- Background backdrop -->
        <div id="backdrop-modal-map" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity"></div>

        <!-- Modal panel -->
        <div class="relative bg-transparent rounded-lg max-w-md w-fit p-4 sm:p-6">
            <div class="rounded-lg max-w-[350px] max-h-[250px] relative" id="map-wrapper">
                <img id="map-spot" src="{{ asset('images/maps/' . $question['mapImage']) }}" alt="spot map"
                    draggable="false" />
            </div>

            <!-- Button -->
            <div class="mt-4 grid grid-cols-2 gap-2">
                <button id="close-modal-help" type="button"
                    class="inline-block bg-white w-full hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 transition ease-in-out duration-100"
                    onclick="hideModalMap()">
                    Close
                </button>
                <button type="button"
                    class="inline-block text-white w-full bg-cyan-400 hover:bg-cyan-500 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 transition ease-in-out duration-100"
                    onclick="submitMap({{ $question['id'] }})">
                    Submit
                </button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script>
        const modal = document.getElementById("modal-help");
        const backdrop = document.getElementById("backdrop-modal-help");

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
    <script>
        const modalmap = document.getElementById("modal-map");
        const backdropmap = document.getElementById("backdrop-modal-map");
        const mapWrapper = document.getElementById("map-wrapper");
        const mapImage = document.getElementById("map-spot");
        let marker = null;
        let userAnswerX, userAnswerY;

        mapImage.addEventListener("click", function(event) {
            // Mengambil koordinat klik
            userAnswerX = event.offsetX;
            userAnswerY = event.offsetY;
            console.log(userAnswerX, userAnswerY);

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
            marker.style.left = `${userAnswerX}px`;
            marker.style.top = `${userAnswerY}px`;

            // Tambahkan mark titik ke dalam gambar peta
            mapImage.parentNode.appendChild(marker);
        });

        // Fungsi untuk menampilkan modal dan backdrop
        function showModalMap() {
            modalmap.classList.add("flex");
            modalmap.classList.add("opacity-100");
            modalmap.classList.remove("opacity-0", "pointer-events-none");
            modalmap.classList.remove("hidden");
            backdropmap.classList.remove(
                "opacity-0",
                "pointer-events-none"
            );
            backdropmap.classList.add("opacity-75");
            backdropmap.style.pointerEvents = "auto";
            modalmap.setAttribute("aria-hidden", "false");
            modalmap.setAttribute("aria-modal", "true");
        }

        // Fungsi untuk menyembunyikan modal dan backdrop
        function hideModalMap() {
            modalmap.classList.add("opacity-0", "pointer-events-none");
            modalmap.classList.add("hidden");
            modalmap.classList.remove("opacity-100");
            backdropmap.classList.remove("opacity-75");
            backdropmap.classList.add("opacity-0", "pointer-events-none");
            backdropmap.style.pointerEvents = "none";
            modalmap.setAttribute("aria-hidden", "true");
            modalmap.setAttribute("aria-modal", "false");
        }

        async function submitMap(questionId) {
            // hideModalMap();
            // showModalResult();

            // Koordinat jawaban awal (dalam piksel)
            const originalAnswerX = 212;
            const originalAnswerY = 70;

            // Ukuran gambar map sebelum resize
            const originalMapWidth = 350; // Masukkan lebar asli gambar map di sini
            const originalMapHeight = 250; // Masukkan tinggi asli gambar map di sini

            // Ukuran gambar map setelah resize
            const mapWidth = mapImage.clientWidth;
            const mapHeight = mapImage.clientHeight;
            console.log("mapWidth:", mapWidth, "mapHeight:", mapHeight);

            // Skala untuk normalisasi koordinat
            const scaleX = mapWidth / originalMapWidth;
            const scaleY = mapHeight / originalMapHeight;
            console.log("scaleX:", scaleX, "scaleY:", scaleY);

            // Koordinat jawaban setelah normalisasi ke gambar map yang baru
            const answerX = originalAnswerX * scaleX;
            const answerY = originalAnswerY * scaleY;
            console.log("answerX:", answerX, "answerY:", answerY);

            // Hitung jarak antara mark user dan mark jawaban
            const distance = Math.sqrt(
                Math.pow(answerX - userAnswerX, 2) + Math.pow(answerY - userAnswerY, 2)
            );
            console.log("Distance:", distance);

            // Tentukan rentang jarak yang sesuai dengan skor yang diinginkan
            const maxDistance = 100; // Jarak diagonal
            const minScore = 0;
            const maxScore = 1000; // Skor maksimum yang Anda inginkan

            // Hitung skor berdasarkan jarak dengan interpolasi linier
            let score = maxScore * (1 - distance / maxDistance);
            score = Math.round(score); // Bulatkan nilai skor

            // Pastikan skor tidak melebihi 1000 atau kurang dari 0
            score = Math.max(Math.min(score, maxScore), minScore);

            // Output skor
            console.log("Score:", score);

            const data = {
                questionId: questionId,
                userAnswerX: userAnswerX,
                userAnswerY: userAnswerY,
                scaleX: scaleX,
                scaleY: scaleY,
                score: score
            }

            // Mengirim data menggunakan AJAX
            $.ajax({
                url: '{{ route('game.saveAnswer') }}',
                method: 'POST',
                data: {
                    questionId: {{ $question['id'] }},
                    userAnswerX: userAnswerX,
                    userAnswerY: userAnswerY,
                    scaleX: scaleX,
                    scaleY: scaleY,
                    score: score,
                    _token: '{{ csrf_token() }}' // CSRF Token
                },
                success: function(response) {
                    console.log('Success:', response);
                    // Redirect ke pertanyaan berikutnya atau tampilkan hasil
                    window.location.href = '/nextQuestion';
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        document.addEventListener("keydown", function(event) {
            if (
                event.key === "m" &&
                (modalmap.classList.contains("opacity-100") ||
                    !modalmap.classList.contains("hidden"))
            ) {
                hideModalMap();
            } else if (event.key === "m") {
                showModalMap();
            }
        });

        backdropmap.addEventListener("click", hideModalMap);
    </script>
@endsection

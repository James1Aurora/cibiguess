@extends('layouts.admin')

@section('title', 'Edit Mini Map | CibiGuess')

@section('content')
    <div class="bg-cyan-600 rounded-lg p-3 w-full min-h-32 mb-3">
        <p class="text-white tracking-tighter font-semibold text-xl">Edit Mini Map</p>
    </div>

    <a type="button" class="btn btn-ghost btn-outline px-3 py-2 h-fit min-h-fit text-sm me-1 mb-3 hover:text-gray-600"
        href="{{ route('minimaps') }}">
        <span class="material-symbols-outlined filled !text-xl !leading-none">
            arrow_back
        </span> Back
    </a>

    <div class="border border-gray-300 p-4 rounded-lg md:w-1/2">
        <form action="{{ route('minimaps.update', $miniMap->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <label class="form-control w-full" id="image">
                <div class="label">
                    <span class="label-text">Mini Map Image</span>
                </div>
                <input type="file" class="file-input file-input-bordered w-full" id="image" name="image"
                    onchange="previewImage(this)" />
            </label>
            @error('image')
                <div class="mb-1">
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                </div>
            @enderror

            <div class="rounded-lg w-fit border border-gray-300 relative my-3">
                <img id="preview" src="{{ asset('images/maps/') . '/' . $miniMap->image }}" alt="spot map"
                    draggable="false" class="max-h-[250px]" />
            </div>

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Type Name</span>
                </div>
                <input type="text" placeholder="Type name..." name="name"
                    class="input input-bordered w-full px-3 py-2 h-fit min-h-fit"
                    value="{{ old('name') ?? $miniMap->name }}" />
            </label>
            @error('name')
                <div class="mb-1">
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                </div>
            @enderror

            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Building Name</span>
                </div>
                <input type="text" placeholder="Building name..." name="building"
                    class="input input-bordered w-full px-3 py-2 h-fit min-h-fit"
                    value="{{ old('building') ?? $miniMap->building }}" />
            </label>
            @error('building')
                <div class="mb-1">
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                </div>
            @enderror

            <div class="flex justify-end items-center mt-3">
                <button type="button" class="btn btn-neutral px-3 py-2 h-fit min-h-fit text-sm me-1">
                    Cancel <span class="material-symbols-outlined filled !text-xl !leading-none">
                        close
                    </span>
                </button>
                <button type="submit" class="btn btn-primary px-3 py-2 h-fit min-h-fit text-sm">
                    Submit <span class="material-symbols-outlined filled !text-xl !leading-none">
                        save
                    </span>
                </button>
            </div>
        </form>
    </div>
    @if (session('error'))
        <x-toast message="{{ session('error') }}" type="error">{{ session('error') }}</x-toast>
    @endif
@endsection

@section('scripts')
    <script>
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
    </script>
@endsection

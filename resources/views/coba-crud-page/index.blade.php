@extends('layouts.app')

@section('title', 'Read data users')

@section('content')
    <div class="border border-gray-300 p-4 rounded-lg mt-10">
        <div class="flex justify-between items-center">
            <p class="text-xl tracking-tighter font-semibold mb-2">Daftar Badge</p>
            <button class="btn btn-primary px-3 py-2 h-fit min-h-fit text-sm me-1" onclick="openAddBadgeModal()">Tambah</button>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($badges as $badge)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $badge->title }}</td>
                            <td>{{ $badge->description }}</td>
                            <td>
                                <img src="{{ asset('images/' . $badge->image) }}" class="border border-gray-300 rounded-lg w-20 h-20 object-cover object-center"/>
                            </td>
                            <td>
                                <button
                                    class="btn btn-warning px-3 py-2 h-fit min-h-fit text-sm me-1"
                                    onclick="openEditBadgeModal('{{ $badge->id }}', '{{ addslashes($badge->title) }}', '{{ addslashes($badge->description) }}')"
                                >
                                    Edit
                                </button>
                                <button class="btn btn-error px-3 py-2 h-fit min-h-fit text-sm" onclick="deleteBadgeModal.showModal()">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

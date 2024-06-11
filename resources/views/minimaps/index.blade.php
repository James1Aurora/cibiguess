@extends('layouts.admin')

@section('title', 'Mini Map List | CibiGuess')

@section('content')
    <div class="bg-cyan-600 rounded-lg p-3 w-full min-h-32 mb-3">
        <p class="text-white tracking-tighter font-semibold text-xl">Mini Map List</p>
    </div>

    <div class="border border-gray-300 p-4 rounded-lg">
        <div class="flex justify-between items-center">
            <p class="text-xl tracking-tighter font-semibold mb-2">Mini Maps ({{ $minimaps->count() }})</p>
            <a type="button" class="btn btn-primary px-3 py-2 h-fit min-h-fit text-sm me-1"
                href="{{ route('minimaps.create') }}">
                Add Mini Map <span class="material-symbols-outlined filled !text-xl !leading-none">
                    add_box
                </span>
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th>Image</th>
                        <th>Type Name</th>
                        <th>Building</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($minimaps as $map)
                        <tr>
                            <th>{{ $loop->iteration + ($minimaps->currentPage() - 1) * $minimaps->perPage() }}</th>
                            <td>
                                <div class="bg-gray-700 w-fit"><img style="width: 100px; height:100px" src="{{ asset('images/maps/' . $map->image) }}"
                                        class="max-h-28" /></div>
                            </td>
                            <td>{{ $map->name }}</td>
                            <td>{{ $map->building }}</td>
                            <td class="flex">
                                <a type="button" class="btn btn-warning px-3 py-2 h-fit min-h-fit text-sm me-1"
                                    href="{{ route('minimaps.edit', $map->id) }}">
                                    Edit
                                </a>
                                <button type="button" class="btn btn-error px-3 py-2 h-fit min-h-fit text-sm"
                                    onclick="showDeleteModal('{{ $map->id }}')">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-center">
            {{ $minimaps->links('vendor.pagination.custom') }}
        </div>
    </div>

    <dialog id="deleteModal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box rounded-lg p-4">
            <div class="h-14 w-14 flex justify-center items-center rounded-full bg-red-100 mb-2">
                <div class="h-10 w-10 flex justify-center items-center rounded-full bg-red-200">
                    <span class="material-symbols-outlined text-red-800">
                        error
                    </span>
                </div>
            </div>
            <h3 class="font-semibold tracking-tight">
                Are you sure want to delete this?
            </h3>
            <p class="py-2 text-gray-400 text-sm">
                This action will delete all your class data, and can't be
                undo
            </p>

            <div class="modal-action">
                <form method="dialog">
                    <button type="submit" class="btn py-2 px-3 text-sm h-fit min-h-fit">
                        Cancel
                    </button>
                    <button id="deleteButton" type="button"
                        class="btn btn-error py-2 px-3 text-sm h-fit min-h-fit text-white">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button type="submit">close</button>
        </form>
    </dialog>

    @if (session('success'))
        <x-toast message="{{ session('success') }}" type="info">{{ session('success') }}</x-toast>
    @elseif (session('error'))
        <x-toast message="{{ session('error') }}" type="error">{{ session('error') }}</x-toast>
    @endif
@endsection

@section('scripts')
    <script>
        function showDeleteModal(id) {
            // Menetapkan ID ke elemen modal
            var deleteModal = document.getElementById('deleteModal');
            deleteModal.dataset.id = id;
            // Memunculkan modal
            deleteModal.showModal();
        }

        document.getElementById('deleteButton').addEventListener('click', function() {
            var id = document.getElementById('deleteModal').dataset.id;
            var deleteButton = document.getElementById('deleteButton');

            deleteButton.disabled = true;
            deleteButton.textContent = 'Deleting...';

            fetch("{{ url('ad/minimaps') }}" + "/" + id, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json, text-plain, */*',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to delete mini map');
                    }
                    // Tutup modal setelah penghapusan berhasil
                    document.getElementById('deleteModal').close();
                    // Refresh halaman
                    window.location.reload();
                })
                .catch(error => {
                    console.error(error);

                    deleteButton.disabled = false;
                    deleteButton.textContent = 'Delete';
                });
        });
    </script>
@endsection

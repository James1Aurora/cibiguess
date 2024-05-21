@extends('layouts.app')

@section('title', 'Read data users')

@section('content')
    <div class="border border-gray-300 p-4 rounded-lg mt-10">
        <div class="flex justify-between items-center">
            <p class="text-xl tracking-tighter font-semibold mb-2">Daftar Badge</p>
            <button class="btn btn-primary px-3 py-2 h-fit min-h-fit text-sm me-1"
                onclick="addBadgeModal.showModal()">Tambah</button>
        </div>

        @if (session('success'))
            <div id="successAlert" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
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
                                <img src="{{ asset('storage/badges/' . $badge->image) }}"
                                    class="border border-gray-300 rounded-lg w-20 h-20 object-cover object-center" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning px-3 py-2 h-fit min-h-fit text-sm me-1"
                                    onclick="showEditModal('{{ $badge->id }}', '{{ addslashes($badge->title) }}', '{{ addslashes($badge->description) }}')">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-error px-3 py-2 h-fit min-h-fit text-sm"
                                    onclick="showDeleteModal('{{ $badge->id }}')">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <dialog id="addBadgeModal" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box rounded-lg p-4">
                <h3 class="font-semibold tracking-tight text-lg">Add Badge</h3>

                <form method="POST" action="{{ route('badge.store') }}" enctype="multipart/form-data">
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
                    <label class="form-control">
                        <div class="label">
                            <span class="label-text">Description</span>
                        </div>
                        <textarea class="textarea textarea-bordered h-24" placeholder="Bio" id="description" name="description"></textarea>
                    </label>
                    @error('description')
                        <div class="mb-1">
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        </div>
                    @enderror
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Badge Image</span>
                        </div>
                        <input type="file" class="file-input file-input-bordered w-full" id="image" name="image" />
                    </label>
                    @error('image')
                        <div class="mb-1">
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        </div>
                    @enderror

                    <div class="flex gap-2 justify-end mt-3">
                        <button type="button" onclick="addBadgeModal.close()"
                            class="btn py-2 px-3 text-sm h-fit min-h-fit">Cancel</button>
                        <button type="submit"
                            class="btn btn-primary py-2 px-3 text-sm h-fit min-h-fit text-white">Save</button>
                    </div>
                </form>

                {{-- <div class="modal-action">
                    <form method="dialog">
                        <button type="button" onclick="closeBadgeModal()" class="btn py-2 px-3 text-sm h-fit min-h-fit">Cancel</button>
                        <button type="submit" class="btn btn-primary py-2 px-3 text-sm h-fit min-h-fit text-white">Save</button>
                    </form>
                </div> --}}
            </div>
            <form method="dialog" class="modal-backdrop">
                <button type="submit">close</button>
            </form>
        </dialog>

        <dialog id="editBadgeModal" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box rounded-lg p-4">
                <h3 class="font-semibold tracking-tight text-lg">Edit Badge</h3>

                <form id="editBadgeForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    {{-- <input type="hidden" id="badgeId" name="badgeId"> --}}
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Title</span>
                        </div>
                        <input type="text" id="titleEdit" name="title" placeholder="Type here"
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
                        <textarea class="textarea textarea-bordered h-24" placeholder="Descriptions..." id="descriptionEdit" name="description"></textarea>
                    </label>
                    @error('description')
                        <div class="mb-1">
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        </div>
                    @enderror
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text">Badge Image</span>
                        </div>
                        <input type="file" class="file-input file-input-bordered w-full" id="image" name="image" />
                    </label>
                    @error('image')
                        <div class="mb-1">
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        </div>
                    @enderror

                    <div class="flex gap-2 justify-end mt-3">
                        <button type="button" onclick="editBadgeModal.close()"
                            class="btn py-2 px-3 text-sm h-fit min-h-fit">Cancel</button>
                        <button type="submit"
                            class="btn btn-primary py-2 px-3 text-sm h-fit min-h-fit text-white">Save</button>
                    </div>
                </form>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button type="submit">close</button>
            </form>
        </dialog>

        <dialog id="deleteBadgeModal" class="modal modal-bottom sm:modal-middle">
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

                {{-- <div class="form-control">
                    <label class="label cursor-pointer p-0 gap-2 !justify-start w-fit">
                        <input type="checkbox" class="checkbox checkbox-error [--chkfg:white]" />
                        <span class="label-text text-gray-400">I know what i'm doing</span>
                    </label>
                </div> --}}

                <div class="modal-action">
                    <form method="dialog">
                        <button type="submit" class="btn py-2 px-3 text-sm h-fit min-h-fit">
                            Cancel
                        </button>
                        <button id="deleteBadgeButton" type="button"
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
    </div>
@endsection

@section('scripts')
    <script>
        // Setelah 5 detik, sembunyikan elemen alert
        setTimeout(function() {
            var successAlert = document.getElementById('successAlert');
            if (successAlert) {
                successAlert.style.display = 'none';
            }
        }, 5000);

        // function closeBadgeModal() {
        //     document.getElementById('badgeModal').close();
        // }

        function showEditModal(id, title, description) {
            // Menetapkan ID ke elemen modal
            var editModal = document.getElementById('editBadgeModal');
            document.getElementById('editBadgeForm').action = "{{ url('/ds/badge') }}" + "/" + id;
            document.getElementById('titleEdit').value = title;
            document.getElementById('descriptionEdit').value = description;
            // document.getElementById('badgeId').value = id;

            // Memunculkan modal
            editModal.showModal();
        }

        function showDeleteModal(id) {
            // Menetapkan ID ke elemen modal
            var deleteModal = document.getElementById('deleteBadgeModal');
            deleteModal.dataset.id = id;
            // Memunculkan modal
            deleteModal.showModal();
        }

        document.getElementById('deleteBadgeButton').addEventListener('click', function() {
            // Mengambil ID dari dataset modal
            var id = document.getElementById('deleteBadgeModal').dataset.id;

            fetch("{{ url('/badge') }}" + "/" + id, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to delete badge');
                    }
                    // Tutup modal setelah penghapusan berhasil
                    document.getElementById('deleteBadgeModal').close();
                    // Refresh halaman
                    window.location.reload();
                })
                .catch(error => {
                    console.error(error);
                    alert('Failed to delete badge');
                });
        });
    </script>
    {{-- <script>
        const badgeBaseUrl = "{{ route('badge') }}";

        function openAddBadgeModal() {
            document.getElementById('modalTitle').innerText = 'Add Badge';
            document.getElementById('badgeForm').reset();
            document.getElementById('badgeId').value = '';
            document.getElementById('badgeModal').showModal();
        }

        function openEditBadgeModal(badgeId, title, description) {
            document.getElementById('modalTitle').innerText = 'Edit Badge';
            document.getElementById('badgeId').value = badgeId;
            document.getElementById('title').value = title;
            document.getElementById('description').value = description;
            document.getElementById('badgeModal').showModal();
        }

        function closeBadgeModal() {
            document.getElementById('badgeModal').close();
        }

        document.getElementById('badgeForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);
            var badgeId = formData.get('badgeId');
            var url = badgeId ? badgeBaseUrl + '/' + badgeId : badgeBaseUrl;
            // var method = badgeId ? 'PUT' : 'POST';

            // // Add a _method field to FormData to simulate PUT request
            // if (method === 'PUT') {
            //     formData.append('_method', 'PUT');
            // }

            console.log(url);

            fetch(url, {
                    method: "POST",
                    headers: {
                        // 'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: {
                        title: formData.get('title'),
                        description: formData.get('description')
                    }
                })
                .then(response => {
                    if (response.ok) {
                        closeBadgeModal();
                        window.location.reload();
                    } else {
                        throw new Error('Failed to save badge');
                    }
                })
                .catch(error => {
                    console.error(error);
                    // alert('Failed to save badge');
                });
        });
    </script> --}}
@endsection

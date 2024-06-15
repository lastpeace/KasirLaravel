@extends('layouts.app2')

@section('content')
    <div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[150px] overflow-y-auto text-center bg-indigo-700">
        <div class="text-gray-100 text-xl">
            <div class="p-2.5 mt-1 flex items-center">
                <img loading="lazy" srcset="{{ asset('favicon.png') }}" class="aspect-[1.11] w-[115px]" />
            </div>
            <div class="my-2 bg-gray-600 h-[1px]"></div>
        </div>
        <div
            class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-neutral-50 text-white item">
            <i class="bi bi-house-door-fill hover:text-indigo-700"></i>
            <a href="{{ route('admin.dashboard') }}" class="text-[15px] ml-4 text-gray-200 font-bold">Home</a>
        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-bookmark-fill"></i>
            <a href="{{ route('admin.products.index') }}" class="text-[15px] ml-4 text-gray-200 font-bold">Menu</a>
        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-bookmark-fill"></i>
            <a class="text-[15px] ml-4 text-gray-200 font-bold" href="{{ route('admin.reservations.index') }}">Reservasi</a>
        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-bookmark-fill"></i>
            <a class="text-[15px] ml-4 text-gray-200 font-bold" href="{{ route('tables.index') }}">Meja</a>
        </div>
        <div class="my-4 bg-black h-[1px]"></div>

        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-box-arrow-in-right"></i>
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-[15px] ml-4 text-gray-200 font-bold">Logout</button>
            </form>
        </div>

    </div>


    <div class="container mx-auto ml-auto px-20">
        <div class="flex gap-5 self-start mt-8 text-2xl font-semibold text-black">
            <div class="flex-auto">Meja</div>
        </div>
        <button id="openCreateModal"
            class="flex gap-1 px-3.5 py-1.5 text-white bg-indigo-700 rounded border border-indigo-700 border-solid shadow-2xl">
            <div class="flex-auto my-auto">Add Table</div>
        </button>


        <div
            class="flex flex-col justify-center px-5 py-5 mt-7 text-lg font-medium text-black bg-white rounded-lg shadow-2xl max-md:px-5 max-md:max-w-full">
            <div class="overflow-x-auto">
                <table class="table min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Capacity</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tables as $table)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $table->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $table->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $table->capacity }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $table->status }}</td>
                                <td>
                                    <button data-table="{{ json_encode($table) }}" class="btn-edit btn btn-primary"><svg
                                            class="h-8 w-8 text-slate-900" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                            <line x1="16" y1="5" x2="19" y2="8" />
                                        </svg></button>
                                    <form action="{{ route('tables.destroy', $table->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this table?')"><svg
                                                class="h-8 w-8 text-slate-900" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6" />
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                <line x1="10" y1="11" x2="10" y2="17" />
                                                <line x1="14" y1="11" x2="14" y2="17" />
                                            </svg></button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div id="editModal" class="fixed z-10 inset-0 bg-black bg-opacity-50 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white rounded-lg p-6 w-full max-w-md">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold mb-4">Edit Table</h2>
                        <button id="closeModal" class="text-gray-500 hover:text-gray-800">&times;</button>
                    </div>
                    <form id="editForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editTableId">
                        <div class="mb-4">
                            <label class="block text-gray-700">Name</label>
                            <input type="text" id="editName" name="name"
                                class="block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Capacity</label>
                            <input type="number" id="editCapacity" name="capacity"
                                class="block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Status</label>
                            <div
                                class="flex gap-5 justify-between py-2.5 pr-2.5 pl-8 mt-4 text-indigo-700 whitespace-nowrap rounded-lg border border-indigo-700 border-solid max-md:pl-5">
                                <div class="my-auto">Available</div>
                                <input type="radio" id="editStatusAvailable" name="status" value="available"
                                    class="shrink-0 rounded-md border border-indigo-700 border-solid h-[13px] w-[18px]">
                                <div class="my-auto">Full</div>
                                <input type="radio" id="editStatusFull" name="status" value="full"
                                    class="shrink-0 rounded-md border border-indigo-700 border-solid h-[13px] w-[18px]">
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save
                                Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="createModal" class="fixed z-10 bg-black bg-opacity-50 inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white rounded-lg p-6 w-full max-w-md">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold mb-4">Create New Table</h2>
                        <button id="closeCreateModal" class="text-gray-500 hover:text-gray-800">&times;</button>
                    </div>
                    <form id="createForm">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700">Name</label>
                            <input type="text" id="createName" name="name"
                                class="block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Capacity</label>
                            <input type="number" id="createCapacity" name="capacity"
                                class="block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Status</label>
                            <div
                                class="flex gap-5 justify-between py-2.5 pr-2.5 pl-8 mt-4 text-indigo-700 whitespace-nowrap rounded-lg border border-indigo-700 border-solid max-md:pl-5">
                                <div class="my-auto">Available</div>
                                <input type="radio" id="editStatusAvailable" name="status" value="available"
                                    {{ $table->status === 'available' ? 'checked' : '' }}
                                    class="shrink-0 rounded-md border border-indigo-700 border-solid h-[13px] w-[18px]">
                                <div class="flex gap-5">
                                    <div class="my-auto">Full</div>
                                    <input type="radio" id="editStatusFull" name="status" value="full"
                                        {{ $table->status === 'full' ? 'checked' : '' }}
                                        class="shrink-0 rounded-md border border-indigo-700 border-solid h-[13px] w-[18px]">
                                </div>
                            </div>
                        </div>


                        <div class="mb-4">
                            <button type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create
                                Table</button>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const editButtons = document.querySelectorAll('.btn-edit');
                    const editModal = document.getElementById('editModal');
                    const closeModal = document.getElementById('closeModal');
                    const editForm = document.getElementById('editForm');
                    const editTableId = document.getElementById('editTableId');
                    const editName = document.getElementById('editName');
                    const editCapacity = document.getElementById('editCapacity');
                    const editStatusAvailable = document.getElementById('editStatusAvailable');
                    const editStatusFull = document.getElementById('editStatusFull');

                    editButtons.forEach(button => {
                        button.addEventListener('click', function() {
                            const table = JSON.parse(this.getAttribute('data-table'));
                            editTableId.value = table.id;
                            editName.value = table.name;
                            editCapacity.value = table.capacity;
                            if (table.status === 'available') {
                                editStatusAvailable.checked = true;
                            } else if (table.status === 'full') {
                                editStatusFull.checked = true;
                            }
                            editModal.classList.remove('hidden');
                        });
                    });

                    closeModal.addEventListener('click', function() {
                        editModal.classList.add('hidden');
                    });

                    editForm.addEventListener('submit', function(event) {
                        event.preventDefault();
                        const id = editTableId.value;
                        const url = `{{ url('tables') }}/${id}`;
                        const data = {
                            name: editName.value,
                            capacity: editCapacity.value,
                            status: editStatusAvailable.checked ? 'available' :
                            'full', // or use editStatusFull.checked
                            _token: '{{ csrf_token() }}',
                            _method: 'PUT'
                        };

                        fetch(url, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify(data)
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    location.reload();
                                } else {
                                    alert('Something went wrong');
                                }
                            })
                            .catch((error) => {
                                console.error('Error:', error);
                            });
                    });
                });


                document.addEventListener('DOMContentLoaded', function() {
                    const createModal = document.getElementById('createModal');
                    const closeCreateModal = document.getElementById('closeCreateModal');
                    const createForm = document.getElementById('createForm');
                    const openCreateModalButton = document.getElementById('openCreateModal');

                    // Event listener for opening modal
                    openCreateModalButton.addEventListener('click', function() {
                        createModal.classList.remove('hidden');
                    });

                    // Event listener for closing modal
                    closeCreateModal.addEventListener('click', function() {
                        createModal.classList.add('hidden');
                    });

                    // Event listener for form submission
                    createForm.addEventListener('submit', function(event) {
                        event.preventDefault();
                        const url = `{{ route('tables.store') }}`;
                        const data = {
                            name: document.getElementById('createName').value,
                            capacity: document.getElementById('createCapacity').value,
                            status: document.querySelector('input[name="status"]:checked').value,
                            _token: '{{ csrf_token() }}'
                        };

                        fetch(url, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify(data)
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Close modal
                                    createModal.classList.add('hidden');
                                    // Refresh page
                                    location.reload();
                                } else {
                                    alert('Something went wrong');
                                }
                            })
                            .catch((error) => {
                                console.error('Error:', error);
                            });
                    });
                });
            </script>
        @endsection

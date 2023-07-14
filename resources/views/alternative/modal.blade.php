<!-- ######################################## Modal Add New Data ######################################## -->
<div id="create-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">

        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-white">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-red-600 dark:hover:text-white" data-modal-hide="create-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-black">Add Data Alternative</h3>
                <form action="{{ route('alternative.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Kode Alternative -->
                    <div>
                        <label for="kode_alternative" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Kode Alternative</label>
                        <input type="text" name="kode_alternative" id="kode_alternative" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black form-control @error('kode_alternative') is-invalid @enderror" value="{{ old('alternative') }}" placeholder="Alternative" required>

                        <!-- error message -->
                        @error('kode_alternative')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Nama Alternative -->
                    <div>
                        <label for="nama_alternative" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Alternative</label>
                        <input type="text" name="nama_alternative" id="nama_alternative" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black form-control @error('alternative') is-invalid @enderror" value="{{ old('nama_alternative') }}" placeholder="Nama Alternative" required>

                        <!-- error message -->
                        @error('nama_alternative')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ######################################## Modal Show Data ######################################## -->
@foreach ($alternatives as $alternative)
<div id="view-modal{{ $alternative->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-white">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-red-600 dark:hover:text-white" data-modal-hide="view-modal{{ $alternative->id }}">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <div class="px-6 py-6 lg:px-8 space-y-6">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-black">Detail Record</h3>

                <!-- ID Alternative -->
                <div class="block">
                    <label for="id" class="mb-2 text-sm font-medium text-gray-900 dark:text-black">ID:</label>
                    <span>{{ $alternative->id}}</span>
                </div>

                <!-- Kode Alternative -->
                <div class="block">
                    <label for="a" class="mb-2 text-sm font-medium text-gray-900 dark:text-black">Kode Alternative:
                    </label>
                    <span>{{ $alternative->kode_alternative }}</span>
                </div>

                <!-- Nama Alternative -->
                <div class="block">
                    <label for="a" class="mb-2 text-sm font-medium text-gray-900 dark:text-black">Nama Alternative:
                    </label>
                    <span>{{ $alternative->nama_alternative }}</span>
                </div>

            </div>
        </div>
    </div>
</div>
@endforeach

<!-- ######################################## Modal Edit Data ######################################## -->
@foreach ($alternatives as $alternative)
<div id="edit-modal{{ $alternative->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-white">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-red-600 dark:hover:text-white" data-modal-hide="edit-modal{{ $alternative->id }}">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-black">Edit Alternative</h3>
                <form action="{{ route('alternative.update', $alternative->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- ID Alternative -->
                    <div class="block">
                        <label for="name" class="mb-2 text-sm font-medium text-gray-900 dark:text-black">ID:</label>
                        <span>{{ $alternative->id }}</span>
                    </div>

                    <input type="hidden" id="id" name="id" value="{{ $alternative->id }}">

                    <!-- Kode Alternative -->
                    <div>
                        <label for="alternative" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Kode Alternative</label>
                        <input type="text" name="kode_alternative" id="kode_alternative" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black form-control @error('kode_alternative') is-invalid @enderror" value="{{ $alternative->kode_alternative }}" placeholder="Kode Alternative" required>

                        <!-- error message -->
                        @error('kode_alternative')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Nama Alternative -->
                    <div>
                        <label for="nama_alternative" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nama Alternative</label>
                        <input type="text" name="nama_alternative" id="nama_alternative" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black form-control @error('nama_alternative') is-invalid @enderror" value="{{ $alternative->nama_alternative }}" placeholder="Nama Alternative" required>

                        <!-- error message -->
                        @error('nama_alternative')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($alternatives as $alternative)
<!-- ######################################## Modal Delete Data ######################################## -->
<div id="delete-modal{{ $alternative->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-white">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="delete-modal{{ $alternative->id }}">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <form action="{{ route('alternative.destroy', $alternative->id) }}" method="POST">
                @csrf
                @method('delete')

                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-yellow-300 w-14 h-14 dark:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <b class="text-black dark:text-red-600 mb-2">{{ $alternative->nama_alternative }}</b>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                        delete this alternative?</h3>
                    <button data-modal-hide="delete-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="delete-modal{{ $alternative->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                        cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
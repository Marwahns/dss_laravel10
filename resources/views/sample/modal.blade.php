<!-- ######################################## Modal Add New Data ######################################## -->
<div id="create-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">

        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-white">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-red-600 dark:hover:text-white"
                data-modal-hide="create-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-black">Add Data Sample</h3>
                <form action="{{ route('sample.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <!-- alternatives -->
                    <div>
                        <label for="alternatif_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Alternatives</label>
                        <select name="alternatif_id" id="alternatif_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black form-control @error('type') is-invalid @enderror">
                            <option value="" selected disabled>Select a Type Alternative</option>
                            @foreach ($al as $sample)
                                <option value="{{ $sample->id }}">{{ $sample->nama_alternative }}</option>
                            @endforeach
                        </select>

                        <!-- error message -->
                        @error('alternatif_id')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- ID Criteria -->
                    <div>
                        <label for="criteria_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Criteria</label>
                        <select name="criteria_id" id="criteria_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black form-control @error('type') is-invalid @enderror">
                            <option value="" selected disabled>Select a Type Criteria</option>
                            @foreach ($cr as $sample)
                                <option value="{{ $sample->id }}">{{ $sample->criteria }}</option>
                            @endforeach
                            <!-- "{{ $sample->id_criterias }}" -->
                        </select>

                        <!-- error message -->
                        @error('criteria_id')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- nilai -->
                    <div>
                        <label for="nilai"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">nilai</label>
                        <input type="text" name="nilai" id="nilai"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black form-control @error('nilai') is-invalid @enderror"
                            value="{{ old('nilai') }}" placeholder="0.9" required>

                        <!-- error message -->
                        @error('nilai')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" id="BtnSaveNew"
                        class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ######################################## Modal Show Data ######################################## -->
@foreach ($samples as $sample)
    <div id="view-modal{{ $sample['id'] }}" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-white">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-red-600 dark:hover:text-white"
                    data-modal-hide="view-modal{{ $sample['id'] }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>

                <div class="px-6 py-6 lg:px-8 space-y-6">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-black">Detail Record</h3>

                    <!-- ID sample -->
                    <div class="block">
                        <label for="id" class="mb-2 text-sm font-medium text-gray-900 dark:text-black">ID:</label>
                        <span>{{ $sample['id'] }}</span>
                    </div>

                    <!-- ID ALTERNATIVES -->
                    <div class="block">
                        <label for="id"
                            class="mb-2 text-sm font-medium text-gray-900 dark:text-black">Alternatives:</label>
                        <span>{{ $sample['alternatif_id'] }}</span>
                    </div>

                    <!-- ID sample -->
                    <div class="block">
                        <label for="id"
                            class="mb-2 text-sm font-medium text-gray-900 dark:text-black">Criteria:</label>
                        <span>{{ $sample['criteria_id'] }}</span>
                    </div>

                    <!-- nilai -->
                    <div class="block">
                        <label for="sample" class="mb-2 text-sm font-medium text-gray-900 dark:text-black">Nilai:
                        </label>
                        <span>{{ $sample['nilai'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- ######################################## Modal Edit Data ######################################## -->
@foreach ($samples as $valueSample)
    <div id="edit-modal{{ $valueSample['id'] }}" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-white">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-red-600 dark:hover:text-white"
                    data-modal-hide="edit-modal{{ $valueSample['id'] }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>

                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-black">Edit sample</h3>
                    <form action="{{ route('sample.update', $valueSample['id']) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- ID sample -->
                        <div class="block">
                            <label for="name"
                                class="mb-2 text-sm font-medium text-gray-900 dark:text-black">ID:</label>
                            <span>{{ $valueSample['id'] }}</span>
                        </div>

                        <input type="hidden" id="id" name="id" value="{{ $valueSample['id'] }}">

                        <!-- alternatives -->
                        <div>
                            <label for="alternatif_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Type</label>
                            <select name="alternatif_id" id="alternatif_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black form-control @error('type') is-invalid @enderror">
                                <option value="" selected disabled>Select a Type Alternative</option>
                                @foreach ($al as $sample)
                                    <option value="{{ $sample->id }}"
                                        @if ($sample['id'] == $valueSample['idAlternative']) selected @endif>
                                        {{ $sample->nama_alternative }}</option>
                                @endforeach
                            </select>

                            <!-- error message -->
                            @error('alternatif_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- criterias -->
                        <div>
                            <label for="criterias"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Type</label>
                            <select name="criteria_id" id="criteria_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black form-control @error('type') is-invalid @enderror">
                                <option value="" selected disabled>Select a Type Criteria</option>
                                @foreach ($cr as $sample)
                                    <option value="{{ $sample->id }}"
                                        @if ($sample['id'] == $valueSample['idCriteria']) selected @endif>
                                        {{ $sample->criteria }}</option>
                                @endforeach
                            </select>

                            <!-- error message -->
                            @error('criterias')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Nilai -->
                        <div>
                            <label for="nilai"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">nilai</label>

                            <input type="text" name="nilai" id="nilai"
                                data-original-value="{{ $valueSample['nilai'] }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-slate-50 dark:border-gray-500 dark:placeholder-gray-400 dark:text-black form-control @error('nilai') is-invalid @enderror"
                                value="{{ $valueSample['nilai'] }}" placeholder="nilai" required>

                            <!-- error message -->
                            @error('nilai')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- ######################################## Modal Delete Data ######################################## -->
@foreach ($samples as $sample)
    <div id="delete-modal{{ $sample['id'] }}" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-white">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="delete-modal{{ $sample['id'] }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <form action="{{ route('sample.destroy', $sample['id']) }}" method="POST">
                    @csrf
                    @method('delete')

                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-yellow-300 w-14 h-14 dark:text-yellow-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <b class="text-black dark:text-red-600 mb-2">{{ $sample['nama_alternative'] }}</b> <br>
                        <span class="text-black">Nilai Criteria <b
                                class="text-black dark:text-red-600 mb-2">{{ $sample['criteria'] }}:
                                {{ $sample['nilai'] }}</b></span>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                            delete this sample?</h3>
                        <button data-modal-hide="delete-modal{{ $sample['id'] }}" type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="delete-modal{{ $sample['id'] }}" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                            cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

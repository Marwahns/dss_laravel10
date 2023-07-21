@extends('layout.main')

@section('title')
    <title>{{ $pageTitle }}</title>
@endsection

@section('breadcrumb')
    <nav>
        <!-- breadcrumb -->
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="text-sm leading-normal">
                <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
                aria-current="page">{{ $breadcrumb }}</li>
        </ol>
        <h6 class="mb-0 font-bold capitalize">{{ $breadcrumb }}</h6>
    </nav>
@endsection

@section('content')
    <!-- table -->
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3">
                @if (session('success'))
                    <div id="alert-border-3"
                        class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <div class="ml-3 text-sm font-medium">
                            <span class="font-medium">Success!</span> {{ session('success') }}
                        </div>
                        <button type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-border-3" aria-label="Close">
                            <span class="sr-only">Dismiss</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif

                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                <h6 class="mb-0" id="SubTitle">Criteria Table</h6>
                            </div>
                            <div class="flex-none w-1/2 max-w-full px-3 text-right">
                                <button data-modal-target="create-modal" data-modal-toggle="create-modal"
                                    class="inline-block text-white px-6 py-3 font-bold bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 addbtn"
                                    id="BtnAdd"><i class="fas fa-plus"> </i>&nbsp;&nbsp;Add New Data
                                </button>
                            </div>
                        </div>

                        <form method="get" action="/search" class="flex items-center mb-5 mt-5">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-auto">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"><svg
                                        xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path
                                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                                    </svg>
                                </div>
                                <input type="search" id="default-search" name="search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search..." value="{{ isset($search) ? $search : '' }}">
                            </div>
                            <button type="submit"
                                class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </form>

                    </div>

                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr id="available">
                                        <!-- Nomor -->
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            #
                                        </th>

                                        <!-- Criteria -->
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Criteria</th>

                                        <!-- Type -->
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Type</th>

                                        <!-- Weight -->
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Weight</th>

                                        <!-- Action -->
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <div>
                                    <tbody id="searchResultsContainer">
                                        @php
                                            $totalWeight = 0; // Inisialisasi variabel totalWeight
                                        @endphp
                                        @forelse ($criterion as $criteria)
                                            <tr>
                                                <!-- Nomor -->
                                                <td
                                                    class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                    <span
                                                        class="text-xs font-semibold leading-tight text-slate-400">{{ $loop->iteration }}</span>
                                                </td>

                                                <!-- Criteria -->
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <div class="flex px-2 py-1">
                                                        <div class="flex flex-col justify-center">
                                                            <p class="mb-0 text-xs leading-tight text-slate-400">
                                                                {{ $criteria->criteria }}</p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <!-- Type -->
                                                <td
                                                    class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <span
                                                        class="text-xs font-semibold leading-tight text-slate-400">{{ $criteria->type }}</span>
                                                </td>

                                                <!-- Weight -->
                                                <td
                                                    class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <span
                                                        class="text-xs font-semibold leading-tight text-slate-400 table-weight">{{ $criteria->weight }}</span>
                                                    @php
                                                        $totalWeight += $criteria->weight; // Tambahkan nilai weight ke totalWeight
                                                    @endphp
                                                </td>

                                                <!-- Action -->
                                                <td
                                                    class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                    <button
                                                        class="inline-block px-6 py-3 mb-0 text-xs font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none leading-pro ease-soft-in bg-150 tracking-tight-soft bg-x-25"
                                                        id="dropdownNavbarLink"
                                                        data-dropdown-toggle="dropdownNavbar{{ $criteria->id }}">
                                                        <i class="text-xs leading-tight fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <!-- Dropdown menu -->
                                                    <div id="dropdownNavbar{{ $criteria->id }}"
                                                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-24 dark:bg-white">

                                                        <div class="btn-group">
                                                            <button type="button"
                                                                class="hover:bg-gray-100 dark:hover:bg-slate-200 dark:hover:text-black viewbtn"
                                                                id="BtnShow"
                                                                data-modal-target="view-modal{{ $criteria->id }}"
                                                                data-modal-toggle="view-modal{{ $criteria->id }}"
                                                                value="{{ $criteria->id }}">
                                                                <i class="fa fa-solid fa-eye"></i>
                                                            </button>

                                                            <button type="button"
                                                                class="hover:bg-gray-100 dark:hover:bg-slate-200 dark:hover:text-black mx-2 editbtn"
                                                                id="BtnEdit"
                                                                data-modal-target="#edit-modal{{ $criteria->id }}"
                                                                data-modal-toggle="edit-modal{{ $criteria->id }}"
                                                                value="{{ $criteria->id }}">
                                                                <i class="fa fa-solid fa-edit"></i>
                                                            </button>

                                                            <button type="button"
                                                                class="hover:bg-gray-100 dark:hover:bg-slate-200 dark:hover:text-black"
                                                                data-modal-target="#delete-modal{{ $criteria->id }}"
                                                                data-modal-toggle="delete-modal{{ $criteria->id }}">
                                                                <i class="fa fa-solid fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="btn-group">
                                                    <button type="button"
                                                        class="hover:bg-gray-100 dark:hover:bg-slate-200 dark:hover:text-black viewbtn"
                                                        id="BtnShow" 
                                                        data-modal-target="view-modal{{$criteria->id}}"
                                                        data-modal-toggle="view-modal{{$criteria->id}}"
                                                        value="{{ $criteria->id }}">
                                                        <i class="fa fa-solid fa-eye"></i>
                                                    </button>

                                                    <button type="button"
                                                        class="hover:bg-gray-100 dark:hover:bg-slate-200 dark:hover:text-black mx-2 editbtn"
                                                        id="BtnEdit" 
                                                        data-modal-target="#edit-modal{{ $criteria->id }}"
                                                        data-modal-toggle="edit-modal{{ $criteria->id }}" value="{{ $criteria->id }}">
                                                        <i class="fa fa-solid fa-edit"></i>
                                                    </button>

                                                    <button type="button"
                                                        class="hover:bg-gray-100 dark:hover:bg-slate-200 dark:hover:text-black"
                                                        data-modal-target="#delete-modal{{ $criteria->id }}"
                                                        data-modal-toggle="delete-modal{{ $criteria->id }}">
                                                        <i class="fa fa-solid fa-trash"></i>
                                                    </button>
                                                </div> --}}
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger flex justify-center">
                                                <span id="noAvailable">Data Criteria belum Tersedia.</span>
                                            </div>
                                        @endforelse
                                    </tbody>
                                </div>
                            </table>
                            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                    <h6 class="mb-0">Total Weight: <h6 id="TotalWeight" name="TotalWeight"
                                            class="ml-1">
                                            {{ number_format($total_Weight, 4) }}</h6>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('criteria.modal')

        <footer class="pt-4">
            <div class="w-full px-6 mx-auto">
                <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                        <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                            ©
                            <script>
                                document.write(new Date().getFullYear() + ",");
                            </script>
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-semibold text-slate-700"
                                target="_blank">Marwah & Creative Tim</a>
                            for a better web.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end table -->

    <script>
        $(document).ready(function() {

            $(document).on('click', '.addbtn', function() {
                var totalWeight = $('#TotalWeight').text()
                $('#countWeight').text(totalWeight)

                // Dapatkan elemen input dan elemen tampilkan weight
                var inputs = $('input[name="weight"]');
                var countWeight = $('#countWeight');

                inputs.on('input change', function() {
                    var totalWeight = 0;

                    // Hitung total weight dari setiap input
                    inputs.each(function() {
                        var weight = parseFloat($(this).val()) || 0;
                        totalWeight += weight;
                    });

                    // Batasi total weight hingga maksimal 1
                    if (totalWeight > 1) {
                        totalWeight = weight;
                        alert('Total Weight exceeded the limit, maximum 1')
                        $('#weight').val('')
                    }

                    // Tampilkan total weight di elemen countWeight
                    countWeight.text(totalWeight.toFixed(4));
                })
            })


            $(document).on('click', '.editbtn', function() {
                var totalWeight = $('[name="TotalWeight"]').text()
                $('[name="countWeightinEdit"]').text(totalWeight)

                // Dapatkan elemen input dan elemen tampilkan weight
                var inputs = $('input[name="weight"]');
                var countWeight = $('[name="countWeightinEdit"]');

                // Mendapatkan nilai awal input dari atribut data-original-value
                inputs.each(function() {
                    var originalValue = $(this).data('original-value');
                    $(this).val(originalValue);
                });

                $('[name="weight"]').on('input change', function() {
                    var totalWeight = 0;

                    // Simpan nilai input sebelumnya
                    var previousValue = $(this).data('original-value') || '';

                    // Hitung total weight dari setiap input
                    inputs.each(function() {
                        var weight = parseFloat($(this).val()) || 0;
                        totalWeight += weight;
                    });

                    // Batasi total weight hingga maksimal 1
                    if (totalWeight > 1) {
                        totalWeight = weight;
                        // Hapus inputan baru yang dilakukan pengguna
                        $(this).val(previousValue);
                        alert('Total Weight exceeded the limit, maximum 1')
                    }

                    // Tampilkan total weight di elemen countWeight
                    countWeight.text(totalWeight.toFixed(4));
                })


                // Mendapatkan nilai original input criteria
                var inputCriteria = $('input[name="criteria"]');
                // Mendapatkan nilai awal input dari atribut data-original-value
                inputCriteria.each(function() {
                    var originalValue = $(this).data('original-value');
                    $(this).val(originalValue);
                });

                // Mendapatkan nilai original select type
                var inputType = $('select[name="type"]');
                // Mendapatkan nilai awal input dari atribut data-original-value
                inputType.each(function() {
                    var originalValue = $(this).data('original-value');
                    $(this).val(originalValue);
                });

            })

            if (parseFloat($('#TotalWeight').text()) >= 1 || parseFloat($('#TotalWeight').text()) >=
                1.0) {
                $('#BtnAdd').prop('disabled', true);
            } else {
                $('#BtnAdd').prop('disabled', false);
            }

            // Search
            var message = $('#noAvailable').text();
            if (message == 'Data Criteria belum Tersedia.') {
                $('#available').addClass('hidden')
            }

            $('#default-search').on('keyup', function() {
                var searchValue = $(this).val();
                // Send an AJAX request to the server
                $.ajax({
                    url: '/search', // Replace with your search endpoint URL
                    method: 'GET',
                    data: {
                        search: searchValue
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response); // Example: Log the search results to the console
                        // Update the table rows with the search results
                        $('#searchResultsContainer').html(response.html);
                    },
                    error: function(xhr, status, error) {
                        // Handle the error
                        console.log(error);
                    }
                });
            });

        })
    </script>
@endsection

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
                    <div class="alert alert-success"></div>
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        <span class="font-medium">Success!</span> {{ session('success') }}
                    </div>
                @endif

                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                <h6 class="mb-0" id="SubTitle">Sample Table</h6>
                            </div>
                            <div class="flex-none w-1/2 max-w-full px-3 text-right">
                                <button data-modal-target="create-modal" data-modal-toggle="create-modal"
                                    class="inline-block text-white px-6 py-3 font-bold bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 addbtn"
                                    id="BtnAdd"><i class="fas fa-plus"> </i>&nbsp;&nbsp;Add New Data
                                </button>
                            </div>
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <!-- Nomor -->
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            #
                                        </th>

                                        <!-- id_alternatives -->
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Alternatives</th>

                                        <!-- id_criteria -->
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Criteria</th>

                                        <!-- nilai -->
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Nilai</th>

                                        <!-- Action -->
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($samples as $sample)
                                        {{-- @php
                                            print_r($sample);
                                        @endphp --}}
                                        <tr>
                                            <!-- Nomor -->
                                            <td
                                                class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $loop->iteration }}</span>
                                            </td>

                                            <!-- alter -->
                                            <td
                                                class="p-2 text-left align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $sample['nama_alternative'] }}</span>
                                            </td>

                                            <!-- criteria -->
                                            <td
                                                class="p-2 text-left align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $sample['criteria'] }}</span>
                                            </td>

                                            <!-- Nilai -->
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $sample['nilai'] }}</span>
                                            </td>

                                            <!-- Action -->
                                            <td
                                                class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <button
                                                    class="inline-block px-6 py-3 mb-0 text-xs font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none leading-pro ease-soft-in bg-150 tracking-tight-soft bg-x-25"
                                                    id="dropdownNavbarLink"
                                                    data-dropdown-toggle="dropdownNavbar{{ $sample['id'] }}">
                                                    <i class="text-xs leading-tight fa fa-ellipsis-v"></i>
                                                </button>
                                                <!-- Dropdown menu -->
                                                <div id="dropdownNavbar{{ $sample['id'] }}"
                                                    class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-24 dark:bg-white">

                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="hover:bg-gray-100 dark:hover:bg-slate-200 dark:hover:text-black viewbtn"
                                                            id="BtnShow"
                                                            data-modal-target="view-modal{{ $sample['id'] }}"
                                                            data-modal-toggle="view-modal{{ $sample['id'] }}"
                                                            value="{{ $sample['id'] }}">
                                                            <i class="fa fa-solid fa-eye"></i>
                                                        </button>

                                                        <button type="button"
                                                            class="hover:bg-gray-100 dark:hover:bg-slate-200 dark:hover:text-black mx-2 editbtn"
                                                            id="BtnEdit"
                                                            data-modal-target="#edit-modal{{ $sample['id'] }}"
                                                            data-modal-toggle="edit-modal{{ $sample['id'] }}"
                                                            value="{{ $sample['id'] }}">
                                                            <i class="fa fa-solid fa-edit"></i>
                                                        </button>

                                                        <button type="button"
                                                            class="hover:bg-gray-100 dark:hover:bg-slate-200 dark:hover:text-black"
                                                            data-modal-target="#delete-modal{{ $sample['id'] }}"
                                                            data-modal-toggle="delete-modal{{ $sample['id'] }}">
                                                            <i class="fa fa-solid fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger flex justify-center">
                                            Data Sample belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            <!-- {{ $dataSamples->links('pagination::tailwind') }} -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('sample.modal')

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
                                target="_blank">Azimah &
                                Creative Tim</a>
                            for a better web.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end table -->

    <!-- <script>
        $(document).ready(function() {

            $(document).on('click', '.addbtn', function() {
                var totalnilai = $('#Totalnilai').text()
                $('#countnilai').text(totalnilai)

                // Dapatkan elemen input dan elemen tampilkan nilai
                var inputs = $('input[name="nilai"]');
                var countnilai = $('#countnilai');

                inputs.on('input change', function() {
                    var totalnilai = 0;

                    // Hitung total nilai dari setiap input
                    inputs.each(function() {
                        var nilai = parseFloat($(this).val()) || 0;
                        totalnilai += nilai;
                    });

                    // Batasi total nilai hingga maksimal 1
                    if (totalnilai > 1) {
                        totalnilai = nilai;
                        alert('Total nilai exceeded the limit, maximum 1')
                        $('#nilai').val('')
                    }

                    // Tampilkan total nilai di elemen countnilai
                    countnilai.text(totalnilai.toFixed(4));
                })
            })

            $(document).on('click', '.editbtn', function() {
                var totalnilai = $('[name="Totalnilai"]').text()
                $('[name="countnilaiinEdit"]').text(totalnilai)

                // Dapatkan elemen input dan elemen tampilkan nilai
                var inputs = $('input[name="nilai"]');
                var countnilai = $('[name="countnilaiinEdit"]');

                // Mendapatkan nilai awal input dari atribut data-original-value
                inputs.each(function() {
                    var originalValue = $(this).data('original-value');
                    $(this).val(originalValue);
                });

                $('[name="nilai"]').on('input change', function() {
                    var totalnilai = 0;

                    // Simpan nilai input sebelumnya
                    var previousValue = $(this).data('original-value') || '';

                    // Hitung total nilai dari setiap input
                    inputs.each(function() {
                        var nilai = parseFloat($(this).val()) || 0;
                        totalnilai += nilai;
                    });

                    // Batasi total nilai hingga maksimal 1
                    if (totalnilai > 1) {
                        totalnilai = nilai;
                        // Hapus inputan baru yang dilakukan pengguna
                        $(this).val(previousValue);
                        alert('Total nilai exceeded the limit, maximum 1')
                    }

                    // Tampilkan total nilai di elemen countnilai
                    countnilai.text(totalnilai.toFixed(4));
                })


                // Mendapatkan nilai original input sample
                var inputsample = $('input[name="sample"]');
                // Mendapatkan nilai awal input dari atribut data-original-value
                inputsample.each(function() {
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

            if (parseFloat($('#Totalnilai').text()) >= 1 || parseFloat($('#Totalnilai').text()) >=
                1.0) {
                $('#BtnAdd').prop('disabled', true);
            } else {
                $('#BtnAdd').prop('disabled', false);
            }

        })
    </script> -->
@endsection

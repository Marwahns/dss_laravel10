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
    <div class="w-full px-6 py-6 mx-auto">

        {{-- Alert total weight --}}
        <div id="alert-total-weight"
            class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 hidden"
            role="alert">
            <div class="flex items-center">
                <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <h3 class="text-lg font-medium text-white">Total Weight tidak sesuai</h3>
            </div>
            <div class="mt-2 mb-4 text-sm text-white">
                Total Weight harus 1, Total weight sekarang <span id="currentTotalWeight"></span>
            </div>
            <div class="flex">
                <a href="{{ route('criteria.index') }}"
                    class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    <svg class="-ml-0.5 mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 14">
                        <path
                            d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                    </svg>
                    View more
                </a>
                <button type="button"
                    class="text-red-800 bg-transparent border border-red-800 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800"
                    data-dismiss-target="#alert-total-weight" aria-label="Close">
                    Dismiss
                </button>
            </div>
        </div>

        {{-- Alert total alternative --}}
        <div id="alert-total-alternative"
            class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
            role="alert">
            <div class="flex items-center">
                <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <h3 class="text-lg font-medium text-white">Total Sample Alternative tidak sesuai</h3>
            </div>
            <div class="mt-2 mb-4 text-sm text-white">
                Total Sample Alternative minimal 2, Total sample alternative sekarang <span
                    id="current-total-alternative"></span>
            </div>
            <div class="flex">
                <a href="{{ route('criteria.index') }}"
                    class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    <svg class="-ml-0.5 mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 14">
                        <path
                            d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                    </svg>
                    View more
                </a>
                <button type="button"
                    class="text-red-800 bg-transparent border border-red-800 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800"
                    data-dismiss-target="#alert-total-alternative" aria-label="Close">
                    Dismiss
                </button>
            </div>
        </div>

        {{-- Alert kondisi acceptable --}}
        <div id="alert-acceptable-advantage" class="hidden">
            @if ($acceptableAdvantage && $data['acceptableStability'])
                <div id="alert-border-3"
                    class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ml-3 text-sm font-medium">
                        Alternatif memenuhi kondisi Acceptable Advantage dan Acceptable Stability
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
            @else
                <div id="alert-border-4"
                    class="flex items-center p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ml-3 text-sm font-medium">
                        Alternatif tidak memenuhi kondisi Acceptable Advantage dan Acceptable Stability
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-border-4" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
        </div>

        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <div class="flex flex-wrap justify-between -mx-3 mb-4">
                        <div class="flex flex-none text-left w-auto max-w-full px-3">
                            <button
                                class="inline-block text-white px-6 py-3 font-bold bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 btnCalculate"
                                id="btnCalculate"><i class="fas fa-plus"> </i>&nbsp;&nbsp;Calculate
                            </button>
                        </div>
                        <div class="flex flex-none text-right w-auto max-w-full">
                            <button
                                class="text-white px-6 py-3 font-bold bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hidden btnAcceptable"
                                id="btnAcceptable"><i class="fas fa-plus"> </i>&nbsp;&nbsp;Check Acceptable
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Langkah pertama : menyusun alternatif dan kriteria ke dalam bentuk matriks keputusan (F) sebagai berikut: --}}
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="flex items-center flex-none max-w-full px-3">
                                <h6 class="mb-0" id="SubTitle"><b>Langkah pertama:</b> menyusun alternatif dan kriteria
                                    ke dalam bentuk matriks keputusan (F) sebagai berikut:</h6>
                            </div>
                        </div>
                    </div>

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

                                        <!-- Alternative -->
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Alternative</th>

                                        @foreach ($criterias as $criteria)
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                {{ $criteria->criteria }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Iterasi alternatif --}}
                                    @forelse ($getAlternative as $alternative)
                                        <tr>
                                            <!-- Nomor -->
                                            <td
                                                class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $loop->iteration }}</span>
                                            </td>

                                            <!-- Alternative -->
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div class="flex flex-col justify-center">
                                                        <p class="mb-0 text-xs leading-tight text-slate-400">
                                                            {{ $alternative['nama_alternative'] }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            @foreach ($criterias as $criteria)
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <div class="flex px-2 py-1 justify-center">
                                                        <div class="flex flex-col justify-center">
                                                            <p class="mb-0 text-xs leading-tight text-slate-400">
                                                                {{ $alternative['nilai_c' . $criteria->id] }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endforeach

                                        </tr>
                                    @empty
                                        <div class="alert alert-danger flex justify-center">
                                            Data Post belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                    <h6 class="mb-0">Total Alternatif: <h6 id="countAlternative"
                                            name="countAlternative" class="ml-1">
                                            {{ $jumlahDataAlternative }}</h6>
                                    </h6>
                                </div>
                            </div>
                            {{ $samples->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>

                {{-- Langkah kedua : menentukan bobot kriteria. Berdasarkan data yang diberikan di atas, maka diperoleh data bobot kriteria (W) sebagai berikut: --}}
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="flex items-center flex-none max-w-full px-3">
                                <h6 class="mb-0" id="SubTitle"><b>Langkah kedua: </b>menentukan bobot kriteria.
                                    Berdasarkan data bobot kriteria yang sudah di masukkan, maka diperoleh data bobot
                                    kriteria (W) sebagai berikut:</h6>
                            </div>
                        </div>
                    </div>

                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <!-- Criteria Weight -->
                                        @foreach ($criterias as $criteria)
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                {{ $criteria->criteria }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- Criteria -->
                                        @foreach ($criterias as $criteria)
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1 justify-center">
                                                    <div class="flex flex-col justify-center">
                                                        <p class="mb-0 text-xs leading-tight text-slate-400">
                                                            {{ $criteria->weight }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                    <h6 class="mb-0">Total Weight: <h6 id="TotalWeight" name="TotalWeight"
                                            class="ml-1">
                                            {{ number_format($totalWeight, 4) }}</h6>
                                    </h6>
                                </div>
                            </div>
                            {{ $samples->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>

                {{-- Langkah Ketiga: Menghitung Nilai Positif (F+) dan Negatif (F-) Sebagai Solusi Ideal Dari Setiap Kriteria --}}
                <div class="relative flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border hidden"
                    id="step-3">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="flex items-center flex-none max-w-full px-3">
                                <h6 class="mb-0" id="SubTitle"><b>Langkah ketiga: </b>Menghitung Nilai Positif (F+) dan
                                    Negatif (F-) Sebagai Solusi Ideal Dari Setiap Kriteria</h6>
                            </div>
                        </div>
                    </div>

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

                                        <!-- Criteria -->
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Alternative
                                        </th>

                                        @foreach ($criterias as $criteria)
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                {{ $criteria->criteria }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Criteria Weight -->
                                    @foreach ($getAlternative as $alternative)
                                        <tr>
                                            <!-- Nomor -->
                                            <td
                                                class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $loop->iteration }}</span>
                                            </td>

                                            <!-- Alternative -->
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div class="flex flex-col justify-center">
                                                        <p class="mb-0 text-xs leading-tight text-slate-400">
                                                            {{ $alternative['nama_alternative'] }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            @foreach ($criterias as $criteria)
                                                <td
                                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                    <div class="flex px-2 py-1 justify-center">
                                                        <div class="flex flex-col justify-center">
                                                            <p class="mb-0 text-xs leading-tight text-slate-400">
                                                                {{ $alternative['nilai_c' . $criteria->id] }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endforeach

                                        </tr>
                                    @endforeach
                                    <!-- F+ and F- rows -->
                                    <tr>
                                        <!-- Nomor -->
                                        <td
                                            class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                            <span class="text-xs font-semibold leading-tight text-slate-400"></span>
                                        </td>

                                        <td
                                            class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <p class="mb-0 text-xs leading-tight text-slate-400">F+</p>
                                                </div>
                                            </div>
                                        </td>

                                        @foreach ($maxValues as $criteriaId => $maxValue)
                                            <td
                                                class="px-6 py-3 text-center font-bold lign-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $maxValue }}</span>
                                            </td>
                                        @endforeach
                                    </tr>

                                    <tr>
                                        <!-- Nomor -->
                                        <td
                                            class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                            <span class="text-xs font-semibold leading-tight text-slate-400"></span>
                                        </td>

                                        <td
                                            class="p-2 te align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <p class="mb-0 text-xs leading-tight text-slate-400">F-</p>
                                                </div>
                                            </div>
                                        </td>

                                        @foreach ($minValues as $criteriaId => $minValue)
                                            <td
                                                class="px-6 py-3 text-center font-bold lign-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $minValue }}</span>
                                            </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                            {{ $samples->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>

                {{-- Langkah Keempat: Menghitung matriks normalisasi (N) --}}
                <div class="relative hidden flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border"
                    id="step-4">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="flex items-center flex-none max-w-full px-3">
                                <h6 class="mb-0" id="SubTitle"><b>Langkah keempat:</b> Menghitung matriks normalisasi
                                    (N)
                                </h6>
                            </div>
                        </div>
                    </div>

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

                                        <!-- Alternative -->
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Alternative</th>

                                        @foreach ($criterias as $criteria)
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                {{ $criteria->criteria }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Iterasi alternatif --}}
                                    @forelse ($getAlternative as $alternative)
                                        <tr>
                                            <!-- Nomor -->
                                            <td
                                                class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $loop->iteration }}</span>
                                            </td>

                                            <!-- Alternative -->
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div class="flex flex-col justify-center">
                                                        <p class="mb-0 text-xs leading-tight text-slate-400">
                                                            {{ $alternative['nama_alternative'] }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            @foreach ($matrixNormalized[$loop->index] as $value)
                                                <td
                                                    class="px-6 py-3 text-center font-bold lign-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                    <span
                                                        class="text-xs font-semibold leading-tight text-slate-400">{{ number_format($value, 2) }}</span>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger flex justify-center">
                                            Data Post belum Tersedia.
                                        </div>
                                    @endforelse

                                </tbody>
                            </table>
                            {{ $samples->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>

                {{-- Langkah Kelima: Menghitung bobot normalisasi (F*) --}}
                <div class="relative hidden flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border"
                    id="step-5">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="flex items-center flex-none max-w-full px-3">
                                <h6 class="mb-0" id="SubTitle"><b>Langkah kelima:</b> Menghitung bobot normalisasi (F*)
                                </h6>
                            </div>
                        </div>
                    </div>

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

                                        <!-- Alternative -->
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Alternative</th>

                                        @foreach ($criterias as $criteria)
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                {{ $criteria->criteria }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Iterasi alternatif --}}
                                    @forelse ($getAlternative as $index => $alternative)
                                        <tr>
                                            <!-- Nomor -->
                                            <td
                                                class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $loop->iteration }}</span>
                                            </td>

                                            <!-- Alternative -->
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div class="flex flex-col justify-center">
                                                        <p class="mb-0 text-xs leading-tight text-slate-400">
                                                            {{ $alternative['nama_alternative'] }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            @foreach ($weightedNormalizedValues[$index] as $value)
                                                <td
                                                    class="px-6 py-3 text-center font-bold lign-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                    <span
                                                        class="text-xs font-semibold leading-tight text-slate-400">{{ number_format($value, 2) }}</span>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger flex justify-center">
                                            Data Post belum Tersedia.
                                        </div>
                                    @endforelse

                                </tbody>
                            </table>
                            {{ $samples->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>

                {{-- Langkah Keenam: Menghitung utility measure (S) dan (R) dari setiap alternatif --}}
                <div class="relative hidden flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border"
                    id="step-6">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="flex items-center flex-none max-w-full px-3">
                                <h6 class="mb-0" id="SubTitle"><b>Langkah keenam:</b> Menghitung utility measure (S)
                                    dan (R) dari setiap alternatif
                                </h6>
                            </div>
                        </div>
                    </div>

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

                                        <!-- Alternative -->
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Alternative</th>

                                        <th
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            S(i)</th>

                                        <th
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            R(i)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Iterasi alternatif --}}
                                    @forelse ($getAlternative as $index => $alternative)
                                        <tr>
                                            <!-- Nomor -->
                                            <td
                                                class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $loop->iteration }}</span>
                                            </td>

                                            <!-- Alternative -->
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div class="flex flex-col justify-center">
                                                        <p class="mb-0 text-xs leading-tight text-slate-400">
                                                            {{ $alternative['nama_alternative'] }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td
                                                class="px-6 py-3 font-bold lign-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ number_format($utilityMeasuresS[$index], 2) }}</span>
                                            </td>

                                            <td
                                                class="px-6 py-3 font-bold lign-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ number_format($utilityMeasuresR[$index], 2) }}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger flex justify-center">
                                            Data Post belum Tersedia.
                                        </div>
                                    @endforelse

                                </tbody>
                            </table>
                            {{ $samples->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>

                {{-- Langkah Ketujuh: Menghitung indeks VIKOR (Q) --}}
                <div class="relative hidden flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border"
                    id="step-7">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3">
                            <div class="block items-center flex-none max-w-full px-3">
                                <div>
                                    <h6 class="mb-0"><b>Langkah ketujuh:</b> Menghitung indeks VIKOR (Q)</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="block items-center flex-none max-w-full px-3">
                                <div>
                                    <h6 class="mb-0">Sebelum menghitung nilai indeks VIKOR (Q) dari tiap alternatif,
                                        perlu dihitung terlebih dahulu nilai-nilai S+, S-, R+, dan R-</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <!-- Nomor -->
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            S+
                                        </th>

                                        <!-- Alternative -->
                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            S-</th>

                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            R+</th>

                                        <th
                                            class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            R-</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Iterasi alternatif --}}
                                    <tr>
                                        <!-- Nomor -->
                                        <td
                                            class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                            <span
                                                class="text-xs font-semibold leading-tight text-slate-400">{{ number_format(max($utilityMeasuresS), 2) }}</span>
                                        </td>

                                        <td
                                            class="px-6 py-3 font-bold text-center lign-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                            <span
                                                class="text-xs font-semibold leading-tight text-slate-400">{{ number_format(min($utilityMeasuresS), 2) }}</span>
                                        </td>

                                        <td
                                            class="px-6 py-3 font-bold text-center lign-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                            <span
                                                class="text-xs font-semibold leading-tight text-slate-400">{{ number_format(max($utilityMeasuresR), 2) }}</span>
                                        </td>

                                        <td
                                            class="px-6 py-3 font-bold text-center lign-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                            <span
                                                class="text-xs font-semibold leading-tight text-slate-400">{{ number_format(min($utilityMeasuresR), 2) }}</span>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="block items-center flex-none max-w-full px-3">
                                <div>
                                    <h6 class="mb-0">Perhitungan nilai indeks VIKOR dari setiap alternatif</h6>
                                    <p class="mb-0 mt-1 text-xs leading-normal text-black">V = 0.5</p>
                                </div>
                            </div>
                        </div>
                    </div>

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

                                        <!-- Alternative -->
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Alternative</th>

                                        <th
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Q(i)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Iterasi alternatif --}}
                                    @forelse ($getAlternative as $index => $alternative)
                                        <tr>
                                            <!-- Nomor -->
                                            <td
                                                class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $loop->iteration }}</span>
                                            </td>

                                            <!-- Alternative -->
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div class="flex flex-col justify-center">
                                                        <p class="mb-0 text-xs leading-tight text-slate-400">
                                                            {{ $alternative['nama_alternative'] }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td
                                                class="px-6 py-3 font-bold lign-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ number_format($Qs[$index], 4) }}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger flex justify-center">
                                            Data Post belum Tersedia.
                                        </div>
                                    @endforelse

                                </tbody>
                            </table>
                            {{ $samples->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>

                {{-- Langkah Kedelapan: Merangking alternatif dengan mengurutkan mulai dari nilai Qi terkecil --}}
                <div class="relative hidden flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border"
                    id="step-8">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="flex items-center flex-none max-w-full px-3">
                                <h6 class="mb-0" id="SubTitle"><b>Langkah kedelapan: </b> Merangking alternatif dengan
                                    mengurutkan mulai dari nilai Qi terkecil
                                </h6>
                            </div>
                        </div>
                    </div>

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

                                        <!-- Alternative -->
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Alternative</th>

                                        <th
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Q(i)</th>

                                        <th
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Rank</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Iterasi alternatif --}}
                                    @forelse ($rankings as $rank => $ranking)
                                        <tr>
                                            <!-- Nomor -->
                                            <td
                                                class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $loop->iteration }}</span>
                                            </td>

                                            <!-- Alternative -->
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div class="flex flex-col justify-center">
                                                        <p class="mb-0 text-xs leading-tight text-slate-400">
                                                            {{ $ranking[0]['nama_alternative'] }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Q(i) -->
                                            <td
                                                class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                {{ number_format($ranking[1], 4) }}
                                            </td>

                                            <!-- Rank -->
                                            <td
                                                class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                {{ $rank + 1 }}
                                            </td>

                                        </tr>
                                    @empty
                                        <div class="alert alert-danger flex justify-center">
                                            Data Post belum Tersedia.
                                        </div>
                                    @endforelse

                                </tbody>
                            </table>
                            {{ $samples->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>

                {{-- Langkah Kesembilan: Melakukan solusi kompromi dua solusi --}}
                <div class="relative hidden flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border"
                    id="step-9">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="flex items-center flex-none max-w-full px-3">
                                <div>
                                    <h6 class="mb-0"><b>Langkah kesembilan: </b> Melakukan solusi kompromi
                                        dua solusi
                                    </h6>

                                    <h6 class="mb-0 mt-1">Solusi kompromi dapat diusulkan dengan membuktikan kedua kondisi.
                                        Dalam pembuktian solusi kompromi ini digunakan nilai v (nilai bobot strategy of the
                                        maximum group utility) masing-masing adalah v=0.45 (with veto), v=0.5 (by
                                        concensus), dan v=0.55 (voting by majority rule)</h6>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="block items-center flex-none max-w-full px-3">
                                <div>
                                    <h6 class="mb-0">Pembuktian kondisi Acceptable advantage</h6>
                                    <br>
                                    <p class="mb-0 text-xs leading-normal text-black">DQ = 1 / (m - 1)</p>
                                    <br>
                                    <p class="mb-0 text-xs leading-normal text-black">m = Jumlah kriteria</p>
                                    <br>
                                    <p class="mb-0 text-xs leading-normal text-black">DQ =
                                        <span id="dq">{{ number_format(1 / (count($criterias) - 1), 4) }}</span>
                                    </p>
                                    <br>
                                    <p class="mb-0 text-xs leading-normal text-black">QA2 - QA1 =
                                        <span id="difference">{{ $difference }}</span>
                                    </p>
                                    <br>
                                    <h6 class="mb-0">Nilai selisih yang dihasilkan
                                        <span id="valueDifference"></span> nilai DQ,
                                        sehingga <b>kondisi Acceptable advantage
                                            <span id="conditionAdvantage"></span>
                                        </b>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="flex items-center flex-none max-w-full px-3">
                                <div>
                                    <h6 class="mb-0">Pembuktian kondisi Acceptable stability in decision making </h6>
                                    <br>
                                    <p class="mb-0 text-xs leading-normal text-black">V = 0.45</p>
                                </div>
                            </div>
                        </div>
                    </div>

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

                                        <!-- Alternative -->
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Alternative</th>

                                        <th
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Q(i)</th>

                                        <th
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Qm - QBest</th>

                                        <th
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Rank</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Iterasi alternatif --}}
                                    @forelse ($rankingsB as $rank => $ranking)
                                        <tr>
                                            <!-- Nomor -->
                                            <td
                                                class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $loop->iteration }}</span>
                                            </td>

                                            <!-- Alternative -->
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div class="flex flex-col justify-center">
                                                        <p class="mb-0 text-xs leading-tight text-slate-400">
                                                            {{ $ranking[0]['nama_alternative'] }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Q(i) -->
                                            <td
                                                class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                {{ number_format($ranking[1], 4) }}
                                            </td>

                                            <!-- Qm - QBest -->
                                            <td
                                                class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                {{ $differenceQiB[$rank] }}
                                            </td>

                                            <!-- Rank -->
                                            <td
                                                class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                {{ $rank + 1 }}
                                            </td>

                                        </tr>
                                    @empty
                                        <div class="alert alert-danger flex justify-center">
                                            Data Post belum Tersedia.
                                        </div>
                                    @endforelse

                                </tbody>
                            </table>
                            {{ $samples->links('pagination::tailwind') }}
                        </div>
                    </div>

                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="flex items-center flex-none max-w-full px-3">
                                <div>
                                    <p class="mb-0 text-xs leading-normal text-black">V = 0.55</p>
                                </div>
                            </div>
                        </div>
                    </div>

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

                                        <!-- Alternative -->
                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Alternative</th>

                                        <th
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Q(i)</th>

                                        <th
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Qm - QBest</th>

                                        <th
                                            class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            Rank</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Iterasi alternatif --}}
                                    @forelse ($rankingsC as $rank => $ranking)
                                        <tr>
                                            <!-- Nomor -->
                                            <td
                                                class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $loop->iteration }}</span>
                                            </td>

                                            <!-- Alternative -->
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div class="flex flex-col justify-center">
                                                        <p class="mb-0 text-xs leading-tight text-slate-400">
                                                            {{ $ranking[0]['nama_alternative'] }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Q(i) -->
                                            <td
                                                class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                {{ number_format($ranking[1], 4) }}
                                            </td>

                                            <!-- Qm - QBest -->
                                            <td
                                                class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                {{ $differenceQiC[$rank] }}
                                            </td>

                                            <!-- Rank -->
                                            <td
                                                class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                {{ $rank + 1 }}
                                            </td>

                                        </tr>
                                    @empty
                                        <div class="alert alert-danger flex justify-center">
                                            Data Post belum Tersedia.
                                        </div>
                                    @endforelse

                                </tbody>
                            </table>
                            {{ $samples->links('pagination::tailwind') }}
                        </div>
                    </div>

                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="flex items-center flex-none max-w-full px-3">
                                <div>
                                    <h6 class="mb-0">Hasil peringkat terbaik dari perankingan dengan v=0.55 adalah
                                        <span id="alternativeWithMinQs">{{ $alternativeWithMinQs }}</span>, yang sama
                                        dengan peringkat terbaik dari perankingan Q. Hasil peringkat terbaik dari
                                        perankingan dengan 0.45 adalah
                                        <span id="alternativeWithMinQsB">{{ $alternativeWithMinQsB }}</span> dan 0.5
                                        adalah
                                        <span id="alternativeWithMinQsC">{{ $alternativeWithMinQsC }}</span> , yang sama
                                        dengan peringkat terbaik dari perankingan Q. Berdasarkan hasil yang diperoleh dapat
                                        dibuktikan bahwa <b>kondisi Acceptable stability in decision making
                                            <span id="showCondition"></span>
                                        </b>
                                    </h6> <br>
                                    <h6 class="mb-0">Berdasarkan hasil pembuktian kedua kondisi dapat diketahui bahwa
                                        kedua kondisi tersebut <b>
                                            <span id="showCondition2"></span>
                                        </b></h6> <br>
                                    <h6 class="mb-0 hidden" id="showNameAlternative"> <b>{{ $alternativeWithMinQs }}</b>
                                        dapat diusulkan menjadi solusi
                                        kompromi dan merupakan peringkat terbaik dari perankingan penerima beasiswa dengan
                                        metode VIKOR</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

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

    <script>
        $(document).ready(function() {
            var countAlternative = parseInt($('#countAlternative').text())
            var totalWeight = $('#TotalWeight').text()
            $('#current-total-alternative').text(countAlternative)
            $('#currentTotalWeight').text(totalWeight)

            // TotalWeight
            if (parseFloat($('#TotalWeight').text()) != 1 || countAlternative < 2) {
                $('#btnCalculate').prop('disabled', true);
            } else {
                $('#btnCalculate').prop('disabled', false);
            }

            if (parseFloat($('#TotalWeight').text()) != 1) {
                $('#alert-total-weight').removeClass('hidden');
            } else if (countAlternative < 2) {
                $('#alert-total-alternative').removeClass('hidden');
            } else if (parseFloat($('#TotalWeight').text()) != 1 && countAlternative < 2) {
                $('#alert-total-weight').removeClass('hidden');
                $('#alert-total-alternative').removeClass('hidden');
            }

            // btnCalculate
            $('#btnCalculate').click(function() {
                $('#btnAcceptable').removeClass('hidden');
                $('#step-3').removeClass('hidden');
                $('#step-4').removeClass('hidden');
                $('#step-5').removeClass('hidden');
                $('#step-6').removeClass('hidden');
                $('#step-7').removeClass('hidden');
                $('#step-8').removeClass('hidden');
            });

            // btnAcceptable
            $('#btnAcceptable').click(function() {
                $('#step-9').removeClass('hidden');
                $('#alert-acceptable-advantage').removeClass('hidden');
            });

            // conditionAdvantage
            var difference = $('#difference ').text()
            var dq = $('#dq').text()

            if (difference > dq) {
                $('#valueDifference').text('lebih besar dari')
                $('#conditionAdvantage').text('terpenuhi');
            } else if (difference < dq) {
                $('#valueDifference').text('kurang dari')
                $('#conditionAdvantage').text('tidak terpenuhi');
            } else if (difference == dq) {
                $('#valueDifference').text('sama dengan')
                $('#conditionAdvantage').text('terpenuhi');
            }

            // showCondition
            var alternativeWithMinQs = $('#alternativeWithMinQs').text();
            var alternativeWithMinQsB = $('#alternativeWithMinQsB').text();
            var alternativeWithMinQsC = $('#alternativeWithMinQsC').text();

            if (alternativeWithMinQs === alternativeWithMinQsB && alternativeWithMinQs === alternativeWithMinQsC) {
                $('#showCondition').text('terpenuhi');
            } else {
                $('#showCondition').text('tidak terpenuhi');
            }

            // showCondition2
            var showConditionAdvantage = $('#conditionAdvantage').text();
            var showConditionStability = $('#showCondition').text();

            if (showConditionAdvantage === showConditionStability) {
                $('#showCondition2').text('terpenuhi');
            } else {
                $('#showCondition2').text('tidak terpenuhi');
            }

        })
    </script>
@endsection

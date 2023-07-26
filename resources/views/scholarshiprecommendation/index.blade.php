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
        <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">{{ $breadcrumb }}</li>
    </ol>
    <h6 class="mb-0 font-bold capitalize">{{ $breadcrumb }}</h6>
</nav>
@endsection

@section('content')
<div class="w-full px-6 py-6 mx-auto">

    {{-- Alert criteria --}}
    <div id="alert-criteria" class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 hidden" role="alert">
        <div class="flex items-center">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium text-white"> Jumlah criteria tidak sesuai</h3>
        </div>
        <div class="mt-2 mb-4 text-sm text-white">
            Jumlah criteria minimal 2, jumlah criteria sekarang <span id="countCriteria"></span>
        </div>
        <div class="flex">
            <a href="{{ route('criteria.index') }}" class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <svg class="-ml-0.5 mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                    <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                </svg>
                View more
            </a>
            <button type="button" class="text-red-800 bg-transparent border border-red-800 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800" data-dismiss-target="#alert-criteria" aria-label="Close">
                Dismiss
            </button>
        </div>
    </div>

    {{-- Alert total weight --}}
    <div id="alert-total-weight" class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 hidden" role="alert">
        <div class="flex items-center">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium text-white">Total Weight tidak sesuai</h3>
        </div>
        <div class="mt-2 mb-4 text-sm text-white">
            Total Weight harus 1, Total weight sekarang <span id="currentTotalWeight"></span>
        </div>
        <div class="flex">
            <a href="{{ route('criteria.index') }}" class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <svg class="-ml-0.5 mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                    <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                </svg>
                View more
            </a>
            <button type="button" class="text-red-800 bg-transparent border border-red-800 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800" data-dismiss-target="#alert-total-weight" aria-label="Close">
                Dismiss
            </button>
        </div>
    </div>

    {{-- Alert total alternative --}}
    <div id="alert-total-alternative" class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 hidden" role="alert">
        <div class="flex items-center">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <h3 class="text-lg font-medium text-white">Total Sample Alternative tidak sesuai</h3>
        </div>
        <div class="mt-2 mb-4 text-sm text-white">
            Total Sample Alternative minimal 2, Total sample alternative sekarang <span id="current-total-alternative"></span>
        </div>
        <div class="flex">
            <a href="{{ route('criteria.index') }}" class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <svg class="-ml-0.5 mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                    <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                </svg>
                View more
            </a>
            <button type="button" class="text-red-800 bg-transparent border border-red-800 hover:bg-red-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-red-600 dark:border-red-600 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800" data-dismiss-target="#alert-total-alternative" aria-label="Close">
                Dismiss
            </button>
        </div>
    </div>

    {{-- Alert kondisi acceptable --}}
    <div id="alert-acceptable-advantage" class="hidden">
        @if ($dataCheckAcceptableAdvantage['acceptableAdvantage'] && $dataCheckAcceptableStability['acceptableStability'])
        <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ml-3 text-sm font-medium">
                Alternatif memenuhi kondisi Acceptable Advantage dan Acceptable Stability
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-3" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        @else
        <div id="alert-border-4" class="flex items-center p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ml-3 text-sm font-medium">
                Alternatif tidak memenuhi kondisi Acceptable Advantage dan Acceptable Stability
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-4" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        @endif
    </div>

    <div>

    </div>

    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <div class="flex flex-wrap justify-between -mx-3 mb-4">
                    <div class="flex flex-none text-right w-auto max-w-full">
                        <button class="text-white px-6 py-3 font-bold bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hidden btnAcceptable" id="btnAcceptable"><i class="fas fa-plus"> </i>&nbsp;&nbsp;Check Acceptable
                        </button>
                    </div>
                </div>
            </div>

            {{-- Report Hasil Perhitungan berdasarkan nilai Q terkecil  --}}
            @include('calculation.step.stepEight')

            {{-- Langkah pertama : menyusun alternatif dan kriteria ke dalam bentuk matriks keputusan (F) sebagai berikut: --}}
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
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
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        #
                                    </th>

                                    <!-- Alternative -->
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Alternative</th>

                                    @foreach ($criterion as $criteria)
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        {{ $criteria->criteria }}
                                    </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Iterasi alternatif --}}
                                @forelse ($getAlternative as $alternative)
                                <tr>
                                    <!-- Nomor -->
                                    <td class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                        <span class="text-xs font-semibold leading-tight text-slate-400">{{ $loop->iteration }}</span>
                                    </td>

                                    <!-- Alternative -->
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div class="flex flex-col justify-center">
                                                <p class="mb-0 text-xs leading-tight text-slate-400">
                                                    {{ $alternative['nama_alternative'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    @foreach ($criterion as $criteria)
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
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
                                    Data Scholarship Recommendation belum Tersedia.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                                <h6 class="mb-0">Total Alternatif: <h6 id="countAlternative" name="countAlternative" class="ml-1">
                                        {{ $countDataAlternative }}
                                    </h6>
                                </h6>
                            </div>
                        </div>
                        {{-- {{ $samples->links('pagination::tailwind') }} --}}
                    </div>
                </div>
            </div>

            {{-- Langkah kedua : menentukan bobot kriteria. Berdasarkan data yang diberikan di atas, maka diperoleh data bobot kriteria (W) sebagai berikut: --}}
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
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
                                    @foreach ($criterion as $criteria)
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        {{ $criteria->criteria }}
                                    </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- Criteria -->
                                    @foreach ($criterion as $criteria)
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
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
                                <div class="block">
                                    <h6 class="mb-0">Total Criteria: <span id="countDataCriteria" name="countDataCriteria" class="ml-1">
                                            {{ $countDataCriteria }}</span>
                                    </h6>
                                    <h6 class="mb-0">Total Weight: <span id="TotalWeight" name="TotalWeight" class="ml-1">
                                            {{ number_format($totalWeight, 4) }}</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        {{-- {{ $samples->links('pagination::tailwind') }} --}}
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
                        <a href="https://www.creative-tim.com" class="font-semibold text-slate-700" target="_blank">Annisa & Creative Tim</a>
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
        var countCriteria = parseInt($('#countDataCriteria').text())
        $('#current-total-alternative').text(countAlternative)
        $('#currentTotalWeight').text(totalWeight)
        $('#countCriteria').text(countCriteria)

        // TotalWeight
        if (parseFloat($('#TotalWeight').text()) != 1 || countCriteria < 2 || countAlternative < 2) {
            $('#btnCalculate').prop('disabled', true);
        } else {
            $('#btnCalculate').prop('disabled', false);
        }

        if (parseFloat($('#TotalWeight').text()) != 1) {
            $('#alert-total-weight').removeClass('hidden');
        } else if (countAlternative < 2) {
            $('#alert-total-alternative').removeClass('hidden');
        } else if (countCriteria < 2) {
            $('#alert-criteria').removeClass('hidden');
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
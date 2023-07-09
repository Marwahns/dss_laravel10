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
                                    @php
                                        $i = 1;
                                    @endphp
                                    {{-- Iterasi alternatif --}}
                                    @forelse ($getAlternative as $alternative)
                                        <tr>
                                            <!-- Nomor -->
                                            <td
                                                class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $i++ }}</span>
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
                            {{ $samples->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>

                {{-- Langkah Ketiga: Menghitung Nilai Positif (F+) dan Negatif (F-) Sebagai Solusi Ideal Dari Setiap Kriteria --}}
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
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
                            @php
                                $maxValues = []; // Initialize an array to store the maximum values per column
                                $minValues = []; // Initialize an array to store the minimum values per column
                                
                                // Initialize the maxValues array with all criteria IDs
                                foreach ($criterias as $criteria) {
                                    $maxValues[$criteria->id] = null;
                                }
                                
                                // Initialize the minValues array with all criteria IDs
                                foreach ($criterias as $criteria) {
                                    $minValues[$criteria->id] = null;
                                }
                            @endphp

                            @foreach ($getAlternative as $alternative)
                                @foreach ($criterias as $criteria)
                                    @php
                                        $criteriaValue = $alternative['nilai_c' . $criteria->id];
                                        $maxValue = is_array($criteriaValue) ? max($criteriaValue) : $criteriaValue;
                                        $minValue = is_array($criteriaValue) ? min($criteriaValue) : $criteriaValue;
                                        
                                        // Update the maximum value per column if necessary
                                        if ($maxValue !== null && ($maxValues[$criteria->id] === null || $maxValue > $maxValues[$criteria->id])) {
                                            $maxValues[$criteria->id] = $maxValue;
                                        }
                                        
                                        // Update the minimum value per column if necessary
                                        if ($minValue !== null && ($minValues[$criteria->id] === null || $minValue < $minValues[$criteria->id])) {
                                            $minValues[$criteria->id] = $minValue;
                                        }
                                    @endphp
                                @endforeach
                            @endforeach

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
                                    @php
                                        $i = 1;
                                    @endphp

                                    <!-- Criteria Weight -->
                                    @foreach ($getAlternative as $alternative)
                                        <tr>
                                            <!-- Nomor -->
                                            <td
                                                class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $i++ }}</span>
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
                                            <span
                                                class="text-xs font-semibold leading-tight text-slate-400">{{ $i++ }}</span>
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
                                            <span
                                                class="text-xs font-semibold leading-tight text-slate-400">{{ $i++ }}</span>
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
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="flex items-center flex-none max-w-full px-3">
                                <h6 class="mb-0" id="SubTitle"><b>Langkah keempat:</b> Menghitung matriks normalisasi (N)
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">

                            @php
                                $maxValues = []; // Initialize an array to store the maximum values per column
                                $minValues = []; // Initialize an array to store the minimum values per column
                                $matrixNormalized = [];
                                
                                // Initialize the maxValues and minValues arrays with all criteria IDs
                                foreach ($criterias as $criteria) {
                                    $maxValues[$criteria->id] = null;
                                    $minValues[$criteria->id] = null;
                                }
                                
                                // Find the maximum and minimum values per column
                                foreach ($criterias as $criteria) {
                                    foreach ($getAlternative as $alternative) {
                                        $criteriaValue = $alternative['nilai_c' . $criteria->id];
                                
                                        // Update the maximum value per column if necessary
                                        if ($maxValues[$criteria->id] === null || $criteriaValue > $maxValues[$criteria->id]) {
                                            $maxValues[$criteria->id] = $criteriaValue;
                                        }
                                
                                        // Update the minimum value per column if necessary
                                        if ($minValues[$criteria->id] === null || $criteriaValue < $minValues[$criteria->id]) {
                                            $minValues[$criteria->id] = $criteriaValue;
                                        }
                                    }
                                }
                                
                                // Calculate the normalized values
                                foreach ($getAlternative as $alternative) {
                                    $normalizedRow = [];
                                
                                    foreach ($criterias as $criteria) {
                                        $criteriaValue = $alternative['nilai_c' . $criteria->id];
                                        $maxValue = $maxValues[$criteria->id];
                                        $minValue = $minValues[$criteria->id];
                                
                                        // Calculate the normalized value using the formula
                                        $normalizedValue = ($maxValue - $criteriaValue) / ($maxValue - $minValue);
                                        $normalizedRow[] = $normalizedValue;
                                    }
                                
                                    $matrixNormalized[] = $normalizedRow;
                                }
                            @endphp

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
                                    @php
                                        $i = 1;
                                    @endphp
                                    {{-- Iterasi alternatif --}}
                                    @forelse ($getAlternative as $alternative)
                                        <tr>
                                            <!-- Nomor -->
                                            <td
                                                class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $i++ }}</span>
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
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
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

                            @php
                                $weightedNormalizedValues = [];
                                
                                // Iterate over each alternative
                                foreach ($matrixNormalized as $index => $row) {
                                    $weightedRow = [];
                                
                                    // Iterate over each criterion
                                    foreach ($criterias as $criteria) {
                                        $criteriaId = $criteria->id;
                                        $normalizedValue = $row[$criteriaId - 1];
                                        $weight = $criteria->weight;
                                
                                        // Multiply the normalized value by the criterion weight
                                        $weightedValue = $normalizedValue * $weight;
                                
                                        $weightedRow[] = $weightedValue;
                                    }
                                
                                    $weightedNormalizedValues[$index] = $weightedRow;
                                }
                            @endphp

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
                                    @php
                                        $i = 1;
                                    @endphp
                                    {{-- Iterasi alternatif --}}
                                    @forelse ($getAlternative as $index => $alternative)
                                        <tr>
                                            <!-- Nomor -->
                                            <td
                                                class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $i++ }}</span>
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
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
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

                            @php
                                $weights = [];
                                
                                // Retrieve the weights from the criteria table
                                foreach ($criterias as $criteria) {
                                    $weights[] = $criteria->weight;
                                }
                                
                                $utilityMeasuresS = [];
                                $utilityMeasuresR = [];
                                
                                // Iterate over each row of the matrix
                                foreach ($matrixNormalized as $row) {
                                    $S = 0;
                                
                                    // Sum the values multiplied by the weight in the row
                                    foreach ($row as $index => $value) {
                                        $S += $value * $weights[$index];
                                    }
                                
                                    $utilityMeasuresS[] = $S;
                                
                                    $maxValue = max($row); // Get the maximum value in the row
                                
                                    // Find the index of the maximum value in the row
                                    $index = array_search($maxValue, $row);
                                
                                    // Retrieve the weight for the corresponding criterion
                                    $weight = $weights[$index];
                                
                                    // Calculate the utility measure (R) by multiplying the maximum value with the weight
                                    $R = $maxValue * $weight;
                                
                                    $utilityMeasuresR[] = $R;
                                }
                            @endphp

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
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            S</th>

                                        <th
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            R</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    {{-- Iterasi alternatif --}}
                                    @forelse ($getAlternative as $index => $alternative)
                                        <tr>
                                            <!-- Nomor -->
                                            <td
                                                class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $i++ }}</span>
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
                                target="_blank">VIKOR & Creative Tim</a>
                            for a better web.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end table -->
@endsection

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
                                            <span
                                                class="text-xs font-semibold leading-tight text-slate-400"></span>
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
                                                class="text-xs font-semibold leading-tight text-slate-400"></span>
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
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
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
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
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

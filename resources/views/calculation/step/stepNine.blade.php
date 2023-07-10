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
                        <span id="dq">{{ number_format(1 / (count($criterion) - 1), 4) }}</span>
                    </p>
                    <br>
                    <p class="mb-0 text-xs leading-normal text-black">QA2 - QA1 =
                        <span id="difference">{{ $dataCheckAcceptableAdvantage['difference'] }}</span>
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
                    @forelse ($dataCalculateRankings['rankingsB'] as $rank => $ranking)
                        <tr>
                            <!-- Nomor -->
                            <td
                                class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                <span
                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $loop->iteration }}</span>
                            </td>

                            <!-- Alternative -->
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
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
                                {{ $dataCheckAcceptableStability['differenceQiB'][$rank] }}
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
                    @forelse ($dataCalculateRankings['rankingsC'] as $rank => $ranking)
                        <tr>
                            <!-- Nomor -->
                            <td
                                class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                <span
                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $loop->iteration }}</span>
                            </td>

                            <!-- Alternative -->
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
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
                                {{-- {{ $differenceQiC[$rank] }} --}}
                                {{ $dataCheckAcceptableStability['differenceQiB'][$rank] }}
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
            {{-- {{ $samples->links('pagination::tailwind') }} --}}
        </div>
    </div>

    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
        <div class="flex flex-wrap -mx-3 mb-4">
            <div class="flex items-center flex-none max-w-full px-3">
                <div>
                    <h6 class="mb-0">Hasil peringkat terbaik dari perankingan dengan v=0.55 adalah
                        <span id="alternativeWithMinQs">{{ $dataCalculateRankings['alternativeWithMinQs'] }}</span>,
                        yang sama
                        dengan peringkat terbaik dari perankingan Q. Hasil peringkat terbaik dari
                        perankingan dengan 0.45 adalah
                        <span id="alternativeWithMinQsB">{{ $dataCalculateRankings['alternativeWithMinQsB'] }}</span>
                        dan 0.5
                        adalah
                        <span id="alternativeWithMinQsC">{{ $dataCalculateRankings['alternativeWithMinQsC'] }}</span>
                        , yang sama
                        dengan peringkat terbaik dari perankingan Q. Berdasarkan hasil yang diperoleh dapat
                        dibuktikan bahwa <b>kondisi Acceptable stability in decision making
                            <span id="showCondition"></span>
                        </b>
                    </h6> <br>
                    <h6 class="mb-0">Berdasarkan hasil pembuktian kedua kondisi dapat diketahui bahwa
                        kedua kondisi tersebut <b>
                            <span id="showCondition2"></span>
                        </b></h6> <br>
                    <h6 class="mb-0 hidden" id="showNameAlternative">
                        <b>{{ $dataCalculateRankings['alternativeWithMinQs'] }}</b>
                        dapat diusulkan menjadi solusi
                        kompromi dan merupakan peringkat terbaik dari perankingan penerima beasiswa dengan
                        metode VIKOR
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>

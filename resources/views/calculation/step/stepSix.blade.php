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
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
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
                                    class="text-xs font-semibold leading-tight text-slate-400">{{ number_format($dataCalculateUtilityMeasures['utilityMeasuresS'][$index], 2) }}</span>
                            </td>

                            <td
                                class="px-6 py-3 font-bold lign-middle bg-transparent border-b tracking-none whitespace-nowrap text-slate-400">
                                <span
                                    class="text-xs font-semibold leading-tight text-slate-400">{{ number_format($dataCalculateUtilityMeasures['utilityMeasuresR'][$index], 2) }}</span>
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
</div>

<x-layouts.dashboard title="Donasi Saya" role="citizen">

<div class="p-4 sm:p-6 space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">Donasi Saya</h1>
            <p class="text-gray-500 mt-1">Riwayat donasi yang telah Anda kirimkan.</p>
        </div>

        <a href="{{ route('citizen.shelter-info') }}"
           class="inline-flex items-center gap-2 bg-cyan-500 hover:bg-cyan-600 text-white px-5 py-3 rounded-2xl font-semibold transition shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/>
            </svg>
            Donasi Lagi
        </a>

    </div>

    {{-- SUMMARY STATS --}}
    <div class="grid grid-cols-3 gap-4">

        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
            <p class="text-gray-400 text-sm">Total Donasi</p>
            <p class="text-3xl font-black text-slate-900 mt-2">{{ $donations->count() }}</p>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
            <p class="text-gray-400 text-sm">Pending</p>
            <p class="text-3xl font-black text-yellow-500 mt-2">
                {{ $donations->where('status', 'pending')->count() }}
            </p>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
            <p class="text-gray-400 text-sm">Diterima</p>
            <p class="text-3xl font-black text-green-500 mt-2">
                {{ $donations->where('status', 'received')->count() }}
            </p>
        </div>

    </div>

    {{-- LIST DONASI --}}
    @if($donations->isEmpty())

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-16 text-center">
            <div class="w-20 h-20 mx-auto bg-gray-100 rounded-full flex items-center justify-center text-4xl mb-4">
                🎁
            </div>
            <h3 class="text-lg font-semibold text-gray-700">Belum ada donasi</h3>
            <p class="text-gray-400 mt-2 mb-6">Anda belum pernah melakukan donasi ke posko manapun.</p>
            <a href="{{ route('citizen.shelter-info') }}"
               class="inline-flex items-center gap-2 bg-cyan-500 hover:bg-cyan-600 text-white px-6 py-3 rounded-2xl font-semibold transition">
                Lihat Daftar Posko
            </a>
        </div>

    @else

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Posko</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Item</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Jumlah</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-50">

                        @foreach($donations as $donation)
                        <tr class="hover:bg-gray-50 transition-colors">

                            <td class="px-6 py-4">
                                <div class="font-semibold text-gray-800">
                                    {{ $donation->shelter->shelter_name ?? '-' }}
                                </div>
                                <div class="text-xs text-gray-400 mt-0.5">
                                    {{ $donation->shelter->address ?? '' }}
                                </div>
                            </td>

                            <td class="px-6 py-4 text-gray-700">
                                {{ $donation->item_name }}
                            </td>

                            <td class="px-6 py-4 text-gray-700 font-semibold">
                                {{ number_format($donation->quantity) }}
                            </td>

                            <td class="px-6 py-4 text-gray-500 text-sm">
                                {{ \Carbon\Carbon::parse($donation->donation_date)->format('d M Y') }}
                            </td>

                            <td class="px-6 py-4">
                                @if($donation->status === 'pending')
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        Pending
                                    </span>
                                @elseif($donation->status === 'confirmed')
                                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        Dikonfirmasi
                                    </span>
                                @elseif($donation->status === 'received')
                                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-semibold">
                                        Diterima
                                    </span>
                                @endif
                            </td>

                        </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    @endif

</div>

</x-layouts.dashboard>

<x-layouts.dashboard title="Informasi Posko" role="citizen">

<div class="p-4 sm:p-6 space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Informasi Posko
            </h1>
            <p class="text-gray-500 mt-1">
                Lihat daftar posko aktif dan bantu dengan donasi Anda.
            </p>
        </div>

        <a href="{{ route('citizen.donations.index') }}"
           class="inline-flex items-center gap-2 bg-cyan-50 hover:bg-cyan-100 text-cyan-700 border border-cyan-200 px-5 py-3 rounded-2xl font-semibold transition">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>

            Donasi Saya

        </a>

    </div>

    {{-- FLASH SUCCESS --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="2" stroke="currentColor" class="w-5 h-5 text-green-500 flex-shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- SHELTER CARDS --}}
    @if($shelters->isEmpty())

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-16 text-center">
            <div class="w-20 h-20 mx-auto bg-gray-100 rounded-full flex items-center justify-center text-4xl mb-4">
                🏠
            </div>
            <h3 class="text-lg font-semibold text-gray-700">Belum ada posko tersedia</h3>
            <p class="text-gray-400 mt-2">Posko akan muncul saat volunteer menambahkan data.</p>
        </div>

    @else

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            @foreach($shelters as $shelter)

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">

                {{-- TOP BANNER --}}
                <div class="bg-gradient-to-r from-cyan-400 to-cyan-500 px-6 py-5">

                    <div class="flex items-start justify-between">

                        <div>
                            <h2 class="text-xl font-bold text-white leading-tight">
                                {{ $shelter->shelter_name }}
                            </h2>
                            <p class="text-cyan-100 text-sm mt-1">
                                {{ $shelter->address }}
                            </p>
                        </div>

                        {{-- STATUS BADGE --}}
                        @if($shelter->status === 'active')
                            <span class="bg-white/25 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                Aktif
                            </span>
                        @elseif($shelter->status === 'full')
                            <span class="bg-red-400/50 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                Penuh
                            </span>
                        @endif

                    </div>

                </div>

                <div class="p-5 space-y-4">

                    {{-- KAPASITAS --}}
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm text-gray-500 font-medium">Kapasitas</span>
                            <span class="text-sm font-bold text-gray-700">
                                {{ $shelter->current_refugees }} / {{ $shelter->capacity }} orang
                            </span>
                        </div>

                        @php
                            $pct = $shelter->capacity > 0
                                ? min(100, round(($shelter->current_refugees / $shelter->capacity) * 100))
                                : 0;
                            $barColor = $pct >= 90 ? 'bg-red-400' : ($pct >= 70 ? 'bg-yellow-400' : 'bg-cyan-400');
                        @endphp

                        <div class="w-full bg-gray-100 rounded-full h-2">
                            <div class="h-2 rounded-full {{ $barColor }} transition-all"
                                 style="width: {{ $pct }}%"></div>
                        </div>
                    </div>

                    {{-- KEBUTUHAN LOGISTIK --}}
                    @if($shelter->logistics->count())

                        <div>
                            <p class="text-sm font-semibold text-gray-600 mb-2">Kebutuhan Saat Ini</p>

                            <div class="flex flex-wrap gap-2">

                                @foreach($shelter->logistics->take(4) as $logistic)
                                    <span class="bg-cyan-50 text-cyan-700 border border-cyan-100 px-3 py-1 rounded-full text-xs font-medium">
                                        {{ $logistic->item_name }}
                                        @if($logistic->stock <= $logistic->minimum_stock)
                                            <span class="text-red-400">(Stok Rendah)</span>
                                        @endif
                                    </span>
                                @endforeach

                                @if($shelter->logistics->count() > 4)
                                    <span class="bg-gray-100 text-gray-500 px-3 py-1 rounded-full text-xs">
                                        +{{ $shelter->logistics->count() - 4 }} lainnya
                                    </span>
                                @endif

                            </div>
                        </div>

                    @else

                        <p class="text-sm text-gray-400 italic">Tidak ada data kebutuhan logistik.</p>

                    @endif

                    {{-- TOMBOL DONASI --}}
                    <div class="pt-2">

                        <a href="{{ route('citizen.donations.create', $shelter->id) }}"
                           class="flex items-center justify-center gap-2 w-full bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-3 rounded-2xl transition-colors duration-200 shadow-sm">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/>
                            </svg>

                            Donasikan

                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    @endif

</div>

</x-layouts.dashboard>

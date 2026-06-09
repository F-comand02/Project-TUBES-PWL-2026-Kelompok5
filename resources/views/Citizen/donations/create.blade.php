<x-layouts.dashboard title="Form Donasi" role="citizen">

<div class="p-4 sm:p-6">

    {{-- HEADER --}}
    <div class="flex items-center gap-3 mb-6">

        <a href="{{ route('citizen.shelter-info') }}"
           class="flex items-center justify-center w-10 h-10 rounded-xl bg-gray-100 hover:bg-gray-200 transition text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
            </svg>
        </a>

        <div>
            <h1 class="text-3xl font-bold text-gray-800">Form Donasi</h1>
            <p class="text-gray-500 mt-0.5 text-sm">
                Donasi ke posko: <span class="font-semibold text-cyan-600">{{ $shelter->shelter_name }}</span>
            </p>
        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- FORM --}}
        <div class="lg:col-span-2">

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 sm:p-8">

                @if($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl text-sm">
                        <ul class="space-y-1 list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('citizen.donations.store', $shelter->id) }}" method="POST"
                      class="space-y-5">

                    @csrf

                    {{-- NAMA BARANG --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Barang / Item Donasi
                            <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="item_name"
                            value="{{ old('item_name') }}"
                            placeholder="Contoh: Beras, Selimut, Obat-obatan..."
                            class="w-full border border-gray-200 rounded-2xl px-4 py-3 text-gray-800
                                   focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent
                                   placeholder-gray-300 transition">
                    </div>

                    {{-- JUMLAH --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Jumlah / Kuantitas
                            <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="number"
                            name="quantity"
                            value="{{ old('quantity') }}"
                            min="1"
                            placeholder="Masukkan jumlah..."
                            class="w-full border border-gray-200 rounded-2xl px-4 py-3 text-gray-800
                                   focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent
                                   placeholder-gray-300 transition">
                    </div>

                    {{-- TANGGAL DONASI --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Tanggal Donasi
                            <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="date"
                            name="donation_date"
                            value="{{ old('donation_date', date('Y-m-d')) }}"
                            class="w-full border border-gray-200 rounded-2xl px-4 py-3 text-gray-800
                                   focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent
                                   transition">
                    </div>

                    {{-- CATATAN --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Catatan (Opsional)
                        </label>
                        <textarea
                            name="notes"
                            rows="3"
                            placeholder="Tambahkan catatan jika diperlukan..."
                            class="w-full border border-gray-200 rounded-2xl px-4 py-3 text-gray-800
                                   focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent
                                   placeholder-gray-300 transition resize-none">{{ old('notes') }}</textarea>
                    </div>

                    {{-- SUBMIT --}}
                    <div class="flex gap-3 pt-2">

                        <button type="submit"
                                class="flex-1 flex items-center justify-center gap-2 bg-cyan-500 hover:bg-cyan-600
                                       text-white font-semibold py-3 rounded-2xl transition-colors shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/>
                            </svg>
                            Kirim Donasi
                        </button>

                        <a href="{{ route('citizen.shelter-info') }}"
                           class="flex items-center justify-center px-6 bg-gray-100 hover:bg-gray-200
                                  text-gray-600 font-semibold rounded-2xl transition">
                            Batal
                        </a>

                    </div>

                </form>

            </div>

        </div>

        {{-- SIDEBAR INFO POSKO --}}
        <div class="space-y-4">

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="bg-gradient-to-r from-cyan-400 to-cyan-500 px-5 py-4">
                    <h3 class="font-bold text-white text-lg">Informasi Posko</h3>
                </div>

                <div class="p-5 space-y-3">

                    <div>
                        <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Nama Posko</p>
                        <p class="font-bold text-gray-800 mt-0.5">{{ $shelter->shelter_name }}</p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Alamat</p>
                        <p class="text-gray-700 mt-0.5 text-sm">{{ $shelter->address }}</p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Kapasitas</p>
                        <p class="text-gray-700 mt-0.5 font-semibold">
                            {{ $shelter->current_refugees }} / {{ $shelter->capacity }} orang
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Status</p>
                        @if($shelter->status === 'active')
                            <span class="inline-block mt-1 bg-green-100 text-green-600 text-xs font-semibold px-3 py-1 rounded-full">
                                Aktif
                            </span>
                        @elseif($shelter->status === 'full')
                            <span class="inline-block mt-1 bg-red-100 text-red-600 text-xs font-semibold px-3 py-1 rounded-full">
                                Penuh
                            </span>
                        @endif
                    </div>

                </div>

            </div>

            {{-- KEBUTUHAN LOGISTIK --}}
            @if($shelter->logistics->count())
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-5">

                <h4 class="font-bold text-gray-700 mb-3 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-cyan-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/>
                    </svg>
                    Kebutuhan Logistik
                </h4>

                <div class="space-y-2">
                    @foreach($shelter->logistics as $logistic)
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-700">{{ $logistic->item_name }}</span>
                        @if($logistic->stock <= $logistic->minimum_stock)
                            <span class="text-red-500 font-semibold text-xs">Stok Rendah</span>
                        @else
                            <span class="text-green-500 font-semibold text-xs">Cukup</span>
                        @endif
                    </div>
                    @endforeach
                </div>

            </div>
            @endif

        </div>

    </div>

</div>

</x-layouts.dashboard>

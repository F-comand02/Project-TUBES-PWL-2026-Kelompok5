<x-layouts.dashboard
    title="Relief Distribution"
    color="green"
    role="volunteer">

<div class="space-y-6 p-1">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-emerald-500 to-green-600 rounded-3xl p-8 text-white shadow-lg">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>
                <h1 class="text-3xl md:text-4xl font-black">
                    Distribusi Bantuan
                </h1>
                <p class="mt-2 text-green-100 text-lg">
                    Donasi dari citizen yang siap diantarkan ke posko.
                </p>
            </div>

            {{-- STATS BADGE --}}
            <div class="flex flex-wrap gap-3">

                <div class="bg-white/20 backdrop-blur-sm rounded-2xl px-5 py-3 text-center min-w-[90px]">
                    <p class="text-2xl font-black">{{ $donations->count() }}</p>
                    <p class="text-xs text-green-100 mt-0.5">Total Donasi</p>
                </div>

                <div class="bg-white/20 backdrop-blur-sm rounded-2xl px-5 py-3 text-center min-w-[90px]">
                    <p class="text-2xl font-black text-yellow-200">
                        {{ $donations->where('status', 'pending')->count() }}
                    </p>
                    <p class="text-xs text-green-100 mt-0.5">Menunggu</p>
                </div>

                <div class="bg-white/20 backdrop-blur-sm rounded-2xl px-5 py-3 text-center min-w-[90px]">
                    <p class="text-2xl font-black text-emerald-200">
                        {{ $donations->where('status', 'on_delivery')->count() }}
                    </p>
                    <p class="text-xs text-green-100 mt-0.5">Dalam Pengiriman</p>
                </div>

            </div>

        </div>

    </div>

    {{-- FLASH MESSAGE --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-green-500 shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- FILTER TABS --}}
    <div class="bg-white rounded-2xl p-2 shadow-sm border border-gray-100 inline-flex gap-1">
        <a href="{{ route('volunteer.distribusi-bantuan') }}"
           class="px-5 py-2.5 rounded-xl text-sm font-semibold transition
           {{ !request('status') || request('status') === 'all'
               ? 'bg-green-500 text-white shadow-sm'
               : 'text-gray-500 hover:bg-gray-100' }}">
            Semua
        </a>
        <a href="{{ route('volunteer.distribusi-bantuan', ['status' => 'pending']) }}"
           class="px-5 py-2.5 rounded-xl text-sm font-semibold transition
           {{ request('status') === 'pending'
               ? 'bg-yellow-400 text-white shadow-sm'
               : 'text-gray-500 hover:bg-gray-100' }}">
            Menunggu
        </a>
        <a href="{{ route('volunteer.distribusi-bantuan', ['status' => 'on_delivery']) }}"
           class="px-5 py-2.5 rounded-xl text-sm font-semibold transition
           {{ request('status') === 'on_delivery'
               ? 'bg-blue-500 text-white shadow-sm'
               : 'text-gray-500 hover:bg-gray-100' }}">
            Dalam Pengiriman
        </a>
        <a href="{{ route('volunteer.distribusi-bantuan', ['status' => 'received']) }}"
           class="px-5 py-2.5 rounded-xl text-sm font-semibold transition
           {{ request('status') === 'received'
               ? 'bg-green-600 text-white shadow-sm'
               : 'text-gray-500 hover:bg-gray-100' }}">
            Selesai
        </a>
    </div>

    {{-- DONATION LIST --}}
    @if($donations->isEmpty())

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-16 text-center">
            <h3 class="text-lg font-semibold text-gray-700">Belum ada donasi</h3>
            <p class="text-gray-400 mt-2">Tidak ada data distribusi bantuan saat ini.</p>
        </div>

    @else

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">

            @foreach($donations as $donation)

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">

                {{-- CARD TOP --}}
                <div class="p-6">

                    <div class="flex items-start justify-between gap-4 mb-4">

                        {{-- ITEM INFO --}}
                        <div class="flex items-center gap-4">
                            <div>
                                <h2 class="text-lg font-bold text-slate-900 leading-tight">
                                    {{ $donation->item_name }}
                                </h2>
                                <p class="text-gray-500 text-sm mt-0.5">
                                    Jumlah: <span class="font-semibold text-slate-700">{{ number_format($donation->quantity) }}</span> unit
                                </p>
                            </div>
                        </div>

                        {{-- STATUS BADGE --}}
                        <div class="shrink-0">
                            @if($donation->status === 'pending')
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1.5 rounded-full text-xs font-bold">
                                    Menunggu
                                </span>
                            @elseif($donation->status === 'on_delivery')
                                <span class="bg-blue-100 text-blue-700 px-3 py-1.5 rounded-full text-xs font-bold">
                                    Dalam Pengiriman
                                </span>
                            @elseif($donation->status === 'received')
                                <span class="bg-green-100 text-green-600 px-3 py-1.5 rounded-full text-xs font-bold">
                                    Selesai
                                </span>
                            @elseif($donation->status === 'confirmed')
                                <span class="bg-purple-100 text-purple-600 px-3 py-1.5 rounded-full text-xs font-bold">
                                    ✔ Dikonfirmasi
                                </span>
                            @endif
                        </div>

                    </div>

                    {{-- DIVIDER --}}
                    <div class="border-t border-gray-100 my-4"></div>

                    {{-- DETAIL GRID --}}
                    <div class="grid grid-cols-2 gap-3 text-sm">

                        {{-- DONOR --}}
                        <div class="bg-gray-50 rounded-2xl p-3.5">
                            <p class="text-gray-400 text-xs mb-1">Pendonor</p>
                            <p class="font-semibold text-slate-800">{{ $donation->donor_name }}</p>
                            <p class="text-gray-400 text-xs mt-0.5">{{ $donation->user->email ?? '-' }}</p>
                        </div>

                        {{-- POSKO TUJUAN --}}
                        <div class="bg-gray-50 rounded-2xl p-3.5">
                            <p class="text-gray-400 text-xs mb-1">Posko Tujuan</p>
                            <p class="font-semibold text-slate-800">
                                {{ $donation->shelter->shelter_name ?? 'Belum ditentukan' }}
                            </p>
                            <p class="text-gray-400 text-xs mt-0.5 line-clamp-1">
                                {{ $donation->shelter->address ?? '-' }}
                            </p>
                        </div>

                        {{-- TANGGAL --}}
                        <div class="bg-gray-50 rounded-2xl p-3.5">
                            <p class="text-gray-400 text-xs mb-1">Tanggal Donasi</p>
                            <p class="font-semibold text-slate-800">
                                {{ \Carbon\Carbon::parse($donation->donation_date)->format('d M Y') }}
                            </p>
                        </div>

                        {{-- VOLUNTEER --}}
                        <div class="bg-gray-50 rounded-2xl p-3.5">
                            <p class="text-gray-400 text-xs mb-1">Ditugaskan ke</p>
                            <p class="font-semibold text-slate-800">
                                {{ $donation->volunteer?->name ?? '-' }}
                            </p>
                        </div>

                    </div>

                    {{-- CATATAN --}}
                    @if($donation->notes)
                    <div class="mt-3 bg-amber-50 border border-amber-100 rounded-2xl px-4 py-3">
                        <p class="text-xs text-amber-600 font-semibold mb-0.5">Catatan</p>
                        <p class="text-sm text-amber-800">{{ $donation->notes }}</p>
                    </div>
                    @endif

                </div>

                {{-- CARD ACTIONS --}}
                @if($donation->status === 'pending')

                    <div class="px-6 pb-6">
                        <form action="{{ route('volunteer.distribusi-bantuan.ambil', $donation) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full bg-green-500 hover:bg-green-600 text-white py-3.5 rounded-2xl font-bold transition flex items-center justify-center gap-2 shadow-sm hover:scale-90 duration-200 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>
                                </svg>
                                Ambil Misi Pengiriman
                            </button>
                        </form>
                    </div>

                @elseif($donation->status === 'on_delivery' && $donation->volunteer_id === Auth::id())

                    <div class="px-6 pb-6">
                        <form action="{{ route('volunteer.distribusi-bantuan.selesai', $donation) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3.5 rounded-2xl font-bold transition flex items-center justify-center gap-2 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                Tandai Sudah Sampai
                            </button>
                        </form>
                    </div>

                @elseif($donation->status === 'on_delivery' && $donation->volunteer_id !== Auth::id())

                    <div class="px-6 pb-6">
                        <div class="w-full bg-gray-100 text-gray-400 py-3.5 rounded-2xl font-semibold text-center text-sm">
                            Sedang dikerjakan volunteer lain
                        </div>
                    </div>

                @endif

            </div>

            @endforeach

        </div>

        {{-- PAGINATION --}}
        <div class="mt-2">
            {{ $donations->links() }}
        </div>

    @endif

</div>

</x-layouts.dashboard>
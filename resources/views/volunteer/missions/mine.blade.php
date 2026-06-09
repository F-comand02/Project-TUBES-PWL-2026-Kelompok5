<x-layouts.dashboard
    title="Misi Saya"
    color="green"
    role="volunteer">

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-emerald-500 to-green-600 rounded-3xl p-8 text-white shadow-lg">
        <h1 class="text-3xl font-bold mb-2 text-white">
            Misi Saya
        </h1>
        <p class="text-green-100 text-lg">
            Lihat status semua misi yang sedang Anda jalankan dan tandai sebagai selesai.
        </p>
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

    <div>
        <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
            Misi Penanganan Komplain
        </h2>

        @forelse($complaints as $complaint)

            <div class="bg-white rounded-2xl shadow-sm p-6 mb-4 border border-gray-100">

                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3 mb-4">
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">
                            {{ $complaint->title }}
                        </h2>
                        <span class="inline-block mt-1 bg-green-100 text-green-700 px-3 py-0.5 rounded-full text-xs font-semibold">
                            Sedang diproses
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-sm mb-5">
                    <div class="bg-gray-100 rounded-xl p-3">
                        <p class="text-gray-400 text-xs">Citizen</p>
                        <p class="font-semibold text-slate-700 mt-0.5">{{ $complaint->user->name }}</p>
                    </div>
                    <div class="bg-gray-100 rounded-xl p-3">
                        <p class="text-gray-400 text-xs">Kategori</p>
                        <p class="font-semibold text-slate-700 mt-0.5">{{ $complaint->category }}</p>
                    </div>
                    <div class="bg-gray-100 rounded-xl p-3">
                        <p class="text-gray-400 text-xs">Urgensi</p>
                        <p class="font-semibold text-slate-700 mt-0.5">{{ $complaint->urgency_level }}</p>
                    </div>
                    <div class="bg-gray-100 rounded-xl p-3">
                        <p class="text-gray-400 text-xs">Posko</p>
                        <p class="font-semibold text-slate-700 mt-0.5">{{ $complaint->shelter->shelter_name ?? '-' }}</p>
                    </div>
                </div>

                <form action="{{ route('missions.complete', $complaint) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 hover:scale-90 duration-200 transition text-white px-6 py-3 rounded-xl font-semibold transition flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        Selesaikan Misi
                    </button>
                </form>

            </div>

        @empty

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 text-center text-gray-400">
                Belum ada misi komplain yang diambil. 
                <a href="{{ route('volunteer.complaints') }}"
                           class="text-green-500 hover:text-green-700 font-semibold text-sm underline">
                            Lihat Mengatur Komplain
                        </a>
            </div>

        @endforelse
    </div>

    <div>
        <h2 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
            Distribusi Bantuan
        </h2>

        @forelse($donationMissions as $donation)

            <div class="bg-white rounded-2xl shadow-sm p-6 mb-4 border border-gray-100">

                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3 mb-4">
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">
                            {{ $donation->item_name }}
                        </h2>
                        @if($donation->status === 'on_delivery')
                            <span class="inline-block mt-1 bg-blue-100 text-blue-700 px-3 py-0.5 rounded-full text-xs font-semibold">
                                Dalam Pengiriman
                            </span>
                        @elseif($donation->status === 'received')
                            <span class="inline-block mt-1 bg-green-100 text-green-700 px-3 py-0.5 rounded-full text-xs font-semibold">
                                Sudah Sampai
                            </span>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-sm mb-5">
                    <div class="bg-gray-50 rounded-xl p-3">
                        <p class="text-gray-400 text-xs">Pendonor</p>
                        <p class="font-semibold text-slate-700 mt-0.5">{{ $donation->donor_name }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3">
                        <p class="text-gray-400 text-xs">Jumlah</p>
                        <p class="font-semibold text-slate-700 mt-0.5">{{ number_format($donation->quantity) }} unit</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3">
                        <p class="text-gray-400 text-xs">Posko Tujuan</p>
                        <p class="font-semibold text-slate-700 mt-0.5">{{ $donation->shelter->shelter_name ?? '-' }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3">
                        <p class="text-gray-400 text-xs">Tanggal Donasi</p>
                        <p class="font-semibold text-slate-700 mt-0.5">
                            {{ \Carbon\Carbon::parse($donation->donation_date)->format('d M Y') }}
                        </p>
                    </div>
                </div>

                @if($donation->status === 'on_delivery')
                    <form action="{{ route('volunteer.distribusi-bantuan.selesai', $donation) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold transition flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            Tandai Sudah Sampai ke Posko
                        </button>
                    </form>
                @else
                    <div class="text-sm text-green-600 font-semibold flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        Bantuan sudah berhasil sampai ke posko!
                    </div>
                @endif

            </div>

        @empty

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 text-center text-gray-400">
                Belum ada misi distribusi bantuan yang diambil.
                <a href="{{ route('volunteer.distribusi-bantuan') }}"
                   class="text-green-500 hover:text-green-700 font-semibold text-sm underline">
                    Lihat Distribusi Bantuan
                </a>
            </div>

        @endforelse
    </div>

</div>

</x-layouts.dashboard>
<x-layouts.dashboard title="Dashboard" role="citizen">

    <div
            class="bg-gradient-to-r from-cyan-600 to-cyan-300 rounded-3xl p-8 text-white shadow-lg">

            <h1 class="text-3xl md:text-4xl font-black">
                Dashboard
            </h1>

            <p class="mt-3 text-green-100 text-lg">
                Welcome back, {{ Auth::user()->name }}
            </p>

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-6">
            
            <div class="bg-white rounded-2xl shadow hover:scale-102 transition duration-250 hover:shadow-xl">
                <div class="flex justify-between items-center mb-3 bg-gradient-to-r from-cyan-600 to-cyan-300 rounded-t-2xl">
                    <h2 class="text-xl font-bold p-3 pl-6 text-white">
                        Komplain Saya
                    </h2>
                    
                    <button class="bg-blue-600 shadow px-2 py-1 mr-4 text-white font-bold rounded-3xl hover:scale-95 hover:bg-blue-800 transition">
                        <a href=" {{ route('complaints.index') }} ">
                            View detail
                        </a>
                    </button>
                </div>
                
                <div class="overflow-y-auto h-34 py-4 mx-5">
                @forelse($myComplaints as $complaint)
                    <div class="py-2 bg-gray-200 shadow rounded-lg mb-3 px-2 mx-6">
                        <p class="font-bold mb-2">
                            {{ $complaint->title }}
                        </p>

                        <span class="text-sm text-gray-500">
                                @if($complaint->status == 'pending')
                                <span class="bg-yellow-100 text-yellow-600 px-1 py-1 rounded text-xs">
                                    {{ ucfirst(str_replace('_', ' ', $complaint->status)) }}
                                </span>
                            @elseif($complaint->status == 'processing')
                                <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded text-xs ">
                                    {{ ucfirst(str_replace('_', ' ', $complaint->status)) }}
                                </span>
                            @elseif($complaint->status == 'resolved')
                                <span class="bg-green-100 text-green-600 px-2 py-1 rounded text-xs">
                                    {{ ucfirst(str_replace('_', ' ', $complaint->status)) }}
                                </span>
                            @endif

                            <a class="mx-3"> | </a>

                            <span class="text-red-700 px-1 py-1 rounded-full text-sm">
                                {{ ucfirst($complaint->urgency_level) }}
                            </span>

                            <a class="mx-3"> | </a>

                            <span class="text-cyan-700 px-1 py-1 rounded-full text-sm">
                                {{ $complaint->category }}
                            </span>

                            <a class="mx-3"> | </a>

                            <span class="text-sm text-gray-500">
                                {{ $complaint->created_at->format('d M Y') }}
                            </span>
                        </span>
                    </div>
                @empty
                <p>Belum ada komplain.</p>
                @endforelse
            </div>
        </div>
            
        <div class="bg-white rounded-2xl shadow pb-3 hover:scale-102 transition duration-250 hover:shadow-xl">
            <div class="flex justify-between items-center bg-gradient-to-r from-cyan-600 to-cyan-300 rounded-t-2xl mb-3">
                <h2 class="text-xl font-bold p-3 rounded-lg text-white">
                    Informasi Bantuan
                </h2>

                <button class="bg-blue-600 shadow px-2 py-1 mr-4 text-white font-bold rounded-3xl hover:scale-95 hover:bg-blue-800 transition">
                        <a href=" {{ route('citizen.logistics') }}">
                            View detail
                        </a>
                </button>
            </div>
            
            <div class="overflow-y-auto h-36 py-1 mx-5">
                @foreach($logistics as $item)
                <div class=" py-2 bg-gray-200 shadow rounded-lg mb-3 mx-6 px-2">
                    <p class="font-semibold">
                        {{ $item->item_name }}
                    </p>
                    
                    <p class="text-sm text-gray-500">
                        Stok: {{ $item->stock }} unit | Posko: {{ $item->shelter->shelter_name ?? '-' }} | Kategori: {{ $item->category->category_name ?? '-' }}
                    </p>
                </div>
                
                @endforeach
            </div>

            @if($logistics->isEmpty())
                <p>Belum ada bantuan tersedia.</p>
            @endif

        </div>
        
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 mt-6">
        
        <div class="bg-white rounded-2xl shadow hover:scale-102 transition duration-250 hover:shadow-xl">
            <div class="flex justify-between items-center bg-gradient-to-r from-cyan-600 to-cyan-300 rounded-t-2xl mb-3">
                <h2 class="text-xl font-bold p-3 rounded-lg text-white">
                    Posko Terdekat
                </h2>
            </div>

            <div class="overflow-y-auto h-57 py-1 mx-5">
                @foreach($shelters as $shelter)
                    <div class="py-2 bg-gray-200 shadow rounded-lg mb-3 px-2">
                        <p class="font-semibold">
                            {{ $shelter->shelter_name }}
                        </p>

                        <p class="text-sm text-gray-500">
                            Alamat : {{ $shelter->address }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow hover:scale-102 transition duration-250 hover:shadow-xl">
                <div class="flex justify-between items-center bg-gradient-to-r from-cyan-600 to-cyan-300 rounded-t-2xl mb-3">
                    <h2 class="text-xl font-bold p-3 rounded-t-2xl text-white">
                        Informasi Posko
                    </h2>

                    <button class="bg-blue-600 shadow px-2 py-1 mr-4 text-white font-bold rounded-3xl hover:scale-95 hover:bg-blue-800 transition">
                        <a href=" {{ route('citizen.shelter-info') }}">
                            View detail
                        </a>
                    </button>
                
                </div>
                
            <div class="overflow-y-auto h-52 py-1 px-3 mx-5">
            @forelse($shelters as $shelter)

                <div class="py-3 bg-gray-200 shadow rounded-lg mb-3 px-2">

                    <p class="font-semibold text-lg">
                        {{ $shelter->shelter_name }}
                    </p>

                    <p class="text-sm">
                        Alamat : {{ $shelter->address }}
                    </p>

                    <p class="text-sm">
                        Kapasitas:
                        {{ $shelter->capacity ?? '-' }}
                    </p>

                    <p class="text-sm">
                        Penghuni Saat Ini:
                        {{ $shelter->current_refugees ?? '-' }}
                    </p>

                    <p class="text-sm">
                        Status:
                        @if($shelter->status === 'active')
                            <span class=" text-green-600">
                                Aktif
                            </span>
                        @elseif($shelter->status === 'full')
                            <span class="text-red-600">
                                Penuh
                            </span>
                        @else
                            <span class="text-gray-600">
                                Tidak Diketahui
                            </span>
                        @endif

                </div>

            @empty

                <p class="text-gray-500">
                    Belum ada data posko.
                </p>

            @endforelse
            </div>

        </div>

        <div class="bg-white rounded-2xl shadow hover:scale-102 transition duration-250 hover:shadow-xl">

        <div class="items-center rounded-lg text-white">
                <div class="flex justify-between items-center bg-gradient-to-r from-cyan-600 to-cyan-300 rounded-t-2xl mb-4">
                    <div class="flex justify-between items-center">
                        
                    @if(Auth::user()->profile_photo)
                        
                        <img
                            src="{{ asset('storage/profile-photos/' . Auth::user()->profile_photo) }}"
                            class="w-22 h-22 m-2 ml-3  rounded-full object-cover">
                        
                    @else

                        <div
                            class="w-20 h-20 w-22 h-22 m-2 ml-3 rounded-full text-white flex items-center justify-center text-6xl font-black shadow-lg">

                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                        </div>

                    @endif

                    <div class="ml-2 max-w-55">
                        <h3 class="font-bold text-2xl">
                            {{ auth()->user()->name }}
                        </h3>

                        <p class="text-sm text-green-100">
                            Citizen
                        </p>
                    </div>
                </div>

                <button class="bg-blue-600 shadow px-2 py-1 mr-4 text-white font-bold rounded-3xl hover:scale-95 hover:bg-blue-800 transition">
                        <a href=" {{ route('profile.edit') }}">
                            View detail
                        </a>
                </button>
            </div>
        </div>

    <div class="space-y-3 bg-gray-200 shadow rounded-lg m-3 p-3">

        <p>
            Email       : {{ auth()->user()->email }}
        </p>

        <p>
            Nomor Hp    : {{ auth()->user()->phone ?? '-' }}
        </p>

        <p>
            Alamat      : {{ auth()->user()->address ?? '-' }}
        </p>

        <p>
            Jenis Kelamin : {{ auth()->user()->gender ?? '-'}}

    </div>

</div>
    
</div>


        

    </div>

</x-layouts.dashboard>
<x-layouts.dashboard title="Dashboard" color="green" role="volunteer">

    <div class="space-y-8">

        <!-- HEADER -->
        <div
            class="bg-gradient-to-r from-emerald-500 to-green-600 rounded-3xl p-8 text-white shadow-lg">

            <h1 class="text-3xl md:text-4xl font-black">
                Dashboard
            </h1>

            <p class="mt-3 text-green-100 text-lg">
                Welcome back, {{ Auth::user()->name }}
            </p>

        </div>

        <!-- STATS -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            <!-- CARD -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 hover:scale-102 transition duration-250 hover:shadow-xl">

            <div class="flex justify-between items-center bg-gradient-to-r from-emerald-500 to-green-600 rounded-t-2xl p-3 mb-3">
                <h2 class="font-bold text-lg text-white">
                    Completed Missions
                </h2>
            </div>
            
            <div class="overflow-y-auto h-40 m-2">
            @forelse($completedMissionList as $mission)

                <div class="m-3 p-3 rounded-xl bg-green-100">

                    <p class="font-semibold text-green-900">
                        {{ $mission->title }}
                    </p>
                </div>
                
                @empty
                
                <div class=" bg-gray-200 text-center py-17 rounded-xl mx-1">
                    <p class="text-gray-500">
                        Belum ada misi yang selesai.
                    </p>
                </div>
                
                @endforelse
            </div>

        </div>

            <!-- CARD -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 hover:scale-102 transition duration-250 hover:shadow-xl">
                <div class="flex justify-between items-center bg-gradient-to-r from-emerald-500 to-green-600 rounded-t-2xl p-3">
                <p class="font-bold text-lg text-white">
                    My Missions
                </p>

                    <button class="bg-green-500 hover:bg-green-800 shadow px-2 py-1 mr-4 text-white font-bold rounded-3xl hover:scale-95 transition">
                            <a href=" {{ route('missions.mine') }} ">
                                    View detail
                            </a>
                    </button>
                </div>

                <div class="overflow-y-auto h-40 mx-2 my-2">
                @forelse($upcomingMissions as $my)
                
                <div class="border border-gray-200  rounded-2xl p-3 m-5 bg-gray-200">

                    <div class="flex justify-between items-start">

                        <div>

                            <h3 class="font-bold text-lg text-slate-900">
                                {{ $my->title ?? 'Complaint #'.$my->id }}
                            </h3>

                            <p class="text-sm text-gray-500">
                                {{ $my->location }}
                            </p>

                        </div>

                        <span class="
                            px-3 py-1 rounded-lg text-sm font-semibold
                            @if($my->urgency_level === 'high')
                                bg-red-100 text-red-700
                            @elseif($my->urgency_level === 'medium')
                                bg-yellow-100 text-yellow-700
                            @else
                                bg-green-100 text-green-700
                            @endif
                        ">
                            {{ ucfirst($my->urgency_level) }}
                        </span>

                    </div>

                    <div class="mt-2 flex justify-between items-center">

                        <div class="text-sm text-gray-500">

                            {{ $my->user->name ?? 'Citizen' }}

                            <br>

                            {{ $my->created_at->format('d M Y') }}

                        </div>
                    </div>
                    </div>

                    
                    @empty
                    
                    <div class="text-center bg-gray-200 text-center py-17 rounded-xl mx-1">
                        
                        <p class="text-gray-500">
                            Belum ada complaint yang tersedia.
                        </p>
                        
                    </div>
                    
                    @endforelse
                </div>
                
            </div>

            <!-- CARD -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 hover:scale-102 transition duration-250 hover:shadow-xl">
                <div class="flex justify-between items-center bg-gradient-to-r from-emerald-500 to-green-600 rounded-t-2xl p-3">
                    <h2 class="text-xl font-bold text-white">
                        Distribution Assag...
                    </h2>

                    <button class="bg-green-500 hover:bg-green-800 shadow px-2 py-1 mr-1 text-white font-bold rounded-3xl hover:scale-95 transition">
                        <a href=" {{ route('volunteer.distribusi-bantuan') }} ">
                                View detail
                        </a>
                    </button>
                </div>

            <div class="overflow-y-auto h-43 mt-2 mx-1">
            @forelse($distributionAssignments as $donation)

                <div class="mb-4 p-4 rounded-2xl bg-gray-200">

                    <h3 class="font-semibold text-slate-900">
                        {{ $donation->item_name }}
                    </h3>

                    <p class="text-sm text-gray-500 my-1">
                        {{ $donation->shelter->shelter_name ?? '-' }}
                    </p>

                    <p class="text-sm text-gray-500">
                        {{ $donation->donor_name }}
                    </p>

                    <span class="
                        inline-block mt-2 px-3 py-1 rounded-lg text-xs font-semibold
                        {{ $donation->status === 'received'
                            ? 'bg-green-100 text-green-700'
                            : 'bg-yellow-100 text-yellow-700' }}
                    ">
                        {{ ucfirst(str_replace('_', ' ', $donation->status)) }}
                    </span>

                </div>

            @empty

            <div class="bg-gray-200 text-center py-17 rounded-xl mx-1">
                <p class="text-gray-500">
                    No distribution assignments.
                </p>
            </div>

            @endforelse
            </div>

        </div>

            <!-- CARD -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 hover:scale-102 transition duration-250 hover:shadow-xl">
                <div class="flex justify-between items-center bg-gradient-to-r from-emerald-500 to-green-600 rounded-t-2xl p-3">
                <p class="text-white text-xl font-bold">
                    Managed Shelters
                </p>

                <button class="bg-green-500 hover:bg-green-800 shadow px-2 py-1 mr-1 text-white font-bold rounded-3xl hover:scale-95 transition">
                        <a href=" {{ route('shelters.index') }} ">
                                View detail
                        </a>
                    </button>
            </div>

    <div class="overflow-y-auto h-40 mt-2 mx-1">
    @forelse($myShelters as $shelter)

        <div class="mb-4 p-4 rounded-2xl bg-gray-200">

            <h3 class="font-semibold text-slate-900">
                {{ $shelter->shelter_name }}
            </h3>

            <p class="text-sm text-gray-500 mt-2">
                Capacity:
                {{ $shelter->capacity }}
            </p>

            <p class="text-sm text-gray-500">
                Refugees:
                {{ $shelter->current_refugees }}
            </p>

            <span class="
                inline-block mt-2 px-3 py-1 rounded-lg text-xs font-semibold

                @if($shelter->status === 'active')
                    bg-green-100 text-green-700
                @elseif($shelter->status === 'full')
                    bg-yellow-100 text-yellow-700
                @else
                    bg-red-100 text-red-700
                @endif
            ">
                {{ ucfirst($shelter->status) }}
            </span>

        </div>

    @empty

    <div class="bg-gray-200 text-center py-17 rounded-xl mx-1">
        <p class="text-gray-500">
            No shelters available.
        </p>
    </div>

    @endforelse

                </div>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            <!-- MISSIONS -->
                    <div class=" xl:col-span-2 bg-white rounded-2xl shadow hover:scale-102 transition duration-250 hover:shadow-xl">
                            <div class="flex justify-between items-center bg-gradient-to-r from-emerald-500 to-green-600 rounded-t-2xl mb-3">
                                <h2 class="text-xl font-bold p-3 rounded-lg text-white">
                                    Available Missions
                                </h2>

                                <button class="bg-green-500 hover:bg-green-800 shadow px-2 py-1 mr-4 text-white font-bold rounded-3xl hover:scale-95 transition">
                                    <a href=" {{ route('missions.mine') }} ">
                                        View detail
                                    </a>
                                </button>
                            </div>

                            <div class="overflow-y-auto h-57 py-1 mx-5">
                                @forelse($recentComplaints as $complaint)
                                    <div class="py-2 bg-gray-200 shadow rounded-lg mb-3 px-2">
                                        <p class="font-semibold mb-2">
                                            {{ $complaint->title }}
                                        </p>

                                        <p class="text-sm text-gray-500">
                                            Alamat : {{ $complaint->shelter->address }}
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
                                    <div class="rounded-2xl p-18 mx-1 mt-1 text-center text-bold text-gray-500 bg-gray-200 text-center rounded-xl">
                                        <h3 class="text-lg font-semibold text-gray-700">Belum ada komplain.</h3>
                                        <p class="text-gray-400 ">Komplain yang Anda buat akan muncul di sini.</p>
                                    </div>  
                                @endforelse
                            </div>
                        </div>

            <!-- SIDE -->
            <div class="bg-white rounded-2xl shadow hover:scale-102 transition duration-250 hover:shadow-xl">

        <div class="items-center rounded-lg text-white">
                <div class="flex justify-between items-center bg-gradient-to-r from-emerald-500 to-green-600 rounded-t-2xl mb-4">
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

                <button class="bg-green-500 hover:bg-green-800 shadow px-2 py-1 mr-4 text-white font-bold rounded-3xl hover:scale-95 transition">
                    <a href=" {{ route('profile.edit') }} ">
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

</x-layouts.dashboard>
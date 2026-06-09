<x-layouts.dashboard title="My Complaints" role="citizen">

    <div class="p-4 sm:p-6 space-y-2 ">

        <!-- Header -->
        <div class="flex justify-between items-center from-cyan-600 to-cyan-300 bg-gradient-to-r rounded-3xl p-8 text-white shadow-lg mb-6">

            <div>
                <h1 class="text-3xl font-bold text-white">
                    My Complaints
                </h1>

                <p class="text-white mt-1">
                    Lacak dan kelola komplain bencana yang telah Anda kirim.
                </p>
            </div>

            

            <button class="bg-blue-600 hover:bg-blue-700 sm: text-white p-3 rounded-2xl font-semibold shadow-lg hover:scale-90 duration-200 transition">
                <a href="{{ route('complaints.create') }}">

                    + Buat Komplain

                </a>
            </button>

        </div>

        <!-- Complaint Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    @foreach ($complaints as $complaint)

        <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

            <!-- IMAGE -->
            @if ($complaint->images->first())

                <div class="w-full h-56 overflow-hidden">

                    <img
                        src="{{ asset('storage/complaints/' . $complaint->images->first()->image_path) }}"
                        class="w-full h-full object-cover">
                </div>
            @else

                <div class="w-full h-56 bg-gray-200 flex items-center justify-center">

                    <span class="text-gray-500 text-4xl">
                        📷
                    </span>

                </div>
            @endif

            
            <div class="p-5">
                
                <div class="flex items-center justify-between bg-gray-100 p-3 rounded-xl">
                    
                    <h2 class="text-xl font-bold text-gray-800">
                        {{ $complaint->title }}
                    </h2>
                    
                    <span
                    class="px-3 py-1 rounded-full text-xs font-semibold
                    
                    @if($complaint->status == 'pending')
                    bg-yellow-100 text-yellow-700
                    @elseif($complaint->status == 'processing')
                    bg-blue-100 text-blue-700
                    @else
                    bg-green-100 text-green-700
                    @endif
                    ">
                    
                    {{ ucfirst(str_replace('_', ' ', $complaint->status)) }}
                    
                </span>
                
            </div>
            
            <p class="text-gray-500 mt-4 bg-gray-100 p-3 rounded-xl">
                {{ $complaint->description }}
            </p>
            
            <div class="flex flex-wrap gap-3 mt-5">
                
                <!-- CATEGORY -->
                <span class="bg-cyan-100 text-cyan-700 px-4 py-2 rounded-full text-sm font-semibold">
                    
                    {{ $complaint->category }}
                    
                </span>
                
                <!-- URGENCY -->
                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-semibold">
                    
                    {{ ucfirst($complaint->urgency_level) }}
                    
                </span>
                
            </div>
            
        </div>
        <form
            action="{{ route('complaints.destroy', $complaint->id) }}"
            method="POST"
            onsubmit="return confirm('Delete this complaint?')">

            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="bg-red-500 hover:bg-red-700 text-white p-2 mb-5 ml-5 rounded-xl font-semibold hover:scale-95 duration-200 transition">

                Hapus Komplain

            </button>

        </form>

        </div>

    @endforeach

</div>
@if($complaints->isEmpty())

    <div class="bg-white rounded-2xl shadow-xl p-8 mx-8 text-center text-bold text-gray-500">
        <h3 class="text-lg font-semibold text-gray-700">Belum ada komplain.</h3>
        <p class="text-gray-400 ">Komplain yang Anda buat akan muncul di sini.</p>
    </div>  

@endif

</div>

</x-app-layout.dashboard>
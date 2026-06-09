<x-layouts.dashboard
        title="Available Missions"
        color="green"
        role="volunteer">

    <div class="p-8 from-emerald-500 to-green-600 bg-gradient-to-r rounded-3xl text-white shadow-xl space-y-8">

        <h1 class="text-3xl font-bold mb-6">
            Available Missions
        </h1>

        <p class="text-white text-lg">
            Lihat dan terima misi untuk membantu penanganan bencana di sekitar Anda.
        </p>

        
    </div>

    @forelse($complaints as $complaint)

    <div class="bg-white rounded-2xl shadow-xl p-6 mt-6 mx-6 hover:scale-102 transition duration-250 hover:shadow-2xl">

        <div class="flex justify-between gap-8">

    <!-- KIRI -->
    <div class="flex-1">

        <h2 class="text-3xl font-bold mb-6">
            {{ $complaint->title }}
        </h2>

        <p class="mb-4">
            <strong>Kategori:</strong>
            {{ $complaint->category }}
        </p>

        <p class="mb-4">
            <strong>Tingkat Keparahan:</strong>
            {{ $complaint->urgency_level }}
        </p>

        <p class="mb-4">
            <strong>Posko:</strong>
            {{ $complaint->shelter->shelter_name ?? 'Belum ditentukan' }}
        </p>

        <p class="text-gray-600 mb-6">
            {{ $complaint->description }}
        </p>

        <form
            action="{{ route('missions.accept', $complaint) }}"
            method="POST">

            @csrf

            <button
                class="bg-green-600 hover:bg-green-700 hover:scale-95 transition text-white px-6 py-3 rounded-xl">

                Accept Mission

            </button>

        </form>

    </div>

    <!-- KANAN -->

    <div class="flex gap-6 items-start">

        <!-- Citizen Info -->

        <div class="bg-gray-200 rounded-2xl p-6 w-80 h-72 shadow-xl">

            <div class="bg-green-500 text-white rounded-xl p-3 mb-5">
                <h3 class="font-bold text-lg">
                    Citizen Information
                </h3>
            </div>

            <div class="space-y-3">

                <p>
                    <strong>Nama Lengkap:</strong>
                    {{ $complaint->user->name }}
                </p>

                <p>
                    <strong>Nomor HP:</strong>
                    {{ $complaint->user->phone ?? '-' }}
                </p>

                <p>
                    <strong>Alamat:</strong>
                    {{ $complaint->user->address ?? '-' }}
                </p>

                <p>
                    <strong>Email:</strong>
                    {{ $complaint->user->email }}
                </p>

                <p>
                    <strong>Bio:</strong>
                    {{ $complaint->user->bio ?? '-' }}
                </p>

            </div>
            
        </div>

        <!-- Gambar -->
        <div class="w-80 h-72">

            @if($complaint->images->count())

                <img
                    src="{{ asset('storage/complaints/' . $complaint->images->first()->image_path) }}"
                    class="w-full h-72 object-cover rounded-2xl shadow">

            @endif

        </div>

    </div>

    </div>

    </div>


    @empty
    <div class="bg-white rounded-2xl shadow p-8 text-center text-bold text-gray-500 mt-6 mx-6">

        <h1>
            No Available Missions
        </h1>

    @endforelse


</x-layouts.dashboard>
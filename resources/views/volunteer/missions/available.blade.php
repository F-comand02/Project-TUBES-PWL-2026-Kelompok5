<x-layouts.dashboard
    title="Available Missions"
    color="green"
    role="volunteer">

<div class="p-6">

    <h1 class="text-3xl font-bold mb-6">
        Misi yang Tersedia
    </h1>

    <p class="text-gray-500 mb-6">
        Lihat dan terima misi untuk membantu penanganan bencana di sekitar Anda.
    </p>

    @foreach($complaints as $complaint)

        <div class="bg-white rounded-2xl shadow p-8 mb-6">

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
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl">

                Accept Mission

            </button>

        </form>

    </div>

    <!-- KANAN -->
    
    <div class="flex gap-6 items-start">

        <!-- Citizen Info -->

        <div class="bg-gray-100 rounded-2xl p-6 w-80 h-72 shadow-sm">

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


    @endforeach

</div>

</x-layouts.dashboard>
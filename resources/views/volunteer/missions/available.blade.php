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

        <div class="flex justify-between gap-6">
            
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

                        <strong>Posko:</strong>

                        @if($complaint->shelter)

                            {{ $complaint->shelter->shelter_name }}

                        @else

                            Belum ditentukan

                        @endif
                    </p>

                    @if($complaint->shelter)

                        <p class="mb-4 text-gray-600">

                            {{ $complaint->shelter->address }}

                        </p>

                    @endif

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

            <div class="bg-gray-50 rounded-xl p-4 mt-4 mb-4">

    <h3 class="font-bold text-lg mb-3">

        Citizen Information

    </h3>

    <p class="mb-2">
        <strong>Nama Lengkap:</strong>
        {{ $complaint->user->name }}
    </p>

    <p class="mb-2">
        <strong>Nomor HP:</strong>
        {{ $complaint->user->phone ?? '-' }}
    </p>

    <p class="mb-2">
        <strong>Alamat:</strong>
        {{ $complaint->user->address ?? '-' }}
    </p>

    <p class="mb-2">
        <strong>Bio:</strong>
        {{ $complaint->user->bio ?? '-' }}
    </p>

</div>

            <!-- KANAN -->
            <div class="w-72 flex-shrink-0">

                @if($complaint->images->count())

                    <img
                        src="{{ asset('storage/complaints/' . $complaint->images->first()->image_path) }}"
                        alt="Complaint Image"
                        class="w-full h-56 object-cover rounded-xl shadow">

                @else

                    <div
                        class="w-full h-56 bg-gray-200 rounded-xl flex items-center justify-center text-gray-500">

                        No Image

                    </div>

                @endif

            </div>

        </div>

    </div>


    @endforeach

</div>

</x-layouts.dashboard>
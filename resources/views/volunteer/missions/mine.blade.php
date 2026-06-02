<x-layouts.dashboard
    title="My Missions"
    color="green"
    role="volunteer">
    <div class="space-y-8 from-emerald-500 to-green-600 bg-gradient-to-r rounded-3xl p-8 text-white shadow-lg">
    <h1 class="text-3xl font-bold mb-6 text-white px-4">
        My Missions
    </h1>

    <p class="text-white mt-2 text-lg px-4">
        Lihat status misi yang sedang Anda jalankan dan tandai sebagai selesai setelah membantu penanganan bencana.
    </div>

<div class="p-6">


    @forelse($complaints as $complaint)

        <div class="bg-white rounded-2xl shadow p-6 mb-6">

            <h2 class="text-2xl font-bold mb-3">
                {{ $complaint->title }}
            </h2>

            <p>
                <strong>Citizen:</strong>
                {{ $complaint->user->name }}
            </p>

            <p>
                <strong>Kategori:</strong>
                {{ $complaint->category }}
            </p>

            <p>
                <strong>Urgency:</strong>
                {{ $complaint->urgency_level }}
            </p>

            <p>
                <strong>Posko:</strong>
                {{ $complaint->shelter->shelter_name ?? '-' }}
            </p>

            <p>
                <strong>Status:</strong>
                {{ $complaint->status }}
            </p>

            <form
            action="{{ route('missions.complete', $complaint) }}"
            method="POST">

            @csrf
            @method('PATCH')

            <button
                class="bg-green-600 text-white px-5 py-2 rounded-lg">

                Complete Mission

            </button>

        </form>

        </div>

    @empty

        <div class="bg-white rounded-2xl shadow p-10 text-center">

            Belum ada misi yang diambil

        </div>

    @endforelse

</div>

</x-layouts.dashboard>
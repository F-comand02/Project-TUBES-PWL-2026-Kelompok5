<x-layouts.dashboard title="My Complaints" role="citizen">

    <div class="p-4 sm:p-6 space-y-6">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    My Complaints
                </h1>

                <p class="text-gray-500 mt-1">
                    Track and manage your submitted disaster complaints.
                </p>
            </div>

            

            <button>
                <a href="{{ route('complaints.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-2xl font-semibold shadow-lg transition">

                    + Create Complaint

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

            <form
                action="{{ route('complaints.destroy', $complaint->id) }}"
                method="POST"
                onsubmit="return confirm('Delete this complaint?')">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="mt-2 w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded-2xl font-semibold transition">

                    Delete Complaint

                </button>

            </form>

            <div class="p-5">

                <div class="flex items-center justify-between">

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

                <p class="text-gray-500 mt-2">
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

        </div>

    @endforeach

</div>

    </div>

</x-app-layout.dashboard>
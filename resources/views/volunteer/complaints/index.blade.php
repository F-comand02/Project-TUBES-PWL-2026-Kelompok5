<x-layouts.dashboard
    title="Manage Complaints"
    color="green"
    role="volunteer">

<div class="space-y-6">

    <div>
        <h1 class="text-3xl font-bold mb-6">
            Manajemen Komplain
        </h1>

        <p class="text-gray-500 mt-2">
            Kelola laporan bencana dari warga untuk memastikan bantuan yang cepat dan tepat sasaran.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

    @foreach($complaints as $complaint)

        <div class="bg-white rounded-[2rem] overflow-hidden shadow-lg border border-gray-100">

                    <!-- IMAGE -->
                    @if($complaint->images->first())

                        <div class="w-full h-44 overflow-hidden bg-gray-100">

                            <img
                            src="{{ asset('storage/complaints/' . $complaint->images->first()->image_path) }}"
                            class="w-full h-full object-cover hover:scale-105 transition duration-500">

                        </div>

                    @endif

                    <!-- CONTENT -->
                    <div class="p-5">

                        <!-- TOP -->
                        <div class="flex items-start justify-between gap-4">

                            <div>

                                <h1 class="text-xl font-black text-slate-900">
                                    {{ $complaint->title }}
                                </h1>

                                <p class="text-gray-500 mt-1">
                                    Posted by
                                    <span class="font-semibold">
                                        {{ $complaint->user->name ?? 'Citizen' }}
                                    </span>
                                </p>

                            </div>

                            <!-- STATUS -->
                            <span
                                class="px-4 py-2 rounded-full text-sm font-semibold whitespace-nowrap

                                @if($complaint->status == 'pending')
                                    bg-yellow-100 text-yellow-700
                                @elseif($complaint->status == 'processing')
                                    bg-blue-100 text-blue-700
                                @else
                                    bg-green-100 text-green-700
                                @endif">

                                {{ ucfirst(str_replace('_', ' ', $complaint->status)) }}

                            </span>

                        </div>

                        <!-- DESCRIPTION -->
                        <p class="mt-5 text-gray-600 leading-relaxed">
                            {{ $complaint->description }}
                        </p>

                        <!-- TAG -->
                        <div class="flex flex-wrap gap-3 mt-6">

                            <span class="bg-cyan-100 text-cyan-700 px-4 py-2 rounded-full text-sm font-semibold">
                                {{ $complaint->category }}
                            </span>

                            <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-semibold">
                                {{ ucfirst($complaint->urgency_level) }}
                            </span>

                        </div>

                        <!-- UPDATE STATUS -->
                        <form
                            action="{{ route('volunteer.complaints.update', $complaint->id) }}"
                            method="POST"
                            class="mt-7">

                            @csrf
                            @method('PATCH')

                            <select
                                name="status"
                                class="w-full rounded-2xl border-gray-200 focus:border-green-500 focus:ring-green-500 py-3">

                                <option
                                    value="pending"
                                    {{ $complaint->status == 'pending' ? 'selected' : '' }}>

                                    Pending

                                </option>

                                <option
                                    value="processing"
                                    {{ $complaint->status == 'processing' ? 'selected' : '' }}>

                                    Processing

                                </option>

                                <option
                                    value="completed"
                                    {{ $complaint->status == 'completed' ? 'selected' : '' }}>

                                    Completed

                                </option>

                            </select>

                            <button
                                type="submit"
                                class="mt-4 w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:scale-[1.02] hover:shadow-lg transition text-white py-3 rounded-2xl font-bold">

                                Update Complaint Status

                            </button>

                        </form>

                        <form
                            action="{{ route('volunteer.complaints.destroy', $complaint->id) }}"
                            method="POST"
                            class="mt-3"
                            onsubmit="return confirm('Delete this complaint?')">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-2xl font-bold transition">

                                Delete Complaint

                            </button>

                        </form>

                    </div>

                </div>

            @endforeach

        </div>

    <!-- PAGINATION -->

</div>

</x-layouts.dashboard>
<x-layouts.dashboard title="My Complaint" role="citizen">

    <section class="relative min-h-screen overflow-hidden">

        <!-- Hero Slider -->
    <div x-data="{
    current: 0,
    images: [
    '{{ asset('images/Hero-2.jpg') }}',
    '{{ asset('images/Hero-3.jpg') }}',
    '{{ asset('images/Hero-1.jpg') }}'
    ]
    }"

    x-init="setInterval(() => {
    current = (current + 1) % images.length
    }, 4000)"

    class="absolute inset-0">

    <template x-for="(image, index) in images" :key="index">

        <img
            :src="image"

            x-show="current === index"

            x-transition:enter="transition-opacity duration-1000"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"

            x-transition:leave="transition-opacity duration-1000"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"

            class="absolute inset-0 w-full h-full object-cover">

    </template>

    </div>
        <div class="absolute inset-0 bg-black/60"></div>

        <!-- CONTENT -->
        <div class="relative z-10 flex items-center justify-center min-h-screen p-4">

            <!-- CARD -->
            <div
                class="w-full max-w-3xl bg-white/95 backdrop-blur-md rounded-3xl shadow-2xl p-6 sm:p-8">

                <h1 class="text-3xl sm:text-4xl font-bold text-gray-800">
                    Buat Komplain Baru
                </h1>

                <p class="text-gray-500 mt-2">
                    Laporkan kebutuhan atau masalah yang Anda hadapi selama bencana untuk mendapatkan bantuan secepatnya
                </p>

                <!-- FORM -->
                @if ($errors->any())

    <div class="bg-red-100 text-red-700 p-4 rounded-xl">

        <ul class="list-disc pl-5">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

                <form
                    action="{{ route('complaints.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="space-y-6">

                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Complaint Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            class="w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Category
                        </label>

                        <select
                            name="category"
                            class="w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                            <option>food</option>
                            <option>water</option>
                            <option>medical</option>
                            <option>shelter</option>
                            <option>emergency</option>
                            <option>other</option>
                            
                        </select>
                    </div>

                                        <!-- Urgency Level -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Urgency Level
                        </label>

                        <select
                            name="urgency_level"
                            required
                            class="w-full rounded-2xl border-gray-300 focus:border-red-500 focus:ring-red-500">

                            <option value="">
                                Select urgency level
                            </option>

                            <option value="low">
                                Low - Situation is manageable
                            </option>

                            <option value="medium">
                                Medium - Needs attention soon
                            </option>

                            <option value="high">
                                High - Immediate response needed
                            </option>

                        </select>

                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="5"
                            class="w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Upload Evidence Image
                        </label>

                        <input
                            type="file"
                            name="image"
                            class="block w-full text-sm text-gray-500">
                    </div>

                    <div class="mt-6">

                    <label
                        class="block text-gray-700 font-semibold mb-2">

                        Shelter / Posko

                    </label>

                    <select
                        name="shelter_id"
                        class="w-full border rounded-xl p-3">

                        <option disabled selected>

                            Select Shelter

                        </option>

                        @foreach($shelters as $shelter)

                            <option value="{{ $shelter->id }}">

                                {{ $shelter->shelter_name }}
                                -
                                {{ $shelter->address }}

                            </option>

                        @endforeach

                    </select>

                </div>

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-2xl font-semibold">

                        Submit Complaint

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-layouts.dashboard>
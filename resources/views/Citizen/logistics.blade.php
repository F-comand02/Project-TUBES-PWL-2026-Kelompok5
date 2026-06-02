<x-layouts.dashboard title="Informasi Bantuan" role="citizen">

<div class="p-4 sm:p-6 space-y-6">

    <!-- Header -->
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Informasi Bantuan
        </h1>

        <p class="text-gray-500 mt-1">
            Informasi bantuan yang tersedia untuk korban bencana.
        </p>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white rounded-3xl shadow-lg p-6">
            <h3 class="text-gray-500">
                Total Bantuan
            </h3>

            <p class="text-4xl font-bold text-blue-600 mt-2">
                {{ $totalItems }}
            </p>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6">
            <h3 class="text-gray-500">
                Total Posko
            </h3>

            <p class="text-4xl font-bold text-green-600 mt-2">
                {{ $totalShelters }}
            </p>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6">
            <h3 class="text-gray-500">
                Kategori Bantuan
            </h3>

            <p class="text-4xl font-bold text-purple-600 mt-2">
                {{ $totalCategories }}
            </p>
        </div>

    </div>

    <!-- Data Bantuan -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        @forelse($logistics as $item)

        <div class="bg-white rounded-3xl shadow-lg p-6">

            <div class="flex justify-between items-center">

                <h2 class="text-xl font-bold text-gray-800">
                    {{ $item->item_name }}
                </h2>

                @if($item->stock > $item->minimum_stock)

                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                        Tersedia
                    </span>

                @else

                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">
                        Menipis
                    </span>

                @endif

            </div>

            <div class="mt-4 space-y-2 text-gray-600">

                <p>
                    🏠 <strong>Posko:</strong>
                    {{ $item->shelter->shelter_name ?? '-' }}
                </p>

                <p>
                    📦 <strong>Kategori:</strong>
                    {{ $item->category->category_name ?? '-' }}
                </p>

                <p>
                    📊 <strong>Stok:</strong>
                    {{ $item->stock }}
                </p>

                <p>
                    📅 <strong>Kadaluarsa:</strong>
                    {{ $item->expired_date }}
                </p>

            </div>

        </div>

        @empty

        <div class="col-span-full bg-white rounded-3xl shadow-lg p-10 text-center">

            <div class="text-6xl mb-4">
                📦
            </div>

            <h2 class="text-2xl font-bold text-gray-700">
                Belum Ada Bantuan Tersedia
            </h2>

            <p class="text-gray-500 mt-2">
                Saat ini belum ada data bantuan yang ditambahkan oleh volunteer.
            </p>

        </div>

        @endforelse

    </div>

</div>

</x-layouts.dashboard>
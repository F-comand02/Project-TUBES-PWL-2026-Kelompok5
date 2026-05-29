<x-layouts.dashboard
    title="Logistics Management"
    color="green"
    role="volunteer">

<div class="p-6">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold text-slate-800">

            Logistics Management

        </h1>

        <a href="{{ route('logistics.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl font-semibold">

            + Add Logistics

        </a>

    </div>

    <form method="GET"
          action="{{ route('logistics.index') }}"
          class="mb-5">

        <input type="text"
               name="search"
               placeholder="Search logistics..."
               class="w-full border rounded-2xl px-5 py-3">

    </form>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">

        <div class="bg-white rounded-2xl shadow p-5">

            <h2 class="text-gray-500 text-sm">
                Total Items
            </h2>

            <p class="text-3xl font-bold mt-2">
                {{ $totalItems }}
            </p>

        </div>

        <div class="bg-white rounded-2xl shadow p-5">

            <h2 class="text-gray-500 text-sm">
                Low Stock
            </h2>

            <p class="text-3xl font-bold text-red-500 mt-2">
                {{ $lowStock }}
            </p>

        </div>

        <div class="bg-white rounded-2xl shadow p-5">

            <h2 class="text-gray-500 text-sm">
                Expiring Soon
            </h2>

            <p class="text-3xl font-bold text-yellow-500 mt-2">
                {{ $expiringSoon }}
            </p>

        </div>

    </div>

    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>

                    <th class="p-4 text-left">Item</th>
                    <th class="p-4 text-left">Category</th>
                    <th class="p-4 text-left">Stock</th>
                    <th class="p-4 text-left">Expired</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Action</th>

                </tr>

            </thead>

            <tbody>

                @foreach($logistics as $logistic)

                <tr class="border-t">

                    <td class="p-4">

                        {{ $logistic->item_name }}

                    </td>

                    <td class="p-4">

                        {{ $logistic->category->category_name }}

                    </td>

                    <td class="p-4">

                        {{ $logistic->stock }}

                    </td>

                    <td class="p-4">

                        {{ $logistic->expired_date }}

                        @if(
                            $logistic->expired_date &&
                            \Carbon\Carbon::parse($logistic->expired_date)
                                ->diffInDays(now()) <= 7
                        )

                            <div class="mt-2">

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">

                                    Expiring Soon

                                </span>

                            </div>

                        @endif

                    </td>

                    <td class="p-4">

                        @if($logistic->stock <= $logistic->minimum_stock)

                            <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-semibold">

                                Low Stock

                            </span>

                        @else

                            <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-semibold">

                                Safe

                            </span>

                        @endif

                    </td>

                    <td class="p-4 flex gap-2">

                        <a href="{{ route('logistics.edit', $logistic->id) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg">

                            Edit

                        </a>

                        <form action="{{ route('logistics.destroy', $logistic->id) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this item?')">

                            @csrf
                            @method('DELETE')

                            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</x-layouts.dashboard>
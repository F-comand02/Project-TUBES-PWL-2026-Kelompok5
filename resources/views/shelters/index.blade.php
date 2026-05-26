<x-layouts.dashboard
    title="Shelter Management"
    color="green"
    role="volunteer">

<div class="p-6">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">

            Shelter Management

        </h1>

        <a href="{{ route('shelters.create') }}"
           class="bg-green-600 text-white px-5 py-3 rounded-xl">

            + Add Shelter

        </a>

    </div>

    @foreach($shelters as $shelter)

    <div class="bg-white rounded-2xl p-6 shadow mb-6">

        <div class="flex justify-between items-center">

            <div>

                <h2 class="text-2xl font-bold">

                    {{ $shelter->shelter_name }}

                </h2>

                <p class="text-gray-500">

                    {{ $shelter->address }}

                </p>

            </div>

            <div>

                @if(
                    $shelter->current_refugees
                    >
                    $shelter->capacity
                )

                    <span class="bg-red-100 text-red-600 px-4 py-2 rounded-full text-sm">

                        OVERLOAD

                    </span>

                @else

                    <span class="bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm">

                        SAFE

                    </span>

                @endif

            </div>

        </div>

        <div class="mt-4">

            Capacity:
            {{ $shelter->current_refugees }}
            /
            {{ $shelter->capacity }}

        </div>

        <div class="mt-6">

            <h3 class="font-bold text-lg mb-4">

                Logistics

            </h3>

        @if($shelter->logistics->count())

        @foreach($shelter->logistics as $logistic)

        <div class="border rounded-xl p-4 mb-3">

            <div class="flex justify-between items-center">

                <h4 class="font-semibold text-lg">

                    {{ $logistic->item_name }}

                </h4>

                @if($logistic->stock <= 10)

                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs">

                        Low Stock

                    </span>

                @endif

            </div>

            <div class="mt-2">

                <span
                class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs">

                    {{ $logistic->category->category_name }}

                </span>

            </div>

            <p class="text-sm mt-3">

                Stock:
                {{ $logistic->stock }}

            </p>

            </div>

        @endforeach

        @else

            <p class="text-gray-400">

                No logistics available

            </p>

        @endif

        </div>

        <div class="flex gap-3 mt-5">

            <a href="{{ route('shelters.edit', $shelter->id) }}"
               class="bg-yellow-400 text-white px-4 py-2 rounded-xl">

                Edit

            </a>

            <form action="{{ route('shelters.destroy', $shelter->id) }}"
                  method="POST">

                @csrf
                @method('DELETE')

                <button class="bg-red-500 text-white px-4 py-2 rounded-xl">

                    Delete

                </button>

            </form>

        </div>

    </div>

    @endforeach

</div>

</x-layouts.dashboard>
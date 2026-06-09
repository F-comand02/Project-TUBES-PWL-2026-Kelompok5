<x-layouts.dashboard
    title="Shelter Management"
    color="green"
    role="volunteer">

<div class="p-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6 from-emerald-500 to-green-600 bg-gradient-to-r rounded-3xl p-6 text-white shadow-lg">

        <h1 class="text-3xl font-bold">

            Shelter Management

        </h1>
        
        <a href="{{ route('shelters.create') }}"
           class="bg-green-500 text-white px-5 py-3 rounded-xl shadow hover:bg-green-600 hover:scale-90 duration-200 transition">

            Add Shelter

        </a>

    </div>

    @foreach($shelters as $shelter)

    <div class="bg-white rounded-2xl p-6 shadow mb-6">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>

                <h2 class="text-2xl font-bold">

                    {{ $shelter->shelter_name }}

                </h2>

                <p class="text-gray-500">

                    {{ $shelter->address }}

                </p>

            </div>

            <div>

                @if( $shelter->current_refugees >= $shelter->capacity)

                    <span class="bg-red-100 text-red-600 px-4 py-2 rounded-full text-sm">

                        OVERLOAD

                    </span>

                @elseif(($shelter->current_refugees / $shelter->capacity) >= 0.8)
                    <span class="bg-yellow-100 text-yellow-600 px-4 py-2 rounded-full text-sm">

                        Nearly Full

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

        <div class="mt-6 bg-gray-100 p-3 rounded-xl">

            <h3 class="font-bold text-lg mb-2">

                Logistics

            </h3>

        @if($shelter->logistics->count())

        @foreach($shelter->logistics as $logistic)

        <a href="{{ route('logistics.index') }}">

        <div class="rounded-xl p-4 mb-3 bg-gray-200 hover:bg-gray-300 cursor-pointer">

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

        </a>

@endforeach

        @else

            <p class="text-gray-400">

                No logistics available

            </p>

        @endif

        </div>

        <div class="flex gap-3 mt-5">

            <a
            href="{{ route('logistics.create', ['shelter' => $shelter->id]) }}"
            class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:scale-90 duration-200 transition">

            Add Logistics

            </a>

            <a href="{{ route('shelters.edit', $shelter->id) }}"
               class="bg-yellow-400 text-white px-4 py-2 rounded-xl hover:scale-90 duration-200 transition">

                Edit

            </a>

            <form action="{{ route('shelters.destroy', $shelter->id) }}"
                  method="POST">

                @csrf
                @method('DELETE')

                <button class="bg-red-500 text-white px-4 py-2 rounded-xl hover:scale-90 duration-200 transition">

                    Delete

                </button>

            </form>

        </div>
        
    </div>
    
    @endforeach
    
    @if($shelters->isEmpty())

        <div class="bg-white rounded-2xl shadow p-8 text-center text-bold text-gray-500 mt-6 mx-6">
            <h3 class="text-lg">Belum ada shelter</h3>
        </div>

    @endif

</div>

</x-layouts.dashboard>
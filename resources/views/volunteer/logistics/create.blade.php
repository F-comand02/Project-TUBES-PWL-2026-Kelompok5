<x-layouts.dashboard
    title="Create Logistic"
    color="green"
    role="volunteer">

<div class="p-6">

    <h1 class="text-3xl font-bold mb-6">

        Add Logistics

    </h1>

    @if(isset($selectedShelter))

        <div class="bg-blue-100 text-blue-700 p-3 rounded-xl mb-4">

        Adding logistics for shelter ID:
        {{ $selectedShelter }}

        </div>

    @endif

    <form
        action="{{ route('logistics.store') }}"
        method="POST"
        class="bg-white p-6 rounded-2xl shadow space-y-5">

        @csrf

        <!-- ITEM NAME -->
        <div>

            <label class="block mb-2 font-semibold">

                Item Name

            </label>

            <input
                type="text"
                name="item_name"
                class="w-full border rounded-xl p-3">

        </div>

        <!-- CATEGORY -->
        <div>

            <label class="block mb-2 font-semibold">

                Category

            </label>

            <select
            name="category_id"
            class="w-full border border-gray-300 rounded-xl p-3 bg-white">

            <option selected disabled>

                Select Category

            </option>
                @foreach($categories as $category)

                    <option value="{{ $category->id }}">

                        {{ $category->category_name }}

                    </option>

                @endforeach

            </select>

        </div>

        <!-- SHELTER -->
        <div>

            <label class="block mb-2 font-semibold">

                Shelter

            </label>

            <select
                name="shelter_id"
                class="w-full border border-gray-300 rounded-xl p-3 bg-white">

                <option selected disabled>

                    Select Shelter

                </option>

                @foreach($shelters as $shelter)

                    <option
                        value="{{ $shelter->id }}"
                        {{ isset($selectedShelter) && $selectedShelter == $shelter->id ? 'selected' : '' }}>

                        {{ $shelter->shelter_name }}

                    </option>

                @endforeach

            </select>

        </div>

        <!-- STOCK -->
        <div>

            <label class="block mb-2 font-semibold">

                Stock

            </label>

            <input
                type="number"
                name="stock"
                class="w-full border rounded-xl p-3">

        </div>

        <!-- MINIMUM STOCK -->
        <div>

            <label class="block mb-2 font-semibold">

                Minimum Stock

            </label>

            <input
                type="number"
                name="minimum_stock"
                class="w-full border rounded-xl p-3">

        </div>

        <!-- EXPIRED DATE -->
        <div>

            <label class="block mb-2 font-semibold">

                Expired Date

            </label>

            <input
                type="date"
                name="expired_date"
                class="w-full border rounded-xl p-3">

        </div>

        <!-- DESCRIPTION -->
        <div>

            <label class="block mb-2 font-semibold">

                Description

            </label>

            <textarea
                name="description"
                class="w-full border rounded-xl p-3"></textarea>

        </div>

        <!-- BUTTON -->
        <button
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

            Save Logistics

        </button>

        <div class="mb-4">
            <a href="{{ route('shelters.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                Back
            </a>
        </div>

    </form>

</div>

</x-layouts.dashboard>
<x-layouts.dashboard
    title="Create Shelter"
    color="green"
    role="volunteer">

<div class="p-6">

    <h1 class="text-3xl font-bold mb-6">
        Create Shelter
    </h1>

    <form
        action="{{ route('shelters.store') }}"
        method="POST"
        class="bg-white p-6 rounded-2xl shadow space-y-4">

        @csrf

        <div>

            <label class="block mb-2 font-semibold">
                Shelter Name
            </label>

            <input
                type="text"
                name="shelter_name"
                class="w-full border rounded-xl p-3">

        </div>

        <div>

            <label class="block mb-2 font-semibold">
                Address
            </label>

            <textarea
                name="address"
                class="w-full border rounded-xl p-3"></textarea>

        </div>

        <div>

            <label class="block mb-2 font-semibold">
                Capacity
            </label>

            <input
                type="number"
                name="capacity"
                class="w-full border rounded-xl p-3">

        </div>

        <div>

            <label class="block mb-2 font-semibold">
                Current Refugees
            </label>

            <input
                type="number"
                name="current_refugees"
                class="w-full border rounded-xl p-3">

        </div>

        <div>

            <label class="block mb-2 font-semibold">
                Status
            </label>

            <select
                name="status"
                class="w-full border rounded-xl p-3">

                <option value="active">
                    Active
                </option>

                <option value="full">
                    Full
                </option>

                <option value="closed">
                    Closed
                </option>

            </select>

        </div>

        <button
            class="bg-green-600 text-white px-6 py-3 rounded-xl">

            Save Shelter

        </button>

    </form>

</div>

</x-layouts.dashboard>
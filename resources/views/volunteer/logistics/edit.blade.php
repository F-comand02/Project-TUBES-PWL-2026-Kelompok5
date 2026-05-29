<x-layouts.dashboard
    title="Edit Logistic"
    color="green"
    role="volunteer">

<div class="p-6">

    <h1 class="text-3xl font-bold mb-6">

        Edit Logistics

    </h1>

    <form action="{{ route('logistics.update', $logistic->id) }}"
          method="POST"
          class="bg-white p-6 rounded-2xl shadow space-y-5">

        @csrf
        @method('PUT')

        <div>

            <label>Item Name</label>

            <input type="text"
                   name="item_name"
                   value="{{ $logistic->item_name }}"
                   class="w-full border rounded-xl p-3">

        </div>

        <div>

            <label>Category</label>

            <select name="category_id"
                    class="w-full border rounded-xl p-3">

                @foreach($categories as $category)

                    <option value="{{ $category->id }}"
                        {{ $logistic->category_id == $category->id ? 'selected' : '' }}>

                        {{ $category->category_name }}

                    </option>

                @endforeach

            </select>

        </div>

        <div>

            <label>Stock</label>

            <input type="number"
                   name="stock"
                   value="{{ $logistic->stock }}"
                   class="w-full border rounded-xl p-3">

        </div>

        <div>

            <label>Minimum Stock</label>

            <input type="number"
                   name="minimum_stock"
                   value="{{ $logistic->minimum_stock }}"
                   class="w-full border rounded-xl p-3">

        </div>

        <div>

            <label>Expired Date</label>

            <input type="date"
                   name="expired_date"
                   value="{{ $logistic->expired_date }}"
                   class="w-full border rounded-xl p-3">

        </div>

        <div>

            <label>Description</label>

            <textarea name="description"
                      class="w-full border rounded-xl p-3">{{ $logistic->description }}</textarea>

        </div>

        <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl">

            Update Logistics

        </button>

        <a href="{{ route('logistics.index') }}"
           class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-xl">
            Back
        </a>

    </form>

</div>

</x-layouts.dashboard>
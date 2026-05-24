@extends('layouts.dashboard')

@section('content')

<div class="p-6">

    <h1 class="text-3xl font-bold mb-6">

        Add Logistics

    </h1>

    <form action="{{ route('logistics.store') }}"
          method="POST"
          class="bg-white p-6 rounded-2xl shadow space-y-5">

        @csrf

        <div>

            <label>Item Name</label>

            <input type="text"
                   name="item_name"
                   class="w-full border rounded-xl p-3">

        </div>

        <div>

            <label>Category</label>

            <select name="category_id"
                    class="w-full border rounded-xl p-3">

                @foreach($categories as $category)

                    <option value="{{ $category->id }}">

                        {{ $category->category_name }}

                    </option>

                @endforeach

            </select>

            <label>Shelter</label>
                    <select name="shelter_id">

                @foreach($shelters as $shelter)

                    <option value="{{ $shelter->id }}">

                        {{ $shelter->shelter_name }}

                    </option>

                @endforeach

            </select>
            </div>

        <div>

            <label>Stock</label>

            <input type="number"
                   name="stock"
                   class="w-full border rounded-xl p-3">

        </div>

        <div>

            <label>Minimum Stock</label>

            <input type="number"
                   name="minimum_stock"
                   class="w-full border rounded-xl p-3">

        </div>

        <div>

            <label>Expired Date</label>

            <input type="date"
                   name="expired_date"
                   class="w-full border rounded-xl p-3">

        </div>

        <div>

            <label>Description</label>

            <textarea name="description"
                      class="w-full border rounded-xl p-3"></textarea>

        </div>

        <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

            Save Logistics

        </button>

    </form>

</div>

@endsection
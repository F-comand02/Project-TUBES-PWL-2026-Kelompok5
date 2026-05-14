<x-app-layout>

    <div class="py-12">

        <div class="max-w-3xl mx-auto">

            <div class="bg-white rounded-2xl shadow-md p-6">

                <h1 class="text-2xl font-bold mb-6">
                    Profile Management
                </h1>

                @if(session('success'))

                    <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4">
                        {{ session('success') }}
                    </div>

                @endif

                <form method="POST" action="{{ route('profile.update') }}">

                    @csrf
                    @method('PATCH')

                    <div class="mb-4">

                        <label class="block mb-2">
                            Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ auth()->user()->name }}"
                            class="w-full rounded-xl border-gray-300">

                    </div>

                    <div class="mb-4">

                        <label class="block mb-2">
                            Phone
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ auth()->user()->phone }}"
                            class="w-full rounded-xl border-gray-300">

                    </div>

                    <div class="mb-4">

                        <label class="block mb-2">
                            Address
                        </label>

                        <textarea
                            name="address"
                            class="w-full rounded-xl border-gray-300">{{ auth()->user()->address }}</textarea>

                    </div>

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl">

                        Update Profile

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>
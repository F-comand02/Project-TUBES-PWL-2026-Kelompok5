<x-app-layout>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl rounded-2xl p-6">

                <h1 class="text-3xl font-bold text-gray-800">
                    Admin Dashboard
                </h1>

                <div class="mt-6">
                    <h2 class="text-xl font-semibold">Two-Factor Authentication</h2>
                    @if(auth()->user()->two_factor_enabled)
                        <p class="text-green-600">Enabled</p>
                        <form method="POST" action="{{ route('two-factor.disable') }}">
                            @csrf
                            <button type="submit" class="mt-2 px-4 py-2 bg-red-500 text-white rounded">Disable 2FA</button>
                        </form>
                    @else
                        <p class="text-red-600">Disabled</p>
                        <form method="POST" action="{{ route('two-factor.enable') }}">
                            @csrf
                            <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Enable 2FA</button>
                        </form>
                    @endif
                </div>

            </div>

        </div>

    </div>

</x-app-layout>
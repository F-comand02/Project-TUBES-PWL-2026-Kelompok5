<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold">Two-Factor Verification</h2>
                <p class="text-sm text-gray-600 mt-2">Enter the 6-digit code sent to your email.</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('two-factor.verify') }}">
                @csrf

                <div>
                    <x-input-label for="code" :value="__('Two-Factor Code')" />
                    <x-text-input id="code" class="block mt-2 w-full" type="text" name="code" :value="old('code')" required autofocus autocomplete="one-time-code" />
                    <x-input-error :messages="$errors->get('code')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Verify') }}
                    </x-primary-button>
                </div>
            </form>

        </div>
    </div>
</x-guest-layout>

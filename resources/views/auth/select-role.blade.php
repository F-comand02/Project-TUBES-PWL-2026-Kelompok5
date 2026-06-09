<x-guest-layout>
    <div class="p-6 bg-white rounded-2xl shadow-sm">
        <h1 class="text-2xl font-semibold mb-4">Choose Your Role</h1>

        <p class="text-sm text-gray-500 mb-4">
            Please choose whether you want to register as a Citizen or a Volunteer.
            You can change this only after selecting your role.
        </p>

        <form method="POST" action="{{ route('role.update') }}">
            @csrf

            <div class="mt-4">
                <x-input-label for="role_id" :value="__('Role')" />

                <select id="role_id" name="role_id" class="block mt-1 w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ ucfirst($role->role_name) }}</option>
                    @endforeach
                </select>

                <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-primary-button>
                    {{ __('Continue') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>

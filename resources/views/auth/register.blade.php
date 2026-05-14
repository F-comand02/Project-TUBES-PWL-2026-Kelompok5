<x-guest-layout>

    <div class="min-h-screen grid lg:grid-cols-2">

        <!-- Left -->
        <div class="hidden lg:flex bg-gradient-to-br from-blue-600 to-blue-800 relative overflow-hidden">

            <div class="absolute inset-0 bg-black/10"></div>

            <div class="relative z-10 flex flex-col justify-center px-20 text-white">

                <h1 class="text-6xl font-extrabold leading-tight">
                    Join WaterRelief
                </h1>

                <p class="mt-6 text-xl text-blue-100 leading-relaxed max-w-lg">

                    Become part of a humanitarian platform
                    dedicated to disaster response,
                    clean water access, and community support.

                </p>

                <div class="mt-10 grid grid-cols-2 gap-4">

                    <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl">

                        <h2 class="text-4xl font-bold">
                            28+
                        </h2>

                        <p class="mt-2 text-blue-100">
                            Active Shelters
                        </p>

                    </div>

                    <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl">

                        <h2 class="text-4xl font-bold">
                            680+
                        </h2>

                        <p class="mt-2 text-blue-100">
                            Volunteers
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <!-- Right -->
        <div class="flex items-center justify-center bg-gray-50 px-6 py-12">

            <div class="w-full max-w-md">

                <!-- Logo -->
                <div class="text-center mb-10">

                    <div class="w-20 h-20 bg-blue-600 rounded-3xl mx-auto flex items-center justify-center text-white text-4xl shadow-lg">
                        💧
                    </div>

                    <h1 class="mt-6 text-4xl font-extrabold text-slate-900">
                        WaterRelief
                    </h1>

                    <p class="mt-2 text-gray-500">
                        Create your account
                    </p>

                </div>

                <!-- Card -->
                <div class="bg-white rounded-[2rem] shadow-xl p-10 border border-gray-100">

                    <h2 class="text-3xl font-bold text-slate-900">
                        Register
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Start helping communities today
                    </p>

                    <form method="POST"
                        action="{{ route('register') }}"
                        class="mt-8">

                        @csrf

                        <!-- Name -->
                        <div>

                            <x-input-label for="name" :value="__('Full Name')" />

                            <x-text-input
                                id="name"
                                class="block mt-2 w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                type="text"
                                name="name"
                                :value="old('name')"
                                required
                                autofocus />

                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                        </div>

                        <!-- Email -->
                        <div class="mt-6">

                            <x-input-label for="email" :value="__('Email')" />

                            <x-text-input
                                id="email"
                                class="block mt-2 w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required />

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        </div>

                        <!-- Role -->
                        <div class="mt-6">

                            <x-input-label for="role_id" :value="__('Role')" />

                            <select
                                id="role_id"
                                name="role_id"
                                required
                                class="block mt-2 w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                                <option value="" disabled selected>
                                    Select Role
                                </option>

                                <option value="2"
                                    {{ old('role_id') == 2 ? 'selected' : '' }}>

                                    Citizen

                                </option>

                                <option value="3"
                                    {{ old('role_id') == 3 ? 'selected' : '' }}>

                                    Volunteer

                                </option>

                            </select>

                            <x-input-error :messages="$errors->get('role_id')" class="mt-2" />

                        </div>

                        <!-- Password -->
                        <div class="mt-6">

                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input
                                id="password"
                                class="block mt-2 w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                type="password"
                                name="password"
                                required />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-6">

                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input
                                id="password_confirmation"
                                class="block mt-2 w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                type="password"
                                name="password_confirmation"
                                required />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                        </div>

                        <!-- Buttons -->
                        <div class="mt-8 space-y-4">

                            <x-primary-button
                                class="w-full justify-center py-4 rounded-2xl bg-blue-600 hover:bg-blue-700 text-base font-semibold">

                                Register

                            </x-primary-button>

                            <a href="{{ route('login') }}"
                                class="block text-center py-4 rounded-2xl border border-gray-300 hover:bg-gray-50 font-semibold text-gray-700 transition">

                                Already have an account?

                            </a>

                            <a href="{{ url('/') }}"
                                class="block text-center text-gray-500 hover:text-gray-700 text-sm">

                                ← Back to Home

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>
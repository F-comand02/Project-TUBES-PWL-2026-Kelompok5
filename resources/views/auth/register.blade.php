<x-guest-layout>

    <div class="min-h-screen lg:grid lg:grid-cols-2">

        <!-- LEFT -->
    <div class="hidden lg:flex relative overflow-hidden min-h-screen">

    <!-- Background Image -->
    <img
        src="{{ asset('images/Register/Register.jpg') }}"
        alt="Register Background"
        class="absolute inset-0 w-full h-full object-cover">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-slate-900/50 backdrop-blur-[2px]"></div>

    <!-- Gradient -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-700/70 to-cyan-500/40"></div>

    <!-- Content -->
    <div class="relative z-10 flex flex-col justify-center px-20 text-white">

        <p class="uppercase tracking-[6px] text-blue-100 font-bold text-sm">
            WaterRelief Platform
        </p>

        <h1 class="text-7xl font-extrabold leading-tight mt-6">
            Join WaterRelief
        </h1>

        <p class="mt-8 text-2xl text-blue-100 leading-relaxed max-w-xl">

            Jadilah bagian dari platform kemanusiaan
            untuk membantu distribusi bantuan,
            pengelolaan shelter, dan respons banjir
            secara cepat dan efisien.

        </p>

    </div>

    </div>
        <!-- RIGHT -->
        <div class="flex min-h-screen items-center justify-center bg-gray-50 px-6 py-10">

            <div class="w-full max-w-xl">

                <!-- Logo -->
                <div class="text-center mb-10">

                    <img
                        src="{{ asset('images/Logo.png') }}"
                        alt="Logo"
                        class="w-24 h-24 mx-auto object-contain">

                    <h1 class="mt-6 text-5xl font-medium text-slate-900">
                        WaterRelief
                    </h1>

                    <p class="mt-3 text-gray-500 text-lg">
                        Beri Komplainmu, Bantu Sesama
                    </p>

                </div>

                <!-- Card -->
                <div class="bg-white rounded-[2rem] shadow-xl p-10 border border-gray-100">

                    <h2 class="text-4xl font-medium text-slate-900">
                        Register
                    </h2>

                    <p class="text-gray-500 mt-3 text-lg">
                        Ayo mulai perjalananmu dengan WaterRelief
                    </p>

                    <form
                        method="POST"
                        action="{{ route('register') }}"
                        class="mt-10">

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

                                <option value="2" {{ old('role_id') == 2 ? 'selected' : '' }}>
                                    Citizen
                                </option>

                                <option value="3" {{ old('role_id') == 3 ? 'selected' : '' }}>
                                    Volunteer
                                </option>

                            </select>

                            <x-input-error :messages="$errors->get('role_id')" class="mt-2" />

                        </div>

                        <!-- Password -->
                        <div class="mt-6" x-data="{ show: false }">

                            <x-input-label for="password" :value="__('Password')" />

                            <div class="relative">

                                <x-text-input
                                id="password"
                                class="block mt-2 w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 pe-16"
                                x-bind:type="show ? 'text' : 'password'"
                                name="password"
                                required
                                autocomplete="new-password" />

                                <button
                                    type="button"
                                    @click="show = !show"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-sm font-semibold text-blue-600">

                                    <span x-text="show ? 'Hide' : 'Show'"></span>

                                </button>

                            </div>

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-6" x-data="{ show: false }">

                            <x-input-label
                                for="password_confirmation"
                                :value="__('Confirm Password')" />

                            <div class="relative">

                                <x-text-input
                                    id="password_confirmation"
                                    class="block mt-2 w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 pe-16"
                                    x-bind:type="show ? 'text' : 'password'"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password" />

                                <button
                                    type="button"
                                    @click="show = !show"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-sm font-semibold text-blue-600">

                                    <span x-text="show ? 'Hide' : 'Show'"></span>

                                </button>

                            </div>

                        </div>

                        <!-- Buttons -->
                        <div class="mt-8 space-y-4">

                            <x-primary-button
                                class="w-full justify-center py-4 rounded-2xl bg-blue-600 hover:bg-gray-700 text-base font-semibold">

                                Register

                            </x-primary-button>

                            <a
                                href="{{ route('login') }}"
                                class="block text-center py-4 rounded-2xl border border-gray-300 hover:bg-gray-50 font-semibold text-gray-700 transition">

                                Already have an account?

                            </a>

                            <a
                                href="{{ url('/') }}"
                                class="block text-center text-gray-500 hover:text-gray-700 text-sm">

                                Back to Home

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>
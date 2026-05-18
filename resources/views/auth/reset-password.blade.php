<x-guest-layout>

    <div class="min-h-screen grid lg:grid-cols-2">

        <!-- LEFT -->
        <div class="hidden lg:flex relative overflow-hidden">

            <!-- Background -->
            <img
                src="{{ asset('images/2FA/2FA.jpg') }}"
                alt="Background"
                class="absolute inset-0 w-full h-full object-cover">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-[2px]"></div>

            <!-- Gradient -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-700/70 to-cyan-500/40"></div>

            <!-- Content -->
            <div class="relative z-10 flex flex-col justify-center px-20 text-white">

                <p class="uppercase tracking-[6px] text-blue-100 font-bold text-sm">
                    WaterRelief Security
                </p>

                <h1 class="text-6xl font-extrabold leading-tight mt-6">
                    Reset Password
                </h1>

                <p class="mt-8 text-xl text-blue-100 leading-relaxed max-w-lg">

                    Buat password baru untuk menjaga keamanan akun
                    dan melanjutkan akses ke platform WaterRelief.

                </p>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="flex items-center justify-center bg-gray-50 px-6 py-12">

            <div class="w-full max-w-md">

                <!-- Logo -->
                <div class="text-center mb-10">

                    <img
                        src="{{ asset('images/Logo.png') }}"
                        alt="Logo"
                        class="w-20 h-20 object-contain rounded-2xl mx-auto">

                    <h1 class="mt-6 text-5xl font-extrabold text-slate-900">
                        WaterRelief
                    </h1>

                    <p class="mt-3 text-gray-500">
                        Create your new password
                    </p>

                </div>

                <!-- Card -->
                <div class="bg-white rounded-[2rem] shadow-xl p-10 border border-gray-100">

                    <h2 class="text-3xl font-bold text-slate-900">
                        Reset Password
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Enter your new secure password
                    </p>

                    <form
                        method="POST"
                        action="{{ route('password.store') }}"
                        class="mt-8">

                        @csrf

                        <!-- Token -->
                        <input
                            type="hidden"
                            name="token"
                            value="{{ $request->route('token') }}">

                        <!-- Email -->
                        <div>

                            <x-input-label
                                for="email"
                                :value="__('Email')" />

                            <x-text-input
                                id="email"
                                class="block mt-2 w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                type="email"
                                name="email"
                                :value="old('email', $request->email)"
                                required
                                autofocus
                                autocomplete="username" />

                            <x-input-error
                                :messages="$errors->get('email')"
                                class="mt-2" />

                        </div>

                        <!-- Password -->
                        <div
                            class="mt-6"
                            x-data="{ show: false }">

                            <x-input-label
                                for="password"
                                :value="__('New Password')" />

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

                            <x-input-error
                                :messages="$errors->get('password')"
                                class="mt-2" />

                        </div>

                        <!-- Confirm Password -->
                        <div
                            class="mt-6"
                            x-data="{ showConfirm: false }">

                            <x-input-label
                                for="password_confirmation"
                                :value="__('Confirm Password')" />

                            <div class="relative">

                                <x-text-input
                                    id="password_confirmation"
                                    class="block mt-2 w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 pe-16"
                                    x-bind:type="showConfirm ? 'text' : 'password'"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password" />

                                <button
                                    type="button"
                                    @click="showConfirm = !showConfirm"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-sm font-semibold text-blue-600">

                                    <span x-text="showConfirm ? 'Hide' : 'Show'"></span>

                                </button>

                            </div>

                            <x-input-error
                                :messages="$errors->get('password_confirmation')"
                                class="mt-2" />

                        </div>

                        <!-- Button -->
                        <div class="mt-8">

                            <x-primary-button
                                class="w-full justify-center py-4 rounded-2xl bg-blue-600 hover:bg-blue-700 text-base font-semibold">

                                Reset Password

                            </x-primary-button>

                        </div>

                        <!-- Back -->
                        <div class="mt-6 text-center">

                            <a
                                href="{{ route('login') }}"
                                class="text-gray-500 hover:text-gray-700 text-sm transition">

                                Back to Login

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>
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
                    Confirm Password
                </h1>

                <p class="mt-8 text-xl text-blue-100 leading-relaxed max-w-lg">

                    Demi keamanan akun dan data penting,
                    silakan konfirmasi password kamu
                    sebelum melanjutkan akses.

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
                        alt="WaterRelief Logo"
                        class="w-20 h-20 object-contain rounded-2xl mx-auto">

                    <h1 class="mt-6 text-5xl font-medium text-slate-900">
                        WaterRelief
                    </h1>

                    <p class="mt-3 text-gray-500">
                        Secure Account Verification
                    </p>

                </div>

                <!-- Card -->
                <div class="bg-white rounded-[2rem] shadow-xl p-10 border border-gray-100">

                    <h2 class="text-3xl font-bold text-slate-900">
                        Verify Password
                    </h2>

                    <p class="text-gray-500 mt-2 leading-7">

                        Masukkan password akun kamu
                        untuk melanjutkan proses keamanan.

                    </p>

                    <form
                        method="POST"
                        action="{{ route('password.confirm') }}"
                        class="mt-8">

                        @csrf

                        <!-- Password -->
                        <div
                            x-data="{ show: false }">

                            <x-input-label
                                for="password"
                                :value="__('Password')" />

                            <div class="relative">

                                <x-text-input
                                    id="password"
                                    class="block mt-2 w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 pe-16"
                                    x-bind:type="show ? 'text' : 'password'"
                                    name="password"
                                    required
                                    autocomplete="current-password" />

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

                        <!-- Button -->
                        <div class="mt-8">

                            <x-primary-button
                                class="w-full justify-center py-4 rounded-2xl bg-blue-600 hover:bg-blue-700 text-base font-semibold">

                                Confirm Password

                            </x-primary-button>

                        </div>

                        <!-- Back -->
                        <div class="mt-6 text-center">

                            <a
                                href="{{ route('dashboard') }}"
                                class="text-gray-500 hover:text-gray-700 text-sm transition">

                                ← Back

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>
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
                    Forgot Password?
                </h1>

                <p class="mt-8 text-xl text-blue-100 leading-relaxed max-w-lg">

                    Jangan khawatir. Masukkan email akun kamu
                    dan kami akan mengirimkan link reset password
                    untuk mendapatkan akses kembali.

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
                        Recover your account
                    </p>

                </div>

                <!-- Card -->
                <div class="bg-white rounded-[2rem] shadow-xl p-10 border border-gray-100">

                    <h2 class="text-3xl font-medium text-slate-900">
                        Reset Link
                    </h2>

                    <p class="text-gray-500 mt-2 leading-7">

                        Masukkan email akun kamu untuk menerima
                        link reset password.

                    </p>

                    <!-- Session -->
                    <x-auth-session-status
                        class="mb-4 mt-6"
                        :status="session('status')" />

                    <form
                        method="POST"
                        action="{{ route('password.email') }}"
                        class="mt-8">

                        @csrf

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
                                :value="old('email')"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="example@gmail.com" />

                            <x-input-error
                                :messages="$errors->get('email')"
                                class="mt-2" />

                        </div>

                        <!-- Button -->
                        <div class="mt-8">

                            <x-primary-button
                                class="w-full justify-center py-4 rounded-2xl bg-blue-600 hover:bg-blue-700 text-base font-semibold">

                                Kirim Link Reset Password

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
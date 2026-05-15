<x-guest-layout>

    <div class="min-h-screen grid lg:grid-cols-2">

        <!-- Left -->
        <div class="hidden lg:flex relative overflow-hidden">

            <!-- Background Image -->
            <img
                src="{{ asset('images/LogIn/Login.png') }}"
                alt="Background"
                class="absolute inset-0 w-full h-full object-cover">

            <!-- Blur Overlay -->
            <div class="absolute inset-0 bg-blue-900/50 backdrop-blur-[2px]"></div>

            <!-- Gradient -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-700/70 to-cyan-500/40"></div>

            <!-- Content -->
            <div class="relative z-10 flex flex-col justify-center px-20 text-white">

                <p class="uppercase tracking-[6px] text-blue-100 font-bold text-sm">
                    WaterRelief Platform
                </p>

                <h1 class="text-6xl font-extrabold leading-tight mt-6">
                    Welcome Back
                </h1>

                <p class="mt-8 text-xl text-blue-100 leading-relaxed max-w-lg">

                    Akses platform WaterRelief untuk mengelola
                    relawan, logistik, tempat penampungan,
                    dan respons darurat secara efisien.

                </p>

            </div>

        </div>

        <!-- Right -->
        <div class="flex items-center justify-center bg-gray-50 px-6 py-12">

            <div class="w-full max-w-md">

                <!-- Logo -->
                <div class="text-center mb-10">

                    <img src="{{ asset('images/Logo.png') }}"
                        alt="WaterRelief Logo"
                        class="w-16 h-16 object-contain rounded-2xl mx-auto">

                    <h1 class="mt-6 text-4xl font-extrabold text-slate-900">
                        WaterRelief
                    </h1>

                    <p class="mt-2 text-gray-500">
                        Beri komplainmu, bantu sesama
                    </p>

                </div>

                <!-- Card -->
                <div class="bg-white rounded-[2rem] shadow-xl p-10 border border-gray-100">

                    <h2 class="text-3xl font-bold text-slate-900">
                        Login
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Log in to your account
                    </p>

                    <!-- Session -->
                    <x-auth-session-status class="mb-4 mt-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="mt-8">

                        @csrf

                        <!-- Email -->
                        <div class="mt-6">


                            <x-input-label for="email" :value="__('Email')" />

                            <x-text-input
                                id="email"
                                class="block mt-2 w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                                autofocus
                                autocomplete="username" />

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        </div>

                    
                     <!-- Password -->
                <div class="mt-6" x-data="{ show: false }">

                    <x-input-label for="password" :value="__('Password')" />

                    <div class="relative">

                        <x-text-input
                            id="password"
                            class="block mt-2 w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 pe-16 relative z-0"
                            ::type="show ? 'text' : 'password'"
                            name="password"
                            required
                            autocomplete="current-password" />

                            <button
                            type="button"
                            @click="show = !show"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-sm font-semibold text-blue-600 z-20">

                            <span x-text="show ? 'Hide' : 'Show'"></span>

                        </button>

                        <!-- Remember Me Checkbox -->
                        </div>

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                        </div>

                        <div class="flex items-center justify-between mt-5">

                        <label class="flex items-center gap-3">

                            <input
                                type="checkbox"
                                name="remember"
                                class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">

                            <span class="text-gray-600">
                                Remember me
                            </span>

                        </label>

                        @if (Route::has('password.request'))

                            <a
                                href="{{ route('password.request') }}"
                                class="text-sm font-semibold text-blue-600 hover:text-blue-700 transition">

                                Forgot Password?

                            </a>

                        @endif

                    </div>
                        <!-- Buttons -->
                        <div class="mt-8 space-y-4">

                            <x-primary-button
                                class="w-full justify-center py-4 rounded-2xl bg-blue-600 hover:bg-blue-700 text-base font-semibold">

                                Log in

                            </x-primary-button>

                            <a href="{{ route('register') }}"
                                class="block text-center py-4 rounded-2xl border border-gray-300 hover:bg-gray-50 font-semibold text-gray-700 transition">

                                Create New Account

                            </a>

                            <a href="{{ url('/') }}"
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
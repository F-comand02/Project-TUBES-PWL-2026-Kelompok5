<x-guest-layout>

    <div class="min-h-screen grid lg:grid-cols-2">

        <!-- Left -->
        <div class="hidden lg:flex bg-blue-600 relative overflow-hidden">

            <div class="absolute inset-0 bg-black/10"></div>

            <div class="relative z-10 flex flex-col justify-center px-20 text-white">

                <h1 class="text-6xl font-extrabold leading-tight">
                    Welcome Back
                </h1>

                <p class="mt-6 text-xl text-blue-100 leading-relaxed max-w-lg">

                    Access WaterRelief platform to manage
                    volunteers, logistics, shelters, and
                    emergency response efficiently.

                </p>

                <div class="mt-10 flex gap-4">

                    <div class="bg-white/10 backdrop-blur-md px-6 py-4 rounded-2xl">
                        <h2 class="text-3xl font-bold">
                            3,200+
                        </h2>

                        <p class="text-blue-100">
                            Relief Missions
                        </p>
                    </div>

                    <div class="bg-white/10 backdrop-blur-md px-6 py-4 rounded-2xl">
                        <h2 class="text-3xl font-bold">
                            680+
                        </h2>

                        <p class="text-blue-100">
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
                        Clean Water, Better Life
                    </p>

                </div>

                <!-- Card -->
                <div class="bg-white rounded-[2rem] shadow-xl p-10 border border-gray-100">

                    <h2 class="text-3xl font-bold text-slate-900">
                        Login
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Sign in to your account
                    </p>

                    <!-- Session -->
                    <x-auth-session-status class="mb-4 mt-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="mt-8">

                        @csrf

                        <!-- Email -->
                        <div>

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
                        <div class="mt-6">

                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input
                                id="password"
                                class="block mt-2 w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                        </div>

                        <!-- Remember -->
                        <div class="flex items-center justify-between mt-6">

                            <label for="remember_me" class="flex items-center gap-2">

                                <input
                                    id="remember_me"
                                    type="checkbox"
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                                    name="remember">

                                <span class="text-sm text-gray-600">
                                    Remember me
                                </span>

                            </label>

                            @if (Route::has('password.request'))

                                <a href="{{ route('password.request') }}"
                                    class="text-sm text-blue-600 hover:text-blue-700 font-medium">

                                    Forgot password?

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

                                ← Back to Home

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>
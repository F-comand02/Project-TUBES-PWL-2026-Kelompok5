<x-guest-layout>

    <div class="min-h-screen lg:grid lg:grid-cols-2">

        <!-- LEFT -->
        <div class="hidden lg:flex relative overflow-hidden min-h-screen">

            <!-- Background -->
            <img
                src="{{ asset('images/2FA/2FA.jpg') }}"
                alt="Two Factor"
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

                <h1 class="text-7xl font-extrabold leading-tight mt-6">
                    Secure Verification
                </h1>

                <p class="mt-8 text-2xl text-blue-100 leading-relaxed max-w-xl">

                    Demi menjaga keamanan akun dan data relawan,
                    masukkan kode verifikasi 6 digit
                    yang telah dikirim ke email kamu.

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
                        Two-Factor Verification
                    </p>

                </div>

                <!-- Card -->
                <div class="bg-white rounded-[2rem] shadow-xl p-10 border border-gray-100">

                    <h2 class="text-4xl font-medium text-slate-900">
                        Verify Code
                    </h2>

                    <p class="text-gray-500 mt-3 text-lg leading-8">

                        Masukkan kode OTP 6 digit
                        yang dikirim ke email kamu.

                    </p>

                    <x-auth-session-status
                        class="mb-4 mt-6"
                        :status="session('status')" />

                    <form
                        method="POST"
                        action="{{ route('two-factor.verify') }}"
                        class="mt-10">

                        @csrf

                        <!-- OTP Code -->
                        <div x-data="{ code: '' }">

                            <x-input-label
                                for="code"
                                :value="__('Verification Code')" />

                            <div class="mt-5 relative">

                                <input
                                    id="code"
                                    type="password"
                                    inputmode="numeric"
                                    pattern="[0-9]*"
                                    name="code"
                                    maxlength="6"
                                    x-model="code"
                                    required
                                    autofocus
                                    autocomplete="one-time-code"
                                    placeholder=""
                                    class="w-full rounded-3xl border-2 border-gray-200 bg-gray-50/80
                                        focus:border-blue-500 focus:ring-4 focus:ring-blue-200
                                        text-center tracking-[18px] text-4xl font-black text-slate-900
                                        py-6 transition-all duration-300 outline-none
                                        placeholder:text-gray-300 shadow-lg">

                                <!-- Glow -->
                                <div
                                    class="absolute inset-0 rounded-3xl bg-blue-500/5 blur-2xl -z-10">
                                </div>

                            </div>

                            <p class="text-sm text-gray-400 mt-4 text-center leading-7">

                                Masukkan 6 digit kode verifikasi
                                yang telah dikirim ke email kamu.

                            </p>

                            <x-input-error
                                :messages="$errors->get('code')"
                                class="mt-3 text-center" />

                        </div>                        

                        </div>
                        <!-- Button -->
                        <div class="mt-8">

                            <x-primary-button
                                class="w-full justify-center py-4 rounded-2xl bg-blue-600 hover:bg-blue-700 text-base font-semibold">

                                Verify Account

                            </x-primary-button>

                        </div>

                        <!-- Back -->
                        <div class="mt-6 text-center">

                            <a
                                href="{{ route('login') }}"
                                class="text-gray-500 hover:text-gray-700 transition">

                                Back to Login

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>
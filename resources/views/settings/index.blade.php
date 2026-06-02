<x-layouts.dashboard
    title="Settings"
    color="{{ strtolower((string)(Auth::user()?->role?->role_name)) === 'volunteer' ? 'green' : 'blue' }}"
    role="{{ strtolower((string)(Auth::user()?->role?->role_name)) === 'volunteer' ? 'volunteer' : 'citizen' }}">


    <div class="space-y-8">

        <!-- HEADER -->
        @if(strtolower((string)(Auth::user()?->role?->role_name)) === 'volunteer')
            <div
                class="bg-gradient-to-r from-emerald-500 to-green-600 rounded-3xl p-8 text-white shadow-lg">

                <h1 class="text-3xl md:text-4xl font-black">
                    Account Settings
                </h1>

                <p class="mt-3 text-green-100 text-lg">
                    Silahkan kelola pengaturan akun dan preferensi notifikasi Anda di sini.
                </p>

            </div>

        @else
            <div
                class="bg-gradient-to-r from-cyan-600 to-cyan-300 rounded-3xl p-8 text-white shadow-lg">
                <h1 class="text-3xl md:text-4xl font-black">
                    Account Settings
                </h1>

                <p class="mt-3 text-cyan-100 text-lg">
                    Silahkan kelola pengaturan akun dan preferensi notifikasi Anda di sini.
                </p>
            </div>
        @endif

        <!-- SECURITY -->
        <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">

            <div class="flex items-center justify-between">

                <div>

                    <h2 class="text-2xl font-medium text-slate-900">
                        Keamanan Akun
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Silahkan perbarui pengaturan keamanan Anda untuk melindungi akun Anda.
                    </p>

                </div>

                <div
                    class="px-4 py-2 rounded-full bg-green-100 text-green-700 font-semibold">

                    Aman

                </div>

            </div>

            <div class="mt-8 grid md:grid-cols-2 gap-6">

                <!-- CHANGE PASSWORD -->
                <div
                    class="border border-gray-100 rounded-3xl p-6 hover:shadow-lg transition">

                    <h3 class="mt-5 text-xl font-bold text-slate-900">
                        Ubah Kata Sandi
                    </h3>

                    <p class="mt-2 text-gray-500">
                        Memperbarui kata sandi Anda secara berkala untuk menjaga keamanan akun Anda.
                    </p>

                    <a
                        href="{{ route('password.request') }}"
                        class="inline-block mt-6 px-5 py-3 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-semibold transition">

                        Ubah Kata Sandi

                    </a>

                </div>

                <!-- 2FA -->
                <div
                    class="border border-gray-100 rounded-3xl p-6 hover:shadow-lg transition">


                    <h3 class="mt-5 text-xl font-bold text-slate-900">
                        Dua Faktor Autentikasi (2FA)
                    </h3>

                    <p class="mt-2 text-gray-500">
                       Tambah lapisan keamanan ekstra ke akun Anda dengan mengaktifkan 2FA.
                    </p>

                    @if(auth()->user()->two_factor_enabled)

                        <form method="POST" action="{{ route('two-factor.disable') }}">

                            @csrf

                            <button
                                type="submit"
                                class="mt-6 px-5 py-3 rounded-2xl bg-red-500 hover:bg-red-600 text-white font-semibold transition">

                                Nonaktifkan 2FA

                            </button>

                        </form>

                    @else

                        <form method="POST" action="{{ route('two-factor.enable') }}">

                            @csrf

                            <button
                                type="submit"
                                class="mt-6 px-5 py-3 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-semibold transition">

                                Aktifkan 2FA

                            </button>

                        </form>

                    @endif

                </div>

            </div>

        </div>

        <!-- NOTIFICATION -->
        <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">

            <h2 class="text-2xl font-medium text-slate-900">
                Preferensi Notifikasi
            </h2>

            <p class="text-gray-500 mt-2">
                Mengontrol bagaimana Anda menerima pembaruan dan pemberitahuan dari aplikasi.
            </p>

            <div class="mt-8 space-y-5">

                <!-- EMAIL -->
                <div
                    class="flex items-center justify-between border border-gray-100 rounded-2xl p-5">

                    <div>

                        <h3 class="font-semibold text-slate-900">
                            Notifikasi Email
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Dapatkan pembaruan penting langsung ke kotak masuk Anda.
                        </p>

                    </div>

                    <input
                        type="checkbox"
                        checked
                        class="w-5 h-5 rounded text-cyan-500">

                </div>

                <!-- EMERGENCY -->
                <div
                    class="flex items-center justify-between border border-gray-100 rounded-2xl p-5">

                    <div>

                        <h3 class="font-semibold text-slate-900">
                            Alert Darurat
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Dapatkan pemberitahuan selama bencana atau situasi darurat.
                        </p>

                    </div>

                    <input
                        type="checkbox"
                        checked
                        class="w-5 h-5 rounded text-cyan-500">

                </div>

                <!-- COMPLAINT -->
                <div
                    class="flex items-center justify-between border border-gray-100 rounded-2xl p-5">

                    <div>

                        <h3 class="font-semibold text-slate-900">
                            Pembaruan Keluhan
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Terima pembaruan status untuk keluhan Anda.
                        </p>

                    </div>

                    <input
                        type="checkbox"
                        checked
                        class="w-5 h-5 rounded text-cyan-500">

                </div>

            </div>

        </div>

    </div>

</x-layouts.dashboard>
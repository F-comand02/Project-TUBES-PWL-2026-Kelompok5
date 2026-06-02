<x-layouts.dashboard title="Dashboard" role="citizen">

    <div
            class="bg-gradient-to-r from-cyan-600 to-cyan-300 rounded-3xl p-8 text-white shadow-lg">

            <h1 class="text-3xl md:text-4xl font-black">
                Dashboard
            </h1>

            <p class="mt-3 text-green-100 text-lg">
                Welcome back, {{ Auth::user()->name }} 👋
            </p>

        </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mt-6">

        <!-- CARD 1 -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500 font-medium">
                        Komplain Saya
                    </p>

                    <h2 class="text-5xl font-black mt-3 text-slate-900">
                        2
                    </h2>

                </div>

                <div
                    class="w-16 h-16 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-3xl">

                    📢

                </div>

            </div>

        </div>

        <!-- CARD 2 -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500 font-medium">
                        Posko Terdekat
                    </p>

                    <h2 class="text-5xl font-black mt-3 text-slate-900">
                        5
                    </h2>

                </div>

                <div
                    class="w-16 h-16 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-3xl">

                    🏠

                </div>

            </div>

        </div>

        <!-- CARD 3 -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500 font-medium">
                        Pengumuman
                    </p>

                    <h2 class="text-5xl font-black mt-3 text-slate-900">
                        3
                    </h2>

                </div>

                <div
                    class="w-16 h-16 rounded-2xl bg-yellow-100 text-yellow-600 flex items-center justify-center text-3xl">

                    📣

                </div>

            </div>

        </div>

        <!-- CARD 4 -->
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-gray-500 font-medium">
                        Kontak Darurat
                    </p>

                    <h2 class="text-5xl font-black mt-3 text-slate-900">
                        3
                    </h2>

                </div>

                <div
                    class="w-16 h-16 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center text-3xl">

                    🚨

                </div>

            </div>

        </div>

    </div>

</x-layouts.dashboard>
<x-layouts.dashboard
    title="Dashboard"
    color="green"
    role="volunteer">

    <div class="space-y-8">

        <!-- HEADER -->
        <div
            class="bg-gradient-to-r from-emerald-500 to-green-600 rounded-3xl p-8 text-white shadow-lg">

            <h1 class="text-3xl md:text-4xl font-black">
                Dashboard
            </h1>

            <p class="mt-3 text-green-100 text-lg">
                Welcome back, {{ Auth::user()->name }} 👋
            </p>

        </div>

        <!-- STATS -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            <!-- CARD -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">

                <p class="text-gray-500 text-sm">
                    Missions Completed
                </p>

                <h1 class="text-4xl font-black text-slate-900 mt-4">
                    12
                </h1>

            </div>

            <!-- CARD -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">

                <p class="text-gray-500 text-sm">
                    Hours Volunteered
                </p>

                <h1 class="text-4xl font-black text-slate-900 mt-4">
                    48h
                </h1>

            </div>

            <!-- CARD -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">

                <p class="text-gray-500 text-sm">
                    Upcoming Missions
                </p>

                <h1 class="text-4xl font-black text-slate-900 mt-4">
                    3
                </h1>

            </div>

            <!-- CARD -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">

                <p class="text-gray-500 text-sm">
                    People Helped
                </p>

                <h1 class="text-4xl font-black text-slate-900 mt-4">
                    152
                </h1>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            <!-- MISSIONS -->
            <div
                class="xl:col-span-2 bg-white rounded-3xl p-8 shadow-sm border border-gray-100">

                <div class="flex items-center justify-between mb-6">

                    <h2 class="text-2xl font-bold text-slate-900">
                        Upcoming Missions
                    </h2>

                    <button
                        class="text-green-600 font-semibold hover:text-green-700 transition">

                        View All

                    </button>

                </div>

                <div class="space-y-5">

                    <!-- ITEM -->
                    <div
                        class="flex items-center justify-between border border-gray-100 rounded-2xl p-5">

                        <div>

                            <h3 class="font-bold text-slate-900">
                                Flood Relief Distribution
                            </h3>

                            <p class="text-gray-500 text-sm mt-1">
                                Central City Shelter
                            </p>

                        </div>

                        <span
                            class="px-4 py-2 rounded-xl bg-green-100 text-green-700 text-sm font-semibold">

                            Confirmed

                        </span>

                    </div>

                    <!-- ITEM -->
                    <div
                        class="flex items-center justify-between border border-gray-100 rounded-2xl p-5">

                        <div>

                            <h3 class="font-bold text-slate-900">
                                Water Supply Delivery
                            </h3>

                            <p class="text-gray-500 text-sm mt-1">
                                Riverside Area
                            </p>

                        </div>

                        <span
                            class="px-4 py-2 rounded-xl bg-yellow-100 text-yellow-700 text-sm font-semibold">

                            Pending

                        </span>

                    </div>

                </div>

            </div>

            <!-- SIDE -->
            <div
                class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">

                <h2 class="text-2xl font-bold text-slate-900 mb-6">
                    Recent Activities
                </h2>

                <div class="space-y-6">

                    <div>

                        <h3 class="font-semibold text-slate-900">
                            Completed Mission
                        </h3>

                        <p class="text-gray-500 text-sm mt-1">
                            Distributed relief goods to 50 families.
                        </p>

                    </div>

                    <div>

                        <h3 class="font-semibold text-slate-900">
                            Checked In
                        </h3>

                        <p class="text-gray-500 text-sm mt-1">
                            Arrived at Central Shelter.
                        </p>

                    </div>

                    <div>

                        <h3 class="font-semibold text-slate-900">
                            Mission Assigned
                        </h3>

                        <p class="text-gray-500 text-sm mt-1">
                            Assigned to Water Distribution Team.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-layouts.dashboard>
<nav x-data="{ open: false }"
    class="bg-white border-b border-gray-200 shadow-sm">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- Left -->
            <div class="flex items-center gap-10">

                <!-- Logo -->
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-2">

                    <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white font-bold text-lg">
                        W
                    </div>

                    <div>
                        <h1 class="text-lg font-bold text-gray-800">
                            WaterRelief
                        </h1>

                        <p class="text-xs text-gray-500">
                            Flood Management System
                        </p>
                    </div>

                </a>

                <!-- Navigation -->
                <div class="hidden md:flex items-center gap-6">

                    <a href="{{ route('dashboard') }}"
                        class="text-gray-700 hover:text-blue-600 font-medium transition">

                        Dashboard

                    </a>

                    <a href="{{ route('profile.edit') }}"
                        class="text-gray-700 hover:text-blue-600 font-medium transition">

                        Profile

                    </a>

                </div>

            </div>

            <!-- Right -->
            <div class="hidden md:flex items-center gap-4">

                <!-- Role Badge -->
                <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm font-medium capitalize">

                    {{ auth()->user()->role->role_name }}

                </span>

                <!-- User -->
                <div class="text-right">

                    <h2 class="text-sm font-semibold text-gray-800">
                        {{ auth()->user()->name }}
                    </h2>

                    <p class="text-xs text-gray-500">
                        {{ auth()->user()->email }}
                    </p>

                </div>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm font-medium transition">

                        Logout

                    </button>
                </form>

            </div>

            <!-- Mobile Button -->
            <div class="flex items-center md:hidden">

                <button @click="open = ! open"
                    class="text-gray-700">

                    <svg class="w-6 h-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                    </svg>

                </button>

            </div>

        </div>

    </div>

    <!-- Mobile Menu -->
    <div x-show="open"
        class="md:hidden border-t border-gray-200 bg-white">

        <div class="px-4 py-4 space-y-4">

            <a href="{{ route('dashboard') }}"
                class="block text-gray-700 font-medium">

                Dashboard

            </a>

            <a href="{{ route('profile.edit') }}"
                class="block text-gray-700 font-medium">

                Profile

            </a>

            <div class="pt-4 border-t">

                <p class="font-semibold text-gray-800">
                    {{ auth()->user()->name }}
                </p>

                <p class="text-sm text-gray-500">
                    {{ auth()->user()->email }}
                </p>

            </div>

            <form method="POST"
                action="{{ route('logout') }}">

                @csrf

                <button
                    type="submit"
                    class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded-xl">

                    Logout

                </button>

            </form>

        </div>

    </div>

</nav>
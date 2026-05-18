@props([
    'title' => 'Dashboard',
    'color' => 'blue',
    'role' => 'citizen'

])

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Dashboard' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body
    x-data="{
    sidebarOpen: false,
    openNotif: false,
    search: ''
}"
 class="bg-[#f4f7fb] font-sans antialiased">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside
            :class="sidebarOpen
                ? 'translate-x-0'
                : '-translate-x-full lg:translate-x-0 lg:w-0 overflow-hidden'"
            class="w-72 max-w-[85%] bg-white border-r border-gray-200 fixed inset-y-0 left-0 lg:relative z-50 h-screen overflow-y-auto transition-all duration-300 flex flex-col shadow-2xl lg:shadow-none">

            <!-- LOGO -->
            <div class="px-8 py-8 border-b border-gray-100">

               <div class="flex items-start gap-4 pr-16">

                    <img
                        src="{{ asset('images/Logo.png') }}"
                        class="w-14 h-14 object-contain"
                        alt="Logo">

                    <div>

                       <h1 class="text-2xl md:text-3xl font-medium text-slate-900 leading-tight">
                            WaterRelief
                        </h1>

                        <p class="text-sm text-gray-500 leading-relaxed">
                            Beri Komplainmu, Bantu Sesama
                        </p>

                    </div>

                </div>

            </div>

            <!-- CLOSE BUTTON MOBILE -->
            <button
           @click="
                sidebarOpen = !sidebarOpen;
                openNotif = false;
            "
            class="absolute top-1 right-1 lg:hidden z-50 w-10 h-10 rounded-xl bg-transparent hover:bg-red-100 flex items-center justify-center transition">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                class="w-6 h-6 text-gray-600 hover:text-red-500">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12" />

            </svg>

        </button>

            <!-- MENU -->
            <nav class="flex-1 px-5 py-8 space-y-3 overflow-y-auto">
                 
                @if(strtolower($role) === 'citizen')
                
                <!-- DASHBOARD -->
            <a
            href="{{ route('dashboard') }}"
            class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300

            {{ request()->routeIs('dashboard')
                ? 'bg-cyan-400 text-white shadow-lg'
                : 'text-gray-600 hover:bg-cyan-100 hover:text-cyan-700'
            }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-5 h-5">

                    <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.75 3h7.5v7.5h-7.5V3Zm9 0h7.5v4.5h-7.5V3Zm0 6h7.5v12h-7.5V9Zm-9 3h7.5v9h-7.5v-9Z"/>

                </svg>

                Dashboard

            </a>

            <!-- COMPLAINTS -->
            <a
            href="#"
            class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300

            {{ request()->is('complaints')
                ? 'bg-cyan-400 text-white shadow-lg'
                : 'text-gray-600 hover:bg-cyan-100 hover:text-cyan-700'
            }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-5 h-5">

                    <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7.5 8.25h9m-9 3h5.25M6.75 3h10.5A2.25 2.25 0 0 1 19.5 5.25v13.5A2.25 2.25 0 0 1 17.25 21H6.75A2.25 2.25 0 0 1 4.5 18.75V5.25A2.25 2.25 0 0 1 6.75 3Z"/>

                </svg>

                My Complaints

            </a>

            <!-- SHELTER -->
            <a
            href="#"
            class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300

            {{ request()->is('shelter')
                ? 'bg-cyan-400 text-white shadow-lg'
                : 'text-gray-600 hover:bg-cyan-100 hover:text-cyan-700'
            }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-5 h-5">

                    <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m2.25 12 8.954-8.955a1.125 1.125 0 0 1 1.592 0L21.75 12M4.5 9.75V19.5A1.5 1.5 0 0 0 6 21h12a1.5 1.5 0 0 0 1.5-1.5V9.75"/>

                </svg>

                Shelter Information

            </a>

            <!-- RELIEF -->
            <a
            href="#"
            class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300

            {{ request()->is('relief')
                ? 'bg-cyan-400 text-white shadow-lg'
                : 'text-gray-600 hover:bg-cyan-100 hover:text-cyan-700'
            }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-5 h-5">

                    <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M21 7.5V6a2.25 2.25 0 0 0-2.25-2.25h-13.5A2.25 2.25 0 0 0 3 6v1.5m18 0v10.5A2.25 2.25 0 0 1 18.75 20.25h-13.5A2.25 2.25 0 0 1 3 18V7.5m18 0h-18"/>

                </svg>

                Relief Information

            </a>

            <!-- EMERGENCY -->
            <a
            href="#"
            class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300

            {{ request()->is('emergency')
                ? 'bg-cyan-400 text-white shadow-lg'
                : 'text-gray-600 hover:bg-cyan-100 hover:text-cyan-700'
            }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-5 h-5">

                    <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M2.25 6.75c0 7.456 6.044 13.5 13.5 13.5h2.25A2.25 2.25 0 0 0 20.25 18v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106a1.125 1.125 0 0 0-1.173.417l-.97 1.293a.75.75 0 0 1-.982.205 11.035 11.035 0 0 1-5.457-5.457.75.75 0 0 1 .205-.982l1.293-.97c.37-.278.54-.75.417-1.173L7.463 4.602A1.125 1.125 0 0 0 6.372 3.75H5A2.25 2.25 0 0 0 2.75 6v.75Z"/>

                </svg>

                Emergency Contacts

            </a>

            <!-- PROFILE -->
            <a
            href="{{ route('profile.edit') }}"
            class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300

            {{ request()->routeIs('profile.edit')
                ? 'bg-cyan-400 text-white shadow-lg'
                : 'text-gray-600 hover:bg-cyan-100 hover:text-cyan-700'
            }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-5 h-5">

                    <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275"/>

                </svg>

                Profile

            </a>

            <!-- SETTINGS -->
            <a
            href="{{ route('settings.index') }}"
            class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300

            {{ request()->routeIs('settings.index')
                ? 'bg-cyan-400 text-white shadow-lg'
                : 'text-gray-600 hover:bg-cyan-100 hover:text-cyan-700'
            }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-5 h-5">

                    <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M4.5 12a7.5 7.5 0 1 1 15 0 7.5 7.5 0 0 1-15 0Zm7.5-3v3l2 2"/>

                </svg>

                Settings

                </a>

                @else

                <a 
                href="{{ route('volunteer.dashboard') }}"
                class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300

                {{ request()->routeIs('volunteer.dashboard')
                    ? 'bg-green-500 text-white shadow-lg'
                    : 'text-gray-600 hover:bg-green-100 hover:text-green-700'
                }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-5 h-5">

                    <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.75 3h7.5v7.5h-7.5V3Zm9 0h7.5v4.5h-7.5V3Zm0 6h7.5v12h-7.5V9Zm-9 3h7.5v9h-7.5v-9Z"/>

                </svg>

                    Dashboard

                </a>

                    <!-- MY MISSIONS -->
                    <a 
                    href="#"
                    class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300

                    {{ request()->is('volunteer/my-missions')
                        ? 'bg-green-500 text-white shadow-lg'
                        : 'text-gray-600 hover:bg-green-100 hover:text-green-700'
                    }}">

                    <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-5 h-5">

                    <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7.5 8.25h9m-9 3h5.25M6.75 3h10.5A2.25 2.25 0 0 1 19.5 5.25v13.5A2.25 2.25 0 0 1 17.25 21H6.75A2.25 2.25 0 0 1 4.5 18.75V5.25A2.25 2.25 0 0 1 6.75 3Z"/>

                </svg>

                        My Missions

                    </a>

                    <!-- AVAILABLE MISSIONS -->
                    <a 
                    href="#"
                    class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300

                    {{ request()->is('volunteer/available-missions')
                        ? 'bg-green-500 text-white shadow-lg'
                        : 'text-gray-600 hover:bg-green-100 hover:text-green-700'
                    }}">

                    <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-5 h-5">

                    <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7.5 8.25h9m-9 3h5.25M6.75 3h10.5A2.25 2.25 0 0 1 19.5 5.25v13.5A2.25 2.25 0 0 1 17.25 21H6.75A2.25 2.25 0 0 1 4.5 18.75V5.25A2.25 2.25 0 0 1 6.75 3Z"/>

                </svg>

                        Available Missions

                    </a>

                    <!-- SHELTERS -->
                    <a 
                    href="#"
                    class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300

                    {{ request()->is('volunteer/shelters')
                        ? 'bg-green-500 text-white shadow-lg'
                        : 'text-gray-600 hover:bg-green-100 hover:text-green-700'
                    }}">

                    <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-5 h-5">

                    <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="m2.25 12 8.954-8.955a1.125 1.125 0 0 1 1.592 0L21.75 12M4.5 9.75V19.5A1.5 1.5 0 0 0 6 21h12a1.5 1.5 0 0 0 1.5-1.5V9.75"/>

                </svg>


                        Shelters

                    </a>

                    <!-- RELIEF DISTRIBUTION -->
                    <a 
                    href="#"
                    class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300

                    {{ request()->is('volunteer/relief-distribution')
                        ? 'bg-green-500 text-white shadow-lg'
                        : 'text-gray-600 hover:bg-green-100 hover:text-green-700'
                    }}">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="w-5 h-5">

                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 7.5V6a2.25 2.25 0 0 0-2.25-2.25h-13.5A2.25 2.25 0 0 0 3 6v1.5m18 0v10.5A2.25 2.25 0 0 1 18.75 20.25h-13.5A2.25 2.25 0 0 1 3 18V7.5m18 0h-18"/>

                        </svg>

                        Relief Distribution

                    </a>

                    <!-- MY SCHEDULE -->
                    <a 
                    href="#"
                    class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300

                    {{ request()->is('volunteer/my-schedule')
                        ? 'bg-green-500 text-white shadow-lg'
                        : 'text-gray-600 hover:bg-green-100 hover:text-green-700'
                    }}">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="w-5 h-5">

                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6.75 3v2.25m10.5-2.25v2.25M3 18.75V7.5A2.25 2.25 0 0 1 5.25 5.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25A2.25 2.25 0 0 1 18.75 21H5.25A2.25 2.25 0 0 1 3 18.75Zm0-10.5h18"/>

                        </svg>

                        My Schedule

                    </a>

                    <!-- PROFILE -->
                    <a 
                    href="{{ route('profile.edit') }}"
                    class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300

                    {{ request()->routeIs('profile.edit')
                        ? 'bg-green-500 text-white shadow-lg'
                        : 'text-gray-600 hover:bg-green-100 hover:text-green-700'
                    }}">

                    <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-5 h-5">

                    <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275"/>

                </svg>

                        Profile

                    </a>

                    <!-- SETTINGS -->
                    <a 
                    href="{{ route('settings.index') }}"
                    class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300

                    {{ request()->routeIs('settings.index')
                        ? 'bg-green-500 text-white shadow-lg'
                        : 'text-gray-600 hover:bg-green-100 hover:text-green-700'
                    }}">

                    <svg xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.8"
                    stroke="currentColor"
                    class="w-5 h-5">

                        <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M4.5 12a7.5 7.5 0 1 1 15 0 7.5 7.5 0 0 1-15 0Zm7.5-3v3l2 2"/>

                    </svg>
                    Settings

                    </a>

                @endif

            </nav>

            

            <!-- LOGOUT -->
            <div class="p-5 border-t border-gray-100">

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button
                        class="w-full py-4 rounded-2xl bg-slate-900 text-white font-semibold hover:bg-slate-800 transition">

                        Logout

                    </button>

                </form>

            </div>

        </aside>

        <!-- OVERLAY MOBILE -->
        <div
            x-show="sidebarOpen"
            @click="sidebarOpen = false"
            @click="openNotif = false"
            class="fixed inset-0 bg-black/40 z-40 lg:hidden"
            x-transition.opacity>

        </div>

        <!-- MAIN -->
      <main class="flex-1 flex flex-col overflow-hidden">

            <!-- TOPBAR -->
            <div
               class="bg-white border-b border-gray-200 px-4 md:px-8 py-4 md:py-5 flex items-center justify-between gap-3">

                <!-- LEFT -->
                <div class="flex items-center gap-3 md:gap-5 min-w-0">

                    <!-- MENU BUTTON -->
                    <button
                       @click="
                            sidebarOpen = !sidebarOpen;
                            openNotif = false;
                        "
                        class="text-gray-500 hover:text-slate-900 transition text-3xl px-4">

                        ☰

                    </button>

                    <!-- TITLE -->
                    <div>

                        <h1 class="text-lg md:text-2xl font-bold text-slate-900 truncate">
                            Dashboard
                        </h1>

                        <p class="text-gray-500 text-xs md:text-sm mt-1 truncate">
                            Selamat Datang, {{ Auth::user()->name }}
                        </p>

                    </div>

                </div>

                <!-- RIGHT -->
               <div class="flex items-center gap-2 md:gap-5">

                    <!-- SEARCH -->
                    <div class="hidden lg:block">

                        <input
                            type="text"
                            x-model="search"
                            placeholder="Search menu..."
                            class="w-72 xl:w-80 rounded-2xl border-gray-200 bg-gray-50
                            {{ $color == 'green'
                                ? 'focus:border-green-500 focus:ring-green-500'
                                : 'focus:border-blue-500 focus:ring-blue-500'
                            }} text-sm">

                    </div>

                    <!-- NOTIFICATION -->
                            <div class="relative">

                                <!-- BUTTON -->
                                <button
                                    @click="
                                    openNotif = !openNotif;
                                    sidebarOpen = false;
                                "
                                    class="relative w-10 h-10 md:w-11 md:h-11 rounded-2xl hover:bg-gray-100 flex items-center justify-center transition text-xl z-40">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.8"
                                        stroke="currentColor"
                                        class="w-6 h-6 text-gray-600">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M14.857 17.082a23.848 23.848 0 0 1 5.454 1.31A8.967 8.967 0 0 1 18 9.75v-.7V9a6 6 0 1 0-12 0v.05c0 .236 0 .472-.002.708A8.967 8.967 0 0 1 3.69 18.392a23.847 23.847 0 0 1 5.454-1.31m5.714 0a24.255 24.255 0 0 0-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />

                                    </svg>

                                    <!-- RED DOT -->
                                    <span
                                        class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full">
                                    </span>

                                </button>

                                <!-- DROPDOWN -->
                                <div
                                    x-show="openNotif"
                                    x-cloak
                                    @click.outside="openNotif = false"
                                    x-transition
                                    class="absolute right-0 mt-3 w-[85vw] max-w-[320px] sm:w-80 bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden z-40">

                                    <!-- HEADER -->
                                    <div class="px-4 py-4 sm:px-6 sm:py-5 border-b border-gray-100">

                                        <h1 class="text-lg font-bold text-slate-900">
                                            Notifications
                                        </h1>

                                    </div>

                                    <!-- ITEMS -->
                                    <div class="max-h-80 overflow-y-auto">

                                        <!-- ITEM -->
                                        <div
                                            class="px-4 py-4 sm:px-6 sm:py-5 hover:bg-gray-50 transition border-b border-gray-100">

                                            <div class="flex items-start gap-3 sm:gap-4">

                                                <div
                                                    class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-blue-100 flex items-center justify-center text-lg sm:text-xl shrink-0">

                                                    📢

                                                </div>

                                                <div class="min-w-0">

                                                    <h2 class="font-semibold text-slate-900 text-sm sm:text-base">
                                                        New Complaint Update
                                                    </h2>

                                                    <p class="text-xs sm:text-sm text-gray-500 mt-1 leading-relaxed">
                                                        Your complaint has been reviewed.
                                                    </p>

                                                    <p class="text-xs text-gray-400 mt-2">
                                                        2 minutes ago
                                                    </p>

                                                </div>

                                            </div>

                                        </div>

                                <!-- ITEM -->
                                <div
                                    class="px-4 py-4 sm:px-6 sm:py-5 hover:bg-gray-50 transition border-b border-gray-100">

                                    <div class="flex items-start gap-3 sm:gap-4">

                                        <div
                                            class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-green-100 flex items-center justify-center text-lg sm:text-xl shrink-0">

                                            🏠

                                        </div>

                                        <div class="min-w-0">

                                            <h2 class="font-semibold text-slate-900 text-sm sm:text-base">
                                                Shelter Available
                                            </h2>

                                            <p class="text-xs sm:text-sm text-gray-500 mt-1 leading-relaxed">
                                                New shelter opened near your area.
                                            </p>

                                            <p class="text-xs text-gray-400 mt-2">
                                                1 hour ago
                                            </p>

                                        </div>

                                    </div>

                                </div>

                                <!-- ITEM -->
                                <div
                                    class="px-4 py-4 sm:px-6 sm:py-5 hover:bg-gray-50 transition">

                                    <div class="flex items-start gap-3 sm:gap-4">

                                        <div
                                            class="w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-red-100 flex items-center justify-center text-lg sm:text-xl shrink-0">

                                            🚨

                                        </div>

                                        <div class="min-w-0">

                                            <h2 class="font-semibold text-slate-900 text-sm sm:text-base">
                                                Emergency Alert
                                            </h2>

                                            <p class="text-xs sm:text-sm text-gray-500 mt-1 leading-relaxed">
                                                Flood warning issued in your district.
                                            </p>

                                            <p class="text-xs text-gray-400 mt-2">
                                                Yesterday
                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- FOOTER -->
                            <div class="px-4 py-4 sm:px-6 border-t border-gray-100">

                                <button
                                    class="w-full py-3 rounded-2xl text-white font-semibold transition text-sm sm:text-base
                                    {{ $color == 'green'
                                        ? 'bg-green-600 hover:bg-green-700'
                                        : 'bg-blue-600 hover:bg-blue-700'
                                    }}">

                                    View All Notifications

                                </button>

                            </div>

                        </div>

                    </div>

                    <!-- PROFILE -->
                    <div class="flex items-center gap-3">

                        <a
                            href="{{ route('profile.edit') }}"
                           class="w-10 h-10 md:w-12 md:h-12 rounded-full overflow-hidden{{ $color == 'green'
                            ? 'bg-green-600'
                            : 'bg-blue-600'
                        }} text-white flex items-center justify-center font-bold text-lg hover:scale-105 transition">

                            @if(Auth::user()->profile_photo)

                                <img
                                    src="{{ asset('storage/profile-photos/' . Auth::user()->profile_photo) }}"
                                    class="w-full h-full object-cover">

                            @else

                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                            @endif

                        </a>

                       <div class="hidden sm:block">

                            <h2 class="font-semibold text-slate-900">
                                {{ Auth::user()->name }}
                            </h2>

                            <p class="text-xs text-gray-500">
                                {{ Auth::user()?->role?->role_name === 'Volunteer'
                                    || strtolower((string) (Auth::user()?->role?->role_name)) === 'volunteer'
                                    ? 'Volunteer'
                                    : 'Citizen'
                                }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- CONTENT -->
        <div class="flex-1 overflow-y-auto p-4 md:p-8 pb-32">

                {{ $slot }}

            </div>

        </main>

    </div>

</body>

</html>
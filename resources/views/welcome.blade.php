<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WaterRelief</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
</head>

<body class="bg-gray-50 font-sans">

    <!-- Navbar -->
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-6">

            <div class="flex items-center justify-between h-20">

                <!-- Logo -->
                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold text-xl">
                        💧
                    </div>

                    <div>
                        <h1 class="text-2xl font-extrabold text-blue-600">
                            WaterRelief
                        </h1>

                        <p class="text-sm text-gray-500">
                            Clean Water, Better Life
                        </p>
                    </div>

                </div>

                <!-- Menu -->
                <div class="hidden md:flex items-center gap-8 font-medium text-gray-700">

                    <a href="#" class="text-blue-600 border-b-2 border-blue-600 pb-1">
                        Home
                    </a>

                    <a href="#" class="hover:text-blue-600 transition">
                        About Us
                    </a>

                    <a href="#" class="hover:text-blue-600 transition">
                        Programs
                    </a>

                    <a href="#" class="hover:text-blue-600 transition">
                        Donate
                    </a>

                    <a href="#" class="hover:text-blue-600 transition">
                        News
                    </a>

                    <a href="#" class="hover:text-blue-600 transition">
                        Contact
                    </a>

                </div>

                <!-- Auth -->
                <div class="flex items-center gap-3">

                    @guest

                        <a href="{{ route('login') }}"
                            class="px-5 py-2 border border-blue-600 text-blue-600 rounded-xl font-semibold hover:bg-blue-50 transition">

                            Login

                        </a>

                        <a href="{{ route('register') }}"
                            class="px-5 py-2 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition">

                            Register

                        </a>

                    @else

                        <a href="{{ route('dashboard') }}"
                            class="px-5 py-2 bg-blue-600 text-white rounded-xl font-semibold">

                            Dashboard

                        </a>

                    @endguest

                </div>

            </div>

        </div>
    </nav>

    <!-- Hero -->
    <section class="max-w-7xl mx-auto px-6 py-14">

        <div class="grid lg:grid-cols-2 gap-10 items-center">

            <!-- Left -->
            <div>

                <h1 class="text-6xl font-extrabold text-slate-900 leading-tight">

                    Clean Water <br>
                    Brighter Future

                </h1>

                <p class="mt-6 text-lg text-gray-600 leading-relaxed max-w-xl">

                    WaterRelief is dedicated to providing clean,
                    safe, and sustainable water solutions
                    for communities in need.

                </p>

                <div class="flex items-center gap-5 mt-8">

                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white px-7 py-4 rounded-2xl font-semibold shadow-lg transition">

                        Our Programs →

                    </button>

                    <button
                        class="border border-blue-300 hover:bg-blue-50 text-blue-600 px-7 py-4 rounded-2xl font-semibold transition">

                        Donate Now ♡

                    </button>

                </div>

            </div>

            <!-- Right -->
            <div>

                <img src="https://images.unsplash.com/photo-1509099836639-18ba1795216d?q=80&w=1200&auto=format&fit=crop"
                    class="rounded-[2rem] shadow-2xl w-full h-[520px] object-cover">

            </div>

        </div>

    </section>

    <!-- Stats -->
    <section class="max-w-6xl mx-auto px-6 -mt-4">

        <div class="bg-white rounded-[2rem] shadow-lg border p-8 grid grid-cols-2 md:grid-cols-4 gap-8">

            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-blue-600">
                    12,450+
                </h1>

                <p class="text-gray-500 mt-2">
                    People Helped
                </p>
            </div>

            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-blue-600">
                    3,200+
                </h1>

                <p class="text-gray-500 mt-2">
                    Clean Water Projects
                </p>
            </div>

            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-blue-600">
                    28
                </h1>

                <p class="text-gray-500 mt-2">
                    Communities Reached
                </p>
            </div>

            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-blue-600">
                    680+
                </h1>

                <p class="text-gray-500 mt-2">
                    Volunteers
                </p>
            </div>

        </div>

    </section>

    <!-- Mission -->
    <section class="max-w-7xl mx-auto px-6 py-24">

        <div class="text-center">

            <p class="text-blue-600 font-bold uppercase tracking-widest">
                Our Mission
            </p>

            <h1 class="text-5xl font-extrabold text-slate-900 mt-4">

                Together, We Can Make a Difference

            </h1>

        </div>

        <div class="grid md:grid-cols-3 gap-8 mt-16">

            <!-- Card -->
            <div class="bg-white p-8 rounded-[2rem] shadow-md">

                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center text-3xl">
                    💧
                </div>

                <h2 class="text-2xl font-bold mt-6">
                    Clean Water Access
                </h2>

                <p class="text-gray-600 mt-4 leading-relaxed">
                    We build and restore clean water
                    sources in communities that need it most.
                </p>

            </div>

            <div class="bg-white p-8 rounded-[2rem] shadow-md">

                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center text-3xl">
                    🤝
                </div>

                <h2 class="text-2xl font-bold mt-6">
                    Community Empowerment
                </h2>

                <p class="text-gray-600 mt-4 leading-relaxed">
                    We empower local communities through
                    education and sustainable water solutions.
                </p>

            </div>

            <div class="bg-white p-8 rounded-[2rem] shadow-md">

                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center text-3xl">
                    🛡️
                </div>

                <h2 class="text-2xl font-bold mt-6">
                    Sustainable Impact
                </h2>

                <p class="text-gray-600 mt-4 leading-relaxed">
                    We focus on long-term solutions that create
                    lasting change for future generations.
                </p>

            </div>

        </div>

    </section>

</body>

</html>
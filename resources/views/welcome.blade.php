<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WaterRelief</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-[#f8fafc] font-sans overflow-x-hidden text-slate-900">

    <!-- Navbar -->
    <nav x-data="{ open: false }"
        class="fixed top-0 left-0 w-full z-50 bg-white/80 backdrop-blur-xl border-b border-white/20 shadow-sm">

        <div class="max-w-[1450px] mx-auto px-6 lg:px-10">

            <div class="h-24 flex items-center justify-between">

                <!-- Logo -->
                <div class="flex items-center gap-4">

                <img src="{{ asset('images/Logo.png') }}"
                     alt="WaterRelief Logo"
                    class="w-14 h-14 object-contain">

                    <div>

                        <h1 class="text-3xl font-black text-blue-600 tracking-tight leading-none">
                            WaterRelief
                        </h1>

                        <p class="text-sm text-gray-400 mt-1">
                            Beri Komplainmu, Bantu Sesama
                        </p>

                    </div>

                </div>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center gap-12 text-[17px] font-semibold">

                    <a href="{{ url('/') }}" class="hover:text-blue-600 transition-all duration-300">
                        Home
                    </a>

                    <a href="#about" class="hover:text-blue-600 transition-all duration-300">
                        About
                    </a>

                    <a href="#programs" class="hover:text-blue-600 transition-all duration-300">
                        Programs
                    </a>

                    <a href="#volunteer" class="hover:text-blue-600 transition-all duration-300">
                        Volunteer
                    </a>

                    <a href="#contact" class="hover:text-blue-600 transition-all duration-300">
                        Contact
                    </a>

                </div>

                <!-- Auth -->
                <div class="hidden lg:flex items-center gap-5">

                    @guest

                        <a href="{{ route('login') }}"
                            class="px-7 py-3 rounded-2xl border-2 border-blue-600 text-blue-600 font-bold hover:bg-blue-50 transition-all duration-300">

                            Login

                        </a>

                        <a href="{{ route('register') }}"
                            class="px-7 py-3 rounded-2xl border-2 border-blue-600 text-blue-600 font-bold hover:bg-blue-50 transition-all duration-300">

                            Register

                        </a>

                    @else

                        <a href="{{ route('dashboard') }}"
                            class="px-7 py-3 rounded-2xl border-2 border-blue-600 text-blue-600 font-bold hover:bg-blue-50 transition-all duration-300">

                            Dashboard

                        </a>

                    @endguest

                </div>

                <!-- Mobile Button -->
                <button
                    @click="open = !open"
                    class="lg:hidden w-12 h-12 rounded-2xl bg-blue-600 text-white flex items-center justify-center text-2xl">

                    ☰

                </button>

            </div>

        </div>

        <!-- Mobile Menu -->
        <div x-show="open"
            x-transition
            class="lg:hidden bg-white border-t border-gray-100 shadow-xl">

            <div class="px-6 py-8 space-y-5">

                <a href="{{ url('/') }}" class="block text-lg font-semibold text-gray-700 px-4 py-4 rounded-2xl transition-all duration-300
                        hover:bg-blue-50 hover:text-blue-600
                        active:bg-blue-100 active:text-blue-700 active:scale-95
                        focus:bg-blue-50 focus:text-blue-600">
                    Home
                </a>

                <a href="#about" class="block text-lg font-semibold text-gray-700 px-4 py-4 rounded-2xl transition-all duration-300
                        hover:bg-blue-50 hover:text-blue-600
                        active:bg-blue-100 active:text-blue-700 active:scale-95
                        focus:bg-blue-50 focus:text-blue-600">
                    About
                </a>

                <a href="#programs" class="block text-lg font-semibold text-gray-700 px-4 py-4 rounded-2xl transition-all duration-300
                        hover:bg-blue-50 hover:text-blue-600
                        active:bg-blue-100 active:text-blue-700 active:scale-95
                        focus:bg-blue-50 focus:text-blue-600">
                    Programs
                </a>

                <a href="#impact" class="block text-lg font-semibold text-gray-700 px-4 py-4 rounded-2xl transition-all duration-300
                        hover:bg-blue-50 hover:text-blue-600
                        active:bg-blue-100 active:text-blue-700 active:scale-95
                        focus:bg-blue-50 focus:text-blue-600">
                    Impact
                </a>

                <a href="#contact" class="block text-lg font-semibold text-gray-700 px-4 py-4 rounded-2xl transition-all duration-300
                        hover:bg-blue-50 hover:text-blue-600
                        active:bg-blue-100 active:text-blue-700 active:scale-95
                        focus:bg-blue-50 focus:text-blue-600">
                    Contact
                </a>

                <div class="pt-4 flex flex-col gap-4">

                    @guest

                        <a href="{{ route('login') }}"
                            class="w-full py-4 border-2 border-blue-600 text-blue-600 rounded-2xl text-center font-bold">
                            Login
                        </a>

                        <a href="{{ route('register') }}"
                            class="w-full py-4 border-2 border-blue-600 text-blue-600 rounded-2xl text-center font-bold">
                            Register
                        </a>

                    @else

                        <a href="{{ route('dashboard') }}"
                            class="w-full py-4 border-2 border-blue-600 text-blue-600 rounded-2xl text-center font-bold">
                            Dashboard
                        </a>

                    @endguest

                </div>

            </div>

        </div>

    </nav>

    <!-- Hero -->
    <section class="relative min-h-screen overflow-hidden">

        <!-- Hero Slider -->
    <div x-data="{
    current: 0,
    images: [
    '{{ asset('images/Hero-1.jpg') }}',
    '{{ asset('images/Hero-2.jpg') }}',
    '{{ asset('images/Hero-3.jpg') }}'
    ]
    }"

    x-init="setInterval(() => {
    current = (current + 1) % images.length
    }, 4000)"

    class="absolute inset-0">

    <template x-for="(image, index) in images" :key="index">

        <img
            :src="image"

            x-show="current === index"

            x-transition:enter="transition-opacity duration-1000"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"

            x-transition:leave="transition-opacity duration-1000"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"

            class="absolute inset-0 w-full h-full object-cover">

    </template>

    </div>
        <div class="absolute inset-0 bg-black/10"></div>

        <div
            class="relative z-10 min-h-screen flex items-center bg-gradient-to-r from-[#f8fafc]/90 via-[#f8fafc]/55 to-transparent">

            <div class="max-w-[760px] px-8 lg:pl-20 pt-24">

                <p class="uppercase tracking-[8px] text-blue-600 font-black text-sm mb-6">
                    Welcome to WaterRelief
                </p>

                <h1
                    class="text-[60px] md:text-[90px] leading-[90%] font-black tracking-tight text-slate-900 drop-shadow-sm">

                    Beri Komplain<br>
                    Bantu Sesama

                </h1>

                <p class="mt-8 text-[20px] md:text-[24px] leading-[40px] text-gray-600 max-w-2xl">

                    WaterRelief membantu masyarakat mendapatkan akses ke air bersih,
                    tempat penampungan darurat, dukungan logistik, dan bantuan kemanusiaan
                    selama bencana banjir dan situasi kritis.

                </p>

                <div class="flex flex-wrap items-center gap-5 mt-12">

                    <button
                        class="border-2 border-blue-200 hover:bg-blue-200/70 backdrop-blur-md text-blue-600 px-10 py-5 rounded-3xl font-bold text-lg transition-all duration-300 hover:scale-105">
                        Jelajahi Program

                    </button>

                    <button
                        class="border-2 border-blue-200 hover:bg-blue-200/70 backdrop-blur-md text-blue-600 px-10 py-5 rounded-3xl font-bold text-lg transition-all duration-300 hover:scale-105">

                        Donasi Sekarang

                    </button>

                </div>

            </div>

        </div>

    </section>

    <!-- Mission -->
    <section id="about" class="py-32 px-6 lg:px-10">

    <div class="max-w-[1400px] mx-auto">

        <div class="text-center max-w-4xl mx-auto">

            <p class="uppercase tracking-[6px] text-cyan-600 font-black text-sm">
                Untuk Kemanusiaan
            </p>

            <h1 class="text-[50px] lg:text-[72px] leading-[95%] font-black mt-6 text-slate-900">
                Bersama Membantu Masyarakat Saat Banjir
            </h1>

            <p class="text-xl leading-10 text-gray-500 mt-10">
                WaterRelief hadir untuk membantu masyarakat terdampak banjir
                melalui pengelolaan shelter, distribusi bantuan logistik,
                koordinasi relawan.
            </p>

        </div>

        <div class="grid lg:grid-cols-3 gap-10 mt-24">

            <div
                class="bg-white rounded-[36px] p-12 shadow-lg border border-gray-100 hover:-translate-y-3 transition-all duration-300">

                <h2 class="text-4xl font-black mt-10 text-slate-900">
                    Manajemen Logistik
                </h2>

                <p class="text-gray-500 text-xl leading-10 mt-6">
                    Mengelola distribusi bantuan, stok kebutuhan darurat,
                    dan donasi secara cepat dan terorganisir.
                </p>

            </div>

            <div
                class="bg-white rounded-[36px] p-12 shadow-lg border border-gray-100 hover:-translate-y-3 transition-all duration-300">

                <h2 class="text-4xl font-black mt-10 text-slate-900">
                    Monitoring Shelter
                </h2>

                <p class="text-gray-500 text-xl leading-10 mt-6">
                    Memantau kapasitas shelter, kondisi pengungsi
                </p>

            </div>

            <div
                class="bg-white rounded-[36px] p-12 shadow-lg border border-gray-100 hover:-translate-y-3 transition-all duration-300">

                <h2 class="text-4xl font-black mt-10 text-slate-900">
                    Dukungan Komunitas
                </h2>

                <p class="text-gray-500 text-xl leading-10 mt-6">
                    Menghubungkan relawan, masyarakat, dan pihak terkait
                    untuk mempercepat penanganan Kebutuhan.
                </p>

            </div>

        </div>

    </div>

</section>

    <!-- Programs -->
<section id="programs" class="py-28 bg-slate-900 text-white px-6 lg:px-10">

    <div class="max-w-[1400px] mx-auto">

        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-10">

            <div>

                <p class="uppercase tracking-[6px] text-blue-400 font-black text-sm">
                    Program Kami
                </p>

                <h1 class="text-[50px] lg:text-[72px] leading-[95%] font-black mt-6">
                    Membantu Masyarakat Bertahan dan Pulih Saat Banjir
                </h1>

            </div>

            <p class="text-gray-300 text-xl leading-10 max-w-2xl">
                WaterRelief menyediakan berbagai program bantuan kemanusiaan
                untuk mendukung penanganan banjir, distribusi logistik,
                pengelolaan shelter, dan dukungan relawan.
            </p>

        </div>

        <div class="grid lg:grid-cols-3 gap-10 mt-24">

            <div class="rounded-[36px] overflow-hidden bg-white/5 border border-white/10 backdrop-blur-md">

                <img src="{{ asset('images/Program/Logistik.jpg') }}"
                    class="h-72 w-full object-cover">

                <div class="p-10">

                    <h2 class="text-3xl font-black">
                        Distribusi Logistik
                    </h2>

                    <p class="text-gray-300 mt-5 text-lg leading-9">
                        Menyalurkan bantuan makanan, air bersih, obat-obatan,
                        dan kebutuhan darurat secara cepat dan tepat sasaran.
                    </p>

                </div>

            </div>

            <div class="rounded-[36px] overflow-hidden bg-white/5 border border-white/10 backdrop-blur-md">

                <img src="{{ asset('images/Program/Shelter.jpg') }}"
                    class="h-72 w-full object-cover">

                <div class="p-10">

                    <h2 class="text-3xl font-black">
                        Bantuan Shelter
                    </h2>

                    <p class="text-gray-300 mt-5 text-lg leading-9">
                        Membantu pengelolaan shelter pengungsian
                        agar masyarakat terdampak mendapatkan tempat tinggal yang aman.
                    </p>

                </div>

            </div>

            <div class="rounded-[36px] overflow-hidden bg-white/5 border border-white/10 backdrop-blur-md">

                <img src="{{ asset('images/Program/Volunteer.jpg') }}"
                    class="h-72 w-full object-cover">

                <div class="p-10">

                    <h2 class="text-3xl font-black">
                        Program Relawan
                    </h2>

                    <p class="text-gray-300 mt-5 text-lg leading-9">
                        Menghubungkan relawan dengan masyarakat
                        untuk mempercepat proses bantuan dan pemulihan banjir.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- CTA -->
<section id="volunteer" class="py-32 px-6 lg:px-10">

    <div
        class="max-w-337.5 mx-auto rounded-[48px] overflow-hidden relative bg-slate-900 p-16 lg:p-24 text-white shadow-2xl shadow-blue-300">
        <div class="absolute inset-0 bg-black/10"></div>

        <div class="relative z-10 max-w-4xl">

            <p class="uppercase tracking-[6px] text-blue-100 font-black text-sm">
                Bergabung Bersama Kami
            </p>

            <h1 class="text-[50px] lg:text-[80px] leading-[95%] font-black mt-6">
                Jadilah Relawan Hari Ini
            </h1>

            <p class="text-2xl leading-[45px] mt-8 text-blue-100">
                Bersama WaterRelief, bantu masyarakat terdampak bencana
                melalui distribusi bantuan, pengelolaan shelter,
                dan dukungan kemanusiaan secara langsung.
            </p>

            <div class="flex flex-wrap gap-5 mt-12">

                <a href="{{ route('register') }}"
                   class="px-10 py-5 rounded-3xl border-2 border-white/50 font-black text-lg hover:bg-blue-600 transition-all duration-300">

                    Gabung Sekarang

                </a>

                <a href="{{ route('login') }}"
                    class="px-10 py-5 rounded-3xl border-2 border-white/50 font-black text-lg hover:bg-blue-600 transition-all duration-300">

                    Masuk

                </a>

            </div>

        </div>

    </div>

</section>

    <footer id="contact" class="bg-slate-950 text-white pt-28 pb-16 px-6 lg:px-10">

    <div class="max-w-[1400px] mx-auto grid lg:grid-cols-12 gap-16">

        <!-- Logo & Description -->
        <div class="lg:col-span-4">

            <div class="flex items-center gap-4">

                <img src="{{ asset('images/Logo.png') }}"
                    alt="WaterRelief Logo"
                    class="w-16 h-16 object-contain rounded-2xl">

                <div>

                    <h1 class="text-4xl font-black text-white leading-none">
                        WaterRelief
                    </h1>

                    <p class="text-gray-400 text-sm mt-2">
                        Bantu Sesama Saat Bencana
                    </p>

                </div>

            </div>

            <p class="text-gray-400 text-lg leading-10 mt-10 max-w-lg">
                WaterRelief merupakan platform kemanusiaan yang membantu
                masyarakat terdampak bencana melalui distribusi bantuan,
                pengelolaan shelter, koordinasi relawan,
                dan dukungan logistik secara real-time.
            </p>

        </div>

        <!-- Navigation -->
        <div class="lg:col-span-2">

            <h2 class="text-2xl font-black mb-8">
                Navigasi
            </h2>

            <div class="space-y-5 text-gray-400 text-lg">

                <a href="#home"
                    class="block hover:text-blue-400 hover:translate-x-2 transition-all duration-300">
                    Home
                </a>

                <a href="#about"
                    class="block hover:text-blue-400 hover:translate-x-2 transition-all duration-300">
                    Tentang
                </a>

                <a href="#programs"
                    class="block hover:text-blue-400 hover:translate-x-2 transition-all duration-300">
                    Program
                </a>

                <a href="#volunteer"
                    class="block hover:text-blue-400 hover:translate-x-2 transition-all duration-300">
                    Relawan
                </a>

            </div>

        </div>

        <!-- Contact -->
        <div class="lg:col-span-2">

            <h2 class="text-2xl font-black mb-8">
                Kontak
            </h2>

            <div class="space-y-1 text-gray-400 text-lg leading-10">

                <p>
                    Medan, Indonesia
                </p>

                <a href="mailto:waterrelief@gmail.com"
                class="hover:text-blue-400 transition duration-300">
                waterrelief@gmail.com

                </a>

                <a href="https://wa.me/6285261021275"
                target="_blank"
                class="hover:text-blue-400 transition duration-300">

                +62 852-6102-1275

                </a>

            </div>

        </div>

        <!-- CTA -->
        <div
            class="lg:col-span-4">

            <h2 class="text-2xl font-black mb-8">
                WaterRelief
            </h2>

            <p class="text-gray-400 text-lg leading-10 mt-10 max-w-lg">
                Jadilah Bagian Dari Aksi Kemanusiaan
                Bersama relawan lainnya, bantu masyarakat terdampak bencana
                melalui distribusi bantuan, pengelolaan shelter,
                dan dukungan kemanusiaan secara langsung.
            </p>

            <div class="flex flex-col gap-5 mt-10">

                <a href="{{ route('register') }}"
                    class="px-8 py-5 rounded-2xl border border-white/20 hover:bg-blue-600 transition-all duration-300 font-bold text-center">

                    Gabung Sebagai Relawan

                </a>

                <a href="#programs"
                    class="px-8 py-5 rounded-2xl border border-white/20 hover:bg-blue-600 transition-all duration-300 font-bold text-center">

                    Lihat Program

                </a>

            </div>

        </div>

    </div>

    <!-- Bottom Footer -->
    <div
        class="max-w-[1400px] mx-auto border-t border-white/10 mt-20 pt-10 text-center text-gray-500 text-lg">

        © 2026 Kelompok 5 WaterRelief. All rights reserved.

    </div>

</footer>

</body>

</html>

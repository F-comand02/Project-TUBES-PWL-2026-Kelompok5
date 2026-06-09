<x-layouts.dashboard title="Emergency Contact" role="citizen">

<div class="p-6 space-y-8">

    <!-- Header -->
    <div class="from-cyan-600 to-cyan-300 bg-gradient-to-r rounded-3xl p-6">
        <h1 class="text-3xl font-bold text-white">
            Emergency Contact Information
        </h1>

        <p class="text-white mt-2">
            Informasi layanan darurat nasional dan kontak resmi WaterRelief untuk membantu korban bencana.
        </p>
    </div>

    <!-- Nomor Darurat Nasional -->
    <div class="bg-white rounded-3xl shadow-lg p-6">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Nomor Darurat Nasional
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <div class="bg-red-50 border-l-4 border-red-500 rounded-2xl p-5">
                <p class="text-sm text-gray-500">
                    Keamanan
                </p>

                <h3 class="text-xl font-bold text-gray-800 mt-1">
                    Polisi
                </h3>

                <p class="text-4xl font-bold text-red-600 mt-3">
                    110
                </p>
            </div>

            <div class="bg-green-50 border-l-4 border-green-500 rounded-2xl p-5">
                <p class="text-sm text-gray-500">
                    Kesehatan
                </p>

                <h3 class="text-xl font-bold text-gray-800 mt-1">
                    Ambulans
                </h3>

                <p class="text-4xl font-bold text-green-600 mt-3">
                    119
                </p>
            </div>

            <div class="bg-orange-50 border-l-4 border-orange-500 rounded-2xl p-5">
                <p class="text-sm text-gray-500">
                    Kebakaran
                </p>

                <h3 class="text-xl font-bold text-gray-800 mt-1">
                    Pemadam Kebakaran
                </h3>

                <p class="text-4xl font-bold text-orange-600 mt-3">
                    113
                </p>
            </div>

            <div class="bg-blue-50 border-l-4 border-blue-500 rounded-2xl p-5">
                <p class="text-sm text-gray-500">
                    Evakuasi
                </p>

                <h3 class="text-xl font-bold text-gray-800 mt-1">
                    SAR Nasional
                </h3>

                <p class="text-4xl font-bold text-blue-600 mt-3">
                    115
                </p>
            </div>

        </div>

    </div>

    <!-- Kontak WaterRelief -->
    <div class="bg-white rounded-3xl shadow-lg p-6">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Kontak WaterRelief
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <!-- Email -->
            <div class="bg-gray-50 rounded-2xl p-5">

                <p class="text-sm text-gray-500">
                    Email
                </p>

                <a
                    href="mailto:waterrelief@gmail.com"
                    class="block mt-2 text-lg font-bold text-gray-800 hover:text-blue-600 hover:underline transition duration-200">

                    waterrelief@gmail.com

                </a>

            </div>

            <!-- No Telepon -->
            <div class="bg-gray-50 rounded-2xl p-5">

                <p class="text-sm text-gray-500">
                    No Telepon
                </p>

                <a
                    href="tel:+6285261021275"
                    class="block mt-2 text-lg font-bold text-gray-800 hover:text-blue-600 hover:underline transition duration-200">

                    +62 852-6102-1275

                </a>

            </div>

            <!-- Instagram -->
            <div class="bg-gray-50 rounded-2xl p-5">

                <p class="text-sm text-gray-500">
                    Instagram
                </p>

                <a
                    href="https://instagram.com/water_relief"
                    target="_blank"
                    class="block mt-2 text-lg font-bold text-gray-800 hover:text-blue-600 hover:underline transition duration-200">

                    @water_relief

                </a>

            </div>

            <!-- Facebook -->
            <div class="bg-gray-50 rounded-2xl p-5">

                <p class="text-sm text-gray-500">
                    Facebook
                </p>

                <a
                    href="https://facebook.com/"
                    target="_blank"
                    class="block mt-2 text-lg font-bold text-gray-800 hover:text-blue-600 hover:underline transition duration-200">

                    WaterRelief Official

                </a>

            </div>

        </div>

    </div>

</div>

</x-layouts.dashboard>

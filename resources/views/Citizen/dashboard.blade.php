<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Dashboard</title>

</head>

<body class="bg-gray-100 font-sans antialiased">

    @include('layouts.navigation')

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl rounded-2xl p-6">

                <h1 class="text-3xl font-bold text-gray-800">
                    Citizen Dashboard
                </h1>

                <p class="text-gray-500 mt-2">
                    Welcome to WaterRelief System.
                </p>

                <div class="mt-6">
                    <h2 class="text-xl font-semibold">Two-Factor Authentication</h2>
                    @if(auth()->user()->two_factor_enabled)
                        <p class="text-green-600">Enabled</p>
                        <form method="POST" action="{{ route('two-factor.disable') }}">
                            @csrf
                            <button type="submit" class="mt-2 px-4 py-2 bg-red-500 text-white rounded">Disable 2FA</button>
                        </form>
                    @else
                        <p class="text-red-600">Disabled</p>
                        <form method="POST" action="{{ route('two-factor.enable') }}">
                            @csrf
                            <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Enable 2FA</button>
                        </form>
                    @endif
                </div>

            </div>

        </div>

    </div>

</body>
</html>
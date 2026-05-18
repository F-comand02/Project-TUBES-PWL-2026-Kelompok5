@php
    $roleName = $roleName ?? Auth::user()?->role?->role_name;

    $isvolunteer = strtolower((string) $roleName) === 'volunteer';

    $primaryColor = $isvolunteer ? 'green' : 'blue';
@endphp

<x-layouts.dashboard
    title="Profile"
    color="{{ $primaryColor }}"
    role="{{ Auth::user()->role?->role_name }}">


    <div class="grid grid-cols-1 xl:grid-cols-3 gap-4 md:gap-8 overflow-x-hidden">

        <!-- LEFT SIDE -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 h-fit">

            <div class="flex flex-col items-center text-center">

                <!-- PHOTO -->
                <div class="relative">

                    @if(Auth::user()->profile_photo)

                        <img
                            src="{{ asset('storage/profile-photos/' . Auth::user()->profile_photo) }}"
                            class="w-40 h-40 rounded-full object-cover border-4 shadow-lg
                            {{ $isvolunteer
                                ? 'border-green-100'
                                : 'border-blue-100'
                            }}">

                    @else

                        <div
                            class="w-40 h-40 rounded-full text-white flex items-center justify-center text-6xl font-black shadow-lg
                            {{ $isvolunteer
                                ? 'bg-green-600'
                                : 'bg-blue-600'
                            }}">

                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                        </div>

                    @endif

                </div>

                <!-- NAME -->
                <h1 class="mt-6 text-3xl font-bold text-slate-900">
                    {{ Auth::user()->name }}
                </h1>

                <!-- ROLE -->
                <p class="text-gray-500 mt-2">

                    {{ $isvolunteer
                        ? 'Akun Volunteer'
                        : 'Akun Citizen'
                    }}

                </p>

                <!-- EMAIL -->
                <div
                    class="mt-8 w-full bg-gray-50 rounded-2xl p-5 text-left border border-gray-100">

                    <p class="text-sm text-gray-400">
                        Alamat Email
                    </p>

                    <h2 class="mt-2 font-semibold text-slate-900 break-all">
                        {{ Auth::user()->email }}
                    </h2>

                </div>

                <!-- STATUS -->
                <div
                    class="mt-4 w-full rounded-2xl p-5 text-left border
                    {{ $isvolunteer
                        ? 'bg-green-50 border-green-100'
                        : 'bg-blue-50 border-blue-100'
                    }}">

                    <p
                        class="text-sm
                        {{ $isvolunteer
                            ? 'text-green-400'
                            : 'text-blue-400'
                        }}">

                        Status Akun

                    </p>

                    <h2
                        class="mt-2 font-semibold
                        {{ $isvolunteer
                            ? 'text-green-700'
                            : 'text-blue-700'
                        }}">

                        Akun Aktif

                    </h2>

                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="xl:col-span-2 space-y-8 min-w-0">

            <!-- PROFILE FORM -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-4 md:p-8 overflow-x-hidden">

                <div class="mb-8">

                    <h1 class="text-3xl font-bold text-slate-900 mb-3">
                        Edit Profile
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Perbarui informasi profil Anda untuk menjaga akun Anda tetap terkini.
                    </p>

                </div>

                @if(session('success'))

                    <div
                        class="mb-6 bg-green-100 text-green-700 px-5 py-4 rounded-2xl font-medium">

                        {{ session('success') }}

                    </div>

                @endif

                <form
                    method="POST"
                    action="{{ route('profile.update') }}"
                    enctype="multipart/form-data"
                    class="space-y-6">

                    @csrf

                    <!-- PHOTO -->
                    <div>

                        <label
                            class="block text-sm font-semibold text-gray-700 mb-3">

                            Foto Profil

                        </label>

                        <input
                            type="file"
                            name="profile_photo"
                            class="block w-full text-sm text-gray-500
                            file:mr-4
                            file:py-3
                            file:px-5
                            file:rounded-2xl
                            file:border-0
                            file:text-white
                            hover:file:scale-105
                            transition-all
                            {{ $isvolunteer
                                ? 'file:bg-green-600 hover:file:bg-green-700'
                                : 'file:bg-blue-600 hover:file:bg-blue-700'
                            }}">

                    </div>

                    <!-- NAME -->
                    <div>

                        <label
                            class="block text-sm font-semibold text-gray-700 mb-3">

                            Nama Lengkap

                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ Auth::user()->name }}"
                            class="w-full rounded-2xl border-gray-300
                            {{ $isvolunteer
                                ? 'focus:border-green-500 focus:ring-green-500'
                                : 'focus:border-blue-500 focus:ring-blue-500'
                            }}">

                    </div>

                    <!-- PHONE -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Nomor Telepon
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ Auth::user()->phone }}"
                            class="w-full rounded-2xl border-gray-300
                            {{ $isvolunteer
                                ? 'focus:border-green-500 focus:ring-green-500'
                                : 'focus:border-blue-500 focus:ring-blue-500'
                            }}">

                    </div>

                    <!-- ADDRESS -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Alamat
                        </label>

                        <input
                            type="text"
                            name="address"
                            value="{{ Auth::user()->address }}"
                            class="w-full rounded-2xl border-gray-300 px-1
                            {{ $isvolunteer
                                ? 'focus:border-green-500 focus:ring-green-500'
                                : 'focus:border-blue-500 focus:ring-blue-500'
                            }}">

                    </div>

                    <!-- DATE OF BIRTH -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Tanggal Lahir
                        </label>

                        <input
                            type="date"
                            name="date_of_birth"
                            value="{{ Auth::user()->date_of_birth }}"
                            class="w-full rounded-2xl border-gray-300
                            {{ $isvolunteer
                                ? 'focus:border-green-500 focus:ring-green-500'
                                : 'focus:border-blue-500 focus:ring-blue-500'
                            }}">

                    </div>

                    <!-- GENDER -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Jenis Kelamin
                        </label>

                        <select
                            name="gender"
                            class="w-full appearance-none rounded-2xl border border-gray-300 bg-white px-4 py-3 text-sm md:text-base
                            {{ $isvolunteer
                                ? 'focus:border-green-500 focus:ring-green-500'
                                : 'focus:border-blue-500 focus:ring-blue-500'
                            }}">

                            <option value="">Select Gender</option>

                            <option
                                value="Male"
                                {{ Auth::user()->gender == 'Male' ? 'selected' : '' }}>

                                Laki-laki

                            </option>

                            <option
                                value="Female"
                                {{ Auth::user()->gender == 'Female' ? 'selected' : '' }}>

                                Perempuan

                            </option>

                        </select>

                    </div>

                    <!-- BIO -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Bio
                        </label>

                        <textarea
                            name="bio"
                            rows="4"
                            class="w-full rounded-2xl border-gray-300 px-4 py-3 leading-relaxed resize-none
                            {{ $isvolunteer
                                ? 'focus:border-green-500 focus:ring-green-500'
                                : 'focus:border-blue-500 focus:ring-blue-500'
                            }}">{{ Auth::user()->bio }}</textarea>

                    </div>

                    {{-- VOLUNTEER EXTRA SECTION --}}
                    @if($isvolunteer)

                        <div class="border-t border-gray-100 pt-6">

                            <h2 class="text-2xl font-bold text-green-700 mb-6">
                                Informasi Volunteer
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- VOLUNTEER SKILL -->
                                <div>

                                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                                        Keterampilan Volunteer
                                    </label>

                                    <input
                                        type="text"
                                        name="skills"
                                        placeholder="First Aid, Rescue, Logistics"
                                        value="{{ Auth::user()->skills }}"
                                        class="w-full rounded-2xl border-gray-300
                                        focus:border-green-500 focus:ring-green-500">

                                </div>

                                <!-- ORGANIZATION -->
                                <div>

                                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                                        Organisasi
                                    </label>

                                    <input
                                        type="text"
                                        name="organization"
                                        placeholder="Community Organization"
                                        value="{{ Auth::user()->organization }}"
                                        class="w-full rounded-2xl border-gray-300
                                        focus:border-green-500 focus:ring-green-500">

                                </div>

                                <!-- EXPERIENCE -->
                                <div>

                                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                                        Pengalaman Volunteer
                                    </label>

                                    <input
                                        type="text"
                                        name="experience"
                                        placeholder="2 Tahun"
                                        value="{{ Auth::user()->experience }}"
                                        class="w-full rounded-2xl border-gray-300

                                        focus:border-green-500 focus:ring-green-500">

                                </div>

                                <!-- AVAILABILITY -->
                                <div>

                                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                                        Ketersediaan
                                    </label>

                                    <select
                                        name="availability"

                                        class="w-full rounded-2xl border-gray-300
                                        focus:border-green-500 focus:ring-green-500">

                                    <option value="Weekdays"
                                    {{ Auth::user()->availability == 'Weekdays' ? 'selected' : '' }}>
                                        Weekdays
                                    </option>

                                    <option value="Weekends"
                                    {{ Auth::user()->availability == 'Weekends' ? 'selected' : '' }}>
                                        Weekends
                                    </option>

                                    <option value="Full Time"
                                    {{ Auth::user()->availability == 'Full Time' ? 'selected' : '' }}>
                                        Full Time
                                    </option>

                                    <option value="Part Time"
                                    {{ Auth::user()->availability == 'Part Time' ? 'selected' : '' }}>
                                        Part Time
                                    </option>

                                    </select>

                                </div>

                            </div>

                        </div>

                    @endif

                    <!-- EMAIL -->
                    <div>

                        <label
                            class="block text-sm font-semibold text-gray-700 mb-3">

                            Alamat Email

                        </label>

                        <input
                            type="email"
                            value="{{ Auth::user()->email }}"
                            disabled
                            class="w-full rounded-2xl border-gray-300 bg-gray-100 text-gray-500 px-1">

                    </div>

                    <!-- BUTTON -->
                    <div class="pt-4">

                        <button
                            type="submit"
                            class="px-8 py-4 rounded-2xl text-white font-bold transition-all duration-300 hover:scale-[1.02] shadow-lg
                            {{ $isvolunteer
                                ? 'bg-green-600 hover:bg-green-700'
                                : 'bg-blue-600 hover:bg-blue-700'
                            }}">

                            Simpan Perubahan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-layouts.dashboard>
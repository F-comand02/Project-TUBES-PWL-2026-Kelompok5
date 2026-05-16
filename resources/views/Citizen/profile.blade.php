<x-layouts.dashboard title="Profile Settings">

   <div class="grid grid-cols-1 xl:grid-cols-3 gap-4 md:gap-8 overflow-x-hidden">

        <!-- LEFT SIDE -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 h-fit">

            <div class="flex flex-col items-center text-center">

                <!-- PHOTO -->
                <div class="relative">

                    @if(Auth::user()->profile_photo)

                        <img
                            src="{{ asset('storage/profile-photos/' . Auth::user()->profile_photo) }}"
                            class="w-40 h-40 rounded-full object-cover border-4 border-blue-100 shadow-lg">

                    @else

                        <div
                            class="w-40 h-40 rounded-full bg-blue-600 text-white flex items-center justify-center text-6xl font-black shadow-lg">

                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                        </div>

                    @endif

                </div>

                <!-- NAME -->
                <h1 class="mt-6 text-3xl font-medium text-slate-900">
                    {{ Auth::user()->name }}
                </h1>

                <p class="text-gray-500 mt-2">
                    Citizen Account
                </p>

                <!-- EMAIL -->
                <div
                    class="mt-8 w-full bg-gray-50 rounded-2xl p-5 text-left border border-gray-100">

                    <p class="text-sm text-gray-400">
                        Email Address
                    </p>

                    <h2 class="mt-2 font-semibold text-slate-900 break-all">
                        {{ Auth::user()->email }}
                    </h2>

                </div>

                <!-- STATUS -->
                <div
                    class="mt-4 w-full bg-blue-50 rounded-2xl p-5 text-left border border-blue-100">

                    <p class="text-sm text-blue-400">
                        Account Status
                    </p>

                    <h2 class="mt-2 font-semibold text-blue-700">
                        Active Account
                    </h2>

                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->
       <div class="xl:col-span-2 space-y-8 min-w-0">

            <!-- PROFILE FORM -->
          <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-4 md:p-8 overflow-x-hidden">

                <div class="mb-8">

                    <h1 class="text-3xl font-medium text-slate-900">
                        Profile Settings
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Update your personal information.
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

                            Profile Photo

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
                            file:bg-blue-600
                            file:text-white
                            hover:file:bg-blue-700">

                    </div>

                    <!-- NAME -->
                    <div>

                        <label
                            class="block text-sm font-semibold text-gray-700 mb-3">

                            Full Name

                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ Auth::user()->name }}"
                            class="w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                    </div>

                    <!-- PHONE -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Phone Number
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ Auth::user()->phone }}"
                            class="w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                    </div>

                    <!-- ADDRESS -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Address
                        </label>

                        <input
                            type="text"
                            name="address"
                            value="{{ Auth::user()->address }}"
                            class="w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                    </div>

                    <!-- DATE OF BIRTH -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Date of Birth
                        </label>

                        <input
                            type="date"
                            name="date_of_birth"
                            value="{{ Auth::user()->date_of_birth }}"
                            class="w-full rounded-2xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">

                    </div>

                    <!-- GENDER -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Gender
                        </label>

                       <select
                        name="gender"
                        class="w-full md:max-w-full max-w-[220px] appearance-none rounded-2xl border border-gray-300 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500 text-sm md:text-base">

                            <option value="">Select Gender</option>

                            <option
                                value="Male"
                                {{ Auth::user()->gender == 'Male' ? 'selected' : '' }}>

                                Male

                            </option>

                            <option
                                value="Female"
                                {{ Auth::user()->gender == 'Female' ? 'selected' : '' }}>

                                Female

                            </option>

                        </select>

                    </div>

                    <!-- BIO -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            About Me
                        </label>

                        <textarea
                            name="bio"
                            rows="4"
                            class="w-full rounded-2xl border-gray-300 px-4 py-3 leading-relaxed resize-none focus:border-blue-500 focus:ring-blue-500">{{ Auth::user()->bio }}</textarea>

                    </div>

                    <!-- EMAIL -->
                    <div>

                        <label
                            class="block text-sm font-semibold text-gray-700 mb-3">

                            Email Address

                        </label>

                        <input
                            type="email"
                            value="{{ Auth::user()->email }}"
                            disabled
                            class="w-full px-4 rounded-2xl border-gray-300 bg-gray-100 text-gray-500">

                    </div>

                    <!-- BUTTON -->
                    <div class="pt-4">

                        <button
                            type="submit"
                            class="px-8 py-4 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-bold transition-all duration-300 hover:scale-[1.02] shadow-lg">

                            Save Changes

                        </button>

                    </div>

                </form>

            </div>

            </div>

        </div>

    </div>

</x-layouts.dashboard>
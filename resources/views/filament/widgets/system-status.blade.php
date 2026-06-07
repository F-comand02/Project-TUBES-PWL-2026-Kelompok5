<x-filament::section>

    <x-slot name="heading">
        System Status
    </x-slot>

    <div class="space-y-3">

        <div class="flex items-center justify-between p-2 rounded-lg bg-gray-50">
            <span>Users</span>
            <span class="font-bold text-primary-600">
                {{ \App\Models\User::count() }}
            </span>
        </div>

        <div class="flex items-center justify-between p-2 rounded-lg bg-gray-50">
            <span>Volunteers</span>
            <span class="font-bold text-success-600">
                {{ \App\Models\User::whereHas('role', fn($q) => $q->where('role_name', 'volunteer'))->count() }}
            </span>
        </div>

        <div class="flex items-center justify-between p-2 rounded-lg bg-gray-50">
            <span>Shelters</span>
            <span class="font-bold text-info-600">
                {{ \App\Models\Shelter::count() }}
            </span>
        </div>

        <div class="flex items-center justify-between p-2 rounded-lg bg-gray-50">
            <span>Complaints</span>
            <span class="font-bold text-warning-600">
                {{ \App\Models\Complaint::count() }}
            </span>
        </div>

        <div class="flex items-center justify-between p-2 rounded-lg bg-gray-50">
            <span>Donations</span>
            <span class="font-bold text-success-600">
                {{ \App\Models\Donation::count() }}
            </span>
        </div>

    </div>

</x-filament::section>
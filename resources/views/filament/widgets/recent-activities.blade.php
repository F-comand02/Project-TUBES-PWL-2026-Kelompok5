<x-filament::section>

    <x-slot name="heading">
        Recent Activities
    </x-slot>

    <div class="space-y-3">

        @foreach(\App\Models\Complaint::latest()->take(3)->get() as $complaint)

            <div class="flex items-center justify-between p-2 rounded-lg bg-gray-50">

               <div class="flex justify-between items-center">
            <span>{{ $complaint->title }}</span>

            <span class="text-xs text-gray-500">
                {{ $complaint->created_at->diffForHumans() }}
            </span>
        </div>

            </div>  

        @endforeach

        @foreach(\App\Models\Donation::latest()->take(3)->get() as $donation)

            <div class="flex items-center justify-between p-2 rounded-lg bg-gray-50">

                 <div class="flex justify-between items-center">
                    <span>{{ $donation->item_name }}</span>

                <span class="text-xs text-gray-500">
                    {{ $donation->created_at->diffForHumans() }}
                </span>

            </div>

        @endforeach

    </div>

</x-filament::section>
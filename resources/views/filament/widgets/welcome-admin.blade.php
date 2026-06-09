<x-filament::section>

 <x-slot name="heading">
        Hi There, Admin!
</x-slot>
    <div class="bg-gradient-to-r from-amber-500 to-orange-600 p-6 rounded-xl text-white shadow-lg">

        <h2 class="text-3xl font-bold">
            {{ auth()->user()->name }}
        </h2>

        <p class="mt-2 text-orange-100">
            {{ auth()->user()->email }}
        </p>

        <span class="inline-flex mt-3 rounded-full bg-white/20 px-3 py-1 text-xs font-medium">
        Administrator
        </span>

        <div class="mt-4 h-px bg-orange-300/30"></div>

    </div>

</x-filament::section>
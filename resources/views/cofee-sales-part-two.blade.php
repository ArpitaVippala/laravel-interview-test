<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New ☕️ Sales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @livewire('cofee-sales-part2-component')
                <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h2>Previous Sales</h2>
                    <livewire:sales-list-part-two/>
                </div>
            </div>
        </div>
    </div>    
</x-app-layout>

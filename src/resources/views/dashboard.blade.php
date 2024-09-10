<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 p-6">
                    <div class=" p-6">
                        <livewire:dashboard.admin-chart />
                    </div>

                    <div class=" p-6">
                        <livewire:dashboard.services-chart />
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

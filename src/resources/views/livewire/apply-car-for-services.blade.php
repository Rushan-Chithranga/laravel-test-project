<div>
    {{-- Services Add Modal --}}
    <div x-data="{ isOpen: $wire.entangle('addService') }">
        <div x-show="isOpen" x-on:click.outside="isOpen = false"
            class="flex fixed inset-0 z-40 min-h-full overflow-y-auto overflow-x-hidden transition items-center justify-center">
            <div aria-hidden="true" class="fixed inset-0 w-full h-full bg-black/50 cursor-pointer" @click="isOpen = false">
            </div>

            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <div class="relative p-4 bg-gray-200 rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <div
                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Add Service
                        </h3>
                        <button type="button" @click="isOpen = false"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="defaultModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div class="sm:col-span-2 ">
                            <label class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Washing
                                Section</label>
                            <div class="flex flex-row gap-12">
                                @foreach ($services as $service)
                                    @if ($service->service_name === 'Washing section')
                                        @foreach ($servicesTasks as $servicesTask)
                                            @if ($servicesTask->service_id == $service->id)
                                                <div class="flex items-center mb-4">
                                                    <input id="washing_{{ $servicesTask->id }}" type="radio"
                                                        name="Washing_section" wire:model="Washing_section"
                                                        value="{{ $servicesTask->task_name }}"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="washing_{{ $servicesTask->id }}"
                                                        class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">{{ $servicesTask->task_name }}</label>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Interior
                                cleaning section</label>
                            <div class="flex flex-row gap-12">
                                @foreach ($services as $service)
                                    @if ($service->service_name === 'Interior cleaning section')
                                        @foreach ($servicesTasks as $servicesTask)
                                            @if ($servicesTask->service_id == $service->id)
                                                <div class="flex items-center mb-4">
                                                    <input id="washing_{{ $servicesTask->id }}" type="radio"
                                                        name="Interior_cleaning_section"
                                                        wire:model="Interior_cleaning_section"
                                                        value="{{ $servicesTask->task_name }}"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="washing_{{ $servicesTask->id }}"
                                                        class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">{{ $servicesTask->task_name }}</label>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Service
                                section</label>
                            @foreach ($services as $service)
                                @if ($service->service_name === 'Service section')
                                    @foreach ($servicesTasks as $servicesTask)
                                        @if ($servicesTask->service_id == $service->id)
                                            <div class="flex items-center mb-4">
                                                <input id="washing_{{ $servicesTask->id }}" type="checkbox"
                                                    name="Service_section[]" wire:model="Service_section"
                                                    value="{{ $servicesTask->task_name }}"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="washing_{{ $servicesTask->id }}"
                                                    class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">{{ $servicesTask->task_name }}</label>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <button type="button" wire:click="create" x-on:click="isOpen = true"
                        class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add new Service
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full">
                <div class="container mt-10">
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="p-4">
                            <div class="flex justify-between w-full">
                                <form class="flex items-center max-w-md justify-end gap-3"
                                    wire:submit.prevent="searchCustomer">
                                    <label for="simple-search" class="sr-only">Search</label>
                                    <input type="search" id="simple-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Search ..." wire:model.live.debounce.500ms="search" />
                                    <button type="submit"
                                        class="p-2.5 ms-2 text-sm font-medium text-white bg-green-700 rounded-lg border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                        <span class="sr-only">Search</span>
                                    </button>
                                </form>
                            </div>

                            <div class="overflow-x-auto mt-4">
                                <div class="p-6 bg-gray-100">
                                    <div class="text-center text-2xl font-bold mb-6">Apply Services for car</div>

                                    @if ($noDataFound)
                                        <div class="text-center py-12 w-full">
                                            No Services found.
                                        </div>
                                    @elseif ($applyCarServices && $applyCarServices->isNotEmpty())
                                        <div
                                            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                                            @foreach ($applyCarServices as $customer)
                                                @foreach ($customer->cars as $car)
                                                    <div
                                                        class="bg-white rounded-xl shadow-md hover:shadow-2xl overflow-hidden transform transition-all hover:translate-y-2">
                                                        <img src="https://c8.alamy.com/comp/2C611KN/auto-car-service-logo-icon-vector-illustration-template-modern-car-service-vector-logo-silhouette-design-abstract-car-logo-vector-illustration-for-c-2C611KN.jpg"
                                                            alt="Car Image" class="w-full h-48 object-cover p-5">
                                                        <div class="p-4">
                                                            <h4 class="text-lg font-bold truncate">Car Details</h4>
                                                            <h3 class="mt-2 text-gray-600 text-sm truncate">
                                                                Model: {{ $car->model }}
                                                            </h3>
                                                            <p class="mt-2 text-gray-600 text-sm truncate">
                                                                Owner: {{ $car->customer->name }}
                                                            </p>
                                                            <p class="mt-2 text-gray-600 text-sm truncate">
                                                                Reg_number: {{ $car->registration_number }}
                                                            </p>
                                                            <p class="mt-2 text-gray-600 text-sm truncate">
                                                                Fuel Type: {{ $car->fuel_type }}
                                                            </p>
                                                            <p class="mt-2 text-gray-600 text-sm truncate">
                                                                Transmission Type: {{ $car->transmission_type }}
                                                            </p>
                                                            <div class="mt-4 flex justify-start items-center gap-3">
                                                                <a type="button" x-data="{ loading: false }"
                                                                    wire:click="openAddServiceModal({{ $customer->id}}, {{$car->id}})"
                                                                    class="cursor-pointer bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-700 transition duration-300">
                                                                    Apply
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @if ($applyCarServices && $applyCarServices->isNotEmpty())
                                <div class="mt-5">
                                    {{ $applyCarServices->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

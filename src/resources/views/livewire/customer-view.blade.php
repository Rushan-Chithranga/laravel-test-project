<div>
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
                                    <div class="text-center text-2xl font-bold mb-6">Search Your Services</div>
                                    @if ($noDataFound)
                                        <div class="text-center py-12 w-full">
                                            No Services found.
                                        </div>
                                    @elseif ($customerDetails && $customerDetails->isNotEmpty())
                                        <div class="space-y-6">
                                            @foreach ($customerDetails as $customerDetail)
                                                @foreach ($customerDetail->cars as $car)
                                                    <div class="overflow-hidden">
                                                        <div
                                                            class="bg-white rounded-xl shadow-lg hover:shadow-2xl overflow-hidden transform transition-all hover:translate-y-2 w-auto flex">

                                                            <!-- Profile Image Section -->
                                                            <img src="{{ Auth::user()->profile_photo_url ? asset(Auth::user()->profile_photo_url) : 'https://static.vecteezy.com/system/resources/previews/005/129/844/non_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg' }}"
                                                                alt="Customer" class="object-cover p-4" width="250">

                                                            <!-- Car Details Section -->
                                                            <div class="p-6 w-2/3 grid grid-cols-2 gap-4">
                                                                <div>
                                                                    <h4 class="text-2xl font-bold col-span-2 mb-4">Car
                                                                        Details</h4>

                                                                    <!-- Left Column -->
                                                                    <p class="text-gray-800 text-lg font-semibold">
                                                                        Model: <span
                                                                            class="font-normal">{{ $car->model }}</span>
                                                                    </p>
                                                                    <p class="mt-2 text-gray-700 text-lg font-semibold">
                                                                        Owner: <span
                                                                            class="font-normal">{{ $car->customer->name }}</span>
                                                                    </p>
                                                                    <p class="mt-2 text-gray-700 text-lg font-semibold">
                                                                        Reg_number: <span
                                                                            class="font-normal">{{ $car->registration_number }}</span>
                                                                    </p>
                                                                    <p class="mt-2 text-gray-700 text-lg font-semibold">
                                                                        Fuel Type: <span
                                                                            class="font-normal">{{ $car->fuel_type }}</span>
                                                                    </p>
                                                                    <p class="text-gray-700 text-lg font-semibold">
                                                                        Transmission Type: <span
                                                                            class="font-normal">{{ $car->transmission_type }}</span>
                                                                    </p>
                                                                </div>

                                                                <!-- Right Column -->
                                                                <div>
                                                                    <p class="mt-2 text-gray-700 text-lg font-semibold">
                                                                        Year: <span
                                                                            class="font-normal">{{ $car->year }}</span>
                                                                    </p>
                                                                    <p class="mt-2 text-gray-700 text-lg font-semibold">
                                                                        Mileage: <span
                                                                            class="font-normal">{{ $car->mileage }}
                                                                            km</span>
                                                                    </p>
                                                                    <p class="mt-2 text-gray-700 text-lg font-semibold">
                                                                        Color: <span
                                                                            class="font-normal">{{ $car->color }}</span>
                                                                    </p>
                                                                </div>

                                                                <!-- Full-width Button -->
                                                                <div class="col-span-2 mt-6">
                                                                    <a type="button" x-data="{ loading: false }"
                                                                        wire:click="#"
                                                                        class="flex justify-center cursor-pointer bg-blue-600 text-white text-lg px-6 py-2 rounded-md w-full hover:bg-blue-800 transition duration-300">
                                                                        View
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    @endif

                                </div>
                            </div>

                            @if ($customerDetails && $customerDetails->isNotEmpty())
                                <div class="mt-5">
                                    {{ $customerDetails->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

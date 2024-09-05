<div>
    {{-- Car Create Modal --}}
    <div x-data="{ isOpen: $wire.entangle('addCar')}">
        <div
        x-show="isOpen"
        x-on:click.outside="isOpen = false"
        class="flex fixed inset-0 z-40 min-h-full overflow-y-auto overflow-x-hidden transition items-center justify-center"
        >
        <div aria-hidden="true" class="fixed inset-0 w-full h-full bg-black/50 cursor-pointer" @click="isOpen = false" >
        </div>

            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <div class="relative p-4 bg-gray-200 rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <div
                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Add Car
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
                        <div class="sm:col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Car
                                Registation Number</label>
                            <input type="text" name="registration_number" id="title" wire:model="registration_number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="enter your registration number">
                            @error('registration_number')
                                <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Car Model</label>
                            <input type="text" name="carModel" id="title" wire:model="carModel"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="enter your car model">
                            @error('carModel')
                                <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        </div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Customer option</label>
                            {{-- @dd($batch->customer_name->id) --}}
                            <select wire:model="customer_name" id="customer_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-3" name="customer_name" >
                                <option selected>Choose a Customer</option>
                                @foreach($customers as $customer)
                                {{-- @if ($batch->course_id == $cou->id)
                                <option selected value={{ $cou->id }}>{{$cou->name}}</option>
                                @else --}}

                                <option value={{ $customer->id }}>{{$customer->name}}</option>
                                {{-- @endif --}}
                                @endforeach
                            </select>
                            @error('customer_name')
                            <p class="text-red-600">{{ $message }}</p>
                        @enderror
                        <div>
                        </div>
                            <label for="fuel_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select fuel option</label>
                            <select wire:model="fuel_type" id="fuel_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-3" name="fuel_type"  >
                                <option selected>Choose a type</option>
                                <option value="petrol">Petrol</option>
                                <option value="diesal">Diesal</option>
                            </select>
                        <div>
                        </div>
                            <label for="transmission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select transmission option</label>
                            <select wire:model="transmission" id="transmission" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-3" name="transmission">
                                <option selected>Choose a type</option>
                                <option value="Auto">Auto</option>
                                <option value="Manual">Manual</option>
                                <option value="Other">Other</option>
                            </select>
                        <div>
                    </div>
                    <button type="button" wire:click="create"
                        x-on:click="isOpen = true"
                        class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add new Car
                    </button>
                    <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2" wire:loading wire:target="create">
                        <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

     {{-- Car Update Modal --}}
     <div x-data="{ isOpen: $wire.entangle('updateCar')}">
        <div
            x-show="isOpen"
            class=" flex fixed inset-0 z-40 min-h-full overflow-y-auto overflow-x-hidden transition items-center justify-center"
            >
            <div aria-hidden="true" class="fixed inset-0 w-full h-full bg-black/50 cursor-pointer" @click="isOpen = false">
            </div>

            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-gray-200 rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div
                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Update Car
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
                    <!-- Modal body -->
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Car
                                Registation Number</label>
                            <input type="text" name="updareRegistration_number" id="title" wire:model="updareRegistration_number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="enter your registration number">
                            @error('updareRegistration_number')
                                <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Car Model</label>
                            <input type="text" name="updateCarModel" id="title" wire:model="updateCarModel"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="enter your car model">
                            @error('updateCarModel')
                                <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                            </div>
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Customer option</label>
                                <select wire:model="updateCustomer_name" id="updateCustomer_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-3" name="updateCustomer_name">
                                    <option selected>Choose a Customer</option>
                                    @foreach($customers as $customer)
                                    {{-- @dd($customer); --}}
                                        @if ($customer->id == $customer->id)
                                            <option selected value={{ $customer->id }}>{{$customer->name}}</option>
                                        @else
                                            <option value={{ $customer->id }}>{{$customer->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('updateCustomer_name')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror
                            <div>
                        </div>
                            <label for="updateFuel_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select fuel option</label>
                            <select wire:model="updateTransmission" id="updateTransmission" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-3" name="updateTransmission"  >
                                <option selected>Choose a type</option>
                                <option value="petrol">Petrol</option>
                                <option value="diesal">Diesal</option>
                            </select>
                        <div>
                        </div>
                            <label for="transmission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select transmission option</label>
                            <select wire:model="transmission" id="transmission" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-3" name="transmission">
                                <option selected>Choose a type</option>
                                <option value="Auto">Auto</option>
                                <option value="Manual">Manual</option>
                                <option value="Other">Other</option>
                            </select>
                        <div>
                    </div>
                    <button type="button" wire:click="carUpdate"
                        class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Update Customer
                    </button>
                </div>
            </div>
        </div>
    </div>

     {{-- Car Delete Modal --}}
     <div x-data="{ isOpen: $wire.entangle('deleteCar') }">

        <div x-show="isOpen"
            class="flex fixed inset-0 z-40 min-h-full overflow-y-auto overflow-x-hidden transition items-center">
        <div aria-hidden="true" class="fixed inset-0 w-full h-full bg-black/50 cursor-pointer" @click="isOpen = false">
        </div>

            <div class="relative w-full cursor-pointer pointer-events-none transition my-auto p-4">
                <div
                    class="w-full py-2 bg-white cursor-default pointer-events-auto dark:bg-gray-800 relative rounded-xl mx-auto max-w-sm">

                    <button @click="isOpen = false" tabindex="-1" type="button" class="absolute top-2 right-2 rtl:right-auto rtl:left-2">
                        <svg title="Close" tabindex="-1" class="h-4 w-4 cursor-pointer text-gray-400"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">
                            Close
                        </span>
                    </button>

                    <div class="space-y-2 p-2">
                        <div class="p-4 space-y-2 text-center dark:text-white">
                            <h2 class="text-xl font-bold tracking-tight" id="page-action.heading">
                                Delete {{ $deleteCarName }} Car
                            </h2>

                            <p class="text-gray-500">
                                Are you sure you would like to do this?
                            </p>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <div aria-hidden="true" class="border-t dark:border-gray-700 px-2"></div>

                        <div class="px-6 py-2">
                            <div class="grid gap-2 grid-cols-[repeat(auto-fit,minmax(0,1fr))]">
                                <button type="button"
                                        @click="isOpen = false"
                                        class="inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset dark:focus:ring-offset-0 min-h-[2.25rem] px-4 text-sm text-gray-800 bg-white border-gray-300 hover:bg-gray-50 focus:ring-primary-600 focus:text-primary-600 focus:bg-primary-50 focus:border-primary-600 dark:bg-gray-800 dark:hover:bg-gray-700 dark:border-gray-600 dark:hover:border-gray-500 dark:text-gray-200 dark:focus:text-primary-400 dark:focus:border-primary-400 dark:focus:bg-gray-800">
                                        <span class="flex items-center gap-1">
                                            <span class="">
                                                Cancel
                                            </span>
                                        </span>
                                </button>

                                <button type="submit"
                                        wire:click="carDelete"
                                        class="inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset dark:focus:ring-offset-0 min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-red-600 hover:bg-red-500 focus:bg-red-700 focus:ring-offset-red-700">
                                        <span class="flex items-center gap-1">
                                            <span class="">
                                                Confirm
                                            </span>
                                        </span>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" w-full">
                <div class="container mt-10">
                    <div class="bg-white shadow-md rounded-lg overflow-hidden ">
                        <div class="p-4">
                            <div class="flex justify-between w-full">

                                <button type="button" wire:click="openAddCarModal"
                                    class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Add new Car
                                </button>
                                <form class="flex items-center max-w-md justify-end gap-3">
                                    <label for="simple-search" class="sr-only">Search</label>
                                    <input type="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search ..."
                                    wire:model.live.debounce.500ms="search" />
                                    <select wire:model="customerSearch" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" aria-label="Default select example" name="category">
                                        <option selected  value="">All</option>
                                        @foreach ($customers as $customer )
                                        @if( request()->get('customer') && request()->get('customer')==$customer->id )
                                        <option selected value={{$customer->id}}>{{$customer->name}}</option>
                                        @else
                                        <option  value={{$customer->id}}>{{$customer->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <button
                                    wire:click.prevent="searchCustomer"
                                    type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-green-700 rounded-lg border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                        </svg>
                                        <span class="sr-only">Search</span>
                                    </button>
                                </form>
                            </div>

                            <div class="overflow-x-auto mt-4">
                                <div class="p-6 bg-gray-100 ">
                                    <div class="text-center text-2xl font-bold mb-6">Car</div>
                                        @if ($cars->isEmpty())
                                            <div class="text-center py-12 w-full">
                                                No Car found.
                                            </div>
                                        @else
                                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                                                @foreach($cars as $car)
                                                <div class="bg-white rounded-xl shadow-md hover:shadow-2xl overflow-hidden transform transition-all hover:translate-y-2">
                                                    <img src="https://img.freepik.com/premium-vector/car-svg-bundle-car-svg-racecar-svg-sports-car-svg_650032-457.jpg" alt="Customers Image" class="w-full h-48 object-cover">
                                                    <div class="p-4">
                                                        <h3 class="text-lg font-bold truncate">Model:{{ $car->model }}</h3>
                                                        <p class="mt-2 text-gray-600 text-sm truncate">Owner: {{ $car->customer->name }}</p>
                                                        <p class="mt-2 text-gray-600 text-sm truncate">Reg_number:{{ $car->registration_number }}</p>
                                                        <p class="mt-2 text-gray-600 text-sm truncate">Fuel Type: {{ $car->fuel_type }}</p>
                                                        <p class="mt-2 text-gray-600 text-sm truncate">Transmission Type:{{ $car->transmission_type }}</p>
                                                        <div class="mt-4 flex justify-start items-center gap-3">
                                                            <a x-data="{ loading: false }" wire:click="openUpdateModal({{ $car->id }})" href="#" class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-700 transition duration-300">
                                                                Edit
                                                            </a>
                                                            <a wire:click="openDeleteModal({{ $car->id }})" href="#" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 transition duration-300">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        @endif
                                </div>
                            </div>
                            <div class="mt-5">
                                {{ $cars->links() }}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

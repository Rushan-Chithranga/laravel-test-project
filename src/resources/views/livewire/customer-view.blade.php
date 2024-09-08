<div>
    <div x-data="{ isOpen: $wire.entangle('viewDetais') }">
        <div x-show="isOpen" x-on:click.outside="isOpen = false"
            class="flex fixed inset-0 z-40 min-h-full overflow-y-auto overflow-x-hidden transition items-center justify-center">
            <div aria-hidden="true" class="fixed inset-0 w-full h-full bg-black/50 cursor-pointer" @click="isOpen = false">
            </div>

            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <div
                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Services Task Jobs
                        </h3>

                        <button type="button" @click="isOpen = false"
                            class="cursor-pointer text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
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
                                class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Washing
                                Section</label>
                            @foreach ($jobTasks as $jobTask)
                                @if ($jobTask->services == 'Washing section')
                                    <div class="flex flex-row items-center justify-between">
                                        <span class="text-gray-500">
                                            {{ $jobTask->service_tasks }}
                                        </span>
                                        <span
                                            class="font-bold rounded px-2 py-1 shadow-lg
                                        {{ $jobTask->service_task_status == 'Running' ? 'bg-red-500 text-white' : '' }}
                                        {{ $jobTask->service_task_status == 'InProgres' ? 'bg-yellow-500 text-white' : '' }}
                                        {{ $jobTask->service_task_status == 'Pending' ? 'bg-blue-500 text-white' : '' }}
                                        {{ $jobTask->service_task_status == 'Completed' ? 'bg-green-500 text-white' : '' }}">
                                            {{ $jobTask->service_task_status }}
                                        </span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="sm:col-span-2">
                            <label for="name"
                                class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Interior
                                cleaning section</label>
                            @foreach ($jobTasks as $jobTask)
                                @if ($jobTask->services == 'Interior cleaning section')
                                    <div class="flex flex-row items-center justify-between">
                                        <span class="text-gray-500">
                                            {{ $jobTask->service_tasks }}
                                        </span>
                                        <span
                                            class="font-bold rounded px-2 py-1 shadow-lg
                                    {{ $jobTask->service_task_status == 'Running' ? 'bg-red-500 text-white' : '' }}
                                    {{ $jobTask->service_task_status == 'InProgres' ? 'bg-yellow-500 text-white' : '' }}
                                    {{ $jobTask->service_task_status == 'Pending' ? 'bg-blue-500 text-white' : '' }}
                                    {{ $jobTask->service_task_status == 'Completed' ? 'bg-green-500 text-white' : '' }}">
                                            {{ $jobTask->service_task_status }}
                                        </span>

                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <label for="" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white">Service
                        section</label>
                    @foreach ($jobTasks as $jobTask)
                        @if ($jobTask->services == 'Service section')
                            @php
                                $tasks = explode("\n", $jobTask->service_tasks);
                            @endphp
                            @foreach ($tasks as $taskIndex => $task)
                                <div class="flex flex-row items-center justify-between">
                                    <span class="text-gray-500">
                                        {{ $task }}
                                    </span>
                                    <span
                                        class="font-bold rounded px-2 py-1 shadow-lg
                                    {{ $jobTask->service_task_status == 'Running' ? 'bg-red-500 text-white' : '' }}
                                    {{ $jobTask->service_task_status == 'InProgres' ? 'bg-yellow-500 text-white' : '' }}
                                    {{ $jobTask->service_task_status == 'Pending' ? 'bg-blue-500 text-white' : '' }}
                                    {{ $jobTask->service_task_status == 'Completed' ? 'bg-green-500 text-white' : '' }}">
                                        {{ $jobTask->service_task_status }}
                                    </span>

                                </div>
                                <br>
                            @endforeach
                        @endif
                    @endforeach

                    <div>
                        <button type="button" @click="isOpen = false"
                            class="shadow-lg text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Close
                        </button>
                        <div role="status" class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2"
                            wire:loading wire:target="getServiceJobTasks">
                            <svg aria-hidden="true"
                                class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
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
                                            <svg class="w-4 h-4" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
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

                                                                <img src="{{ Auth::user()->profile_photo_url ? asset(Auth::user()->profile_photo_url) : 'https://static.vecteezy.com/system/resources/previews/005/129/844/non_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg' }}"
                                                                    alt="Customer" class="object-cover p-4"
                                                                    width="250">

                                                                <div class="p-6 w-2/3 grid grid-cols-2 gap-4">
                                                                    <div>
                                                                        <h4
                                                                            class="text-2xl flex font-bold col-span-2 mb-4 w-full">
                                                                            Car
                                                                            Details</h4>

                                                                        <p class="text-gray-800 text-lg font-semibold">
                                                                            Model: <span
                                                                                class="font-normal">{{ $car->model }}</span>
                                                                        </p>
                                                                        <p
                                                                            class="mt-2 text-gray-700 text-lg font-semibold">
                                                                            Owner: <span
                                                                                class="font-normal">{{ $car->customer->name }}</span>
                                                                        </p>
                                                                        <p
                                                                            class="mt-2 text-gray-700 text-lg font-semibold">
                                                                            Reg_number: <span
                                                                                class="font-normal">{{ $car->registration_number }}</span>
                                                                        </p>
                                                                        <p
                                                                            class="mt-2 text-gray-700 text-lg font-semibold">
                                                                            Fuel Type: <span
                                                                                class="font-normal">{{ $car->fuel_type }}</span>
                                                                        </p>
                                                                        <p
                                                                            class="mt-2 text-gray-700 text-lg font-semibold">
                                                                            Transmission Type: <span
                                                                                class="font-normal">{{ $car->transmission_type }}</span>
                                                                        </p>
                                                                    </div>
                                                                    @foreach ($ServicesJobs as $ServicesJob)
                                                                        <div>
                                                                            <p
                                                                                class="mt-2 text-gray-700 text-lg font-semibold">
                                                                                Finish Time: <span class="font-normal">
                                                                                    @php
                                                                                        $created_at = \Carbon\Carbon::parse(
                                                                                            $ServicesJob->created_at,
                                                                                        );
                                                                                        $estimatedTime =
                                                                                            $ServicesJob->Estimated_finish_time;

                                                                                        $finishTime = $created_at->addHours(
                                                                                            $estimatedTime,
                                                                                        );
                                                                                    @endphp
                                                                                    {{ $finishTime->format('g:i A') }}
                                                                                </span>
                                                                            </p>
                                                                            <p
                                                                                class="mt-2 text-gray-700 text-lg font-semibold">
                                                                                Finish Presentage: <span
                                                                                    class="font-normal">
                                                                                    {{ number_format($ServicesJob->Percentage, 2) }}%
                                                                                </span>
                                                                            </p>
                                                                            {{-- <p class="mt-2 text-gray-700 text-lg font-semibold">
                                                                            Color: <span
                                                                                class="font-normal">{{ $ServicesJob->color }}</span>
                                                                        </p> --}}
                                                                        </div>
                                                                        <div class="col-span-2 mt-6">
                                                                            <a type="button" x-data="{ loading: false }"
                                                                                wire:click="openViewServiceModal({{ $ServicesJob->id }})"
                                                                                class="flex justify-center cursor-pointer bg-blue-600 text-white text-lg px-6 py-2 rounded-md w-full hover:bg-blue-800 transition duration-300">
                                                                                View
                                                                            </a>
                                                                        </div>
                                                                    @endforeach

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
</div>

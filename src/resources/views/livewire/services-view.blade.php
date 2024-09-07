<div>
    {{-- Car Create Modal --}}
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
                                        <div>
                                            <ul class="menu menu-horizontal bg-white rounded-box">
                                                <li>
                                                    <a class="tooltip" data-tip="Pending"
                                                        wire:click="changeWashStatus('Pending',{{ $jobTask->services_id }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="tooltip" data-tip="InProgres"
                                                        wire:click="changeWashStatus('InProgres' ,{{ $jobTask->services_id }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="tooltip" data-tip="Completed"
                                                        wire:click="changeWashStatus('Completed' ,{{ $jobTask->services_id }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
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
                                        <div>
                                            <ul class="menu menu-horizontal bg-white rounded-box">
                                                <li>
                                                    <a class="tooltip" data-tip="Pending"
                                                        wire:click="changeInteriorStatus('Pending' ,{{ $jobTask->services_id }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="tooltip" data-tip="InProgres"
                                                        wire:click="changeInteriorStatus('InProgres',{{ $jobTask->services_id }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="tooltip" data-tip="Completed"
                                                        wire:click="changeInteriorStatus('Completed',{{ $jobTask->services_id }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
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
                                    <div>
                                        <ul class="menu menu-horizontal bg-white rounded-box">
                                            <li>
                                                <a class="tooltip" data-tip="Pending"
                                                    wire:click="changeServiceStatus('Pending', {{ $jobTask->id }}, {{ $taskIndex }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="tooltip" data-tip="InProgres"
                                                    wire:click="changeServiceStatus('InProgres', {{ $jobTask->id }}, {{ $taskIndex }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="tooltip" data-tip="Completed"
                                                    wire:click="changeServiceStatus('Completed', {{ $jobTask->id }}, {{ $taskIndex }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                        @endif
                    @endforeach

                    <div>
                        <button type="button" wire:click="create" x-on:click="isOpen = true"
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
                <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="p-4">
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white">
                                    <thead class="bg-gray-800 text-white">
                                        <tr>
                                            <th class="w-3/12 py-2 px-3 text-left">Owner name</th>
                                            <th class="w-2/12 py-2 px-3 text-left">Reg Number</th>
                                            <th class="w-2/12 py-2 px-3 text-left">Car Modal</th>
                                            <th class="w-2/12 py-2 px-3 text-left">Finish precentage</th>
                                            <th class="w-2/12 py-2 px-3 text-left">Washing Status</th>
                                            <th class="w-2/12 py-2 px-3 text-left">Interior Status</th>
                                            <th class="w-2/12 py-2 px-3 text-left">Service Status</th>
                                            <th class="w-2/12 py-2 px-3 text-left">Finish times</th>
                                            <th class="w-2/12 py-2 px-3 text-left"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($ServicesJobs->isEmpty())
                                            <tr class="text-center  w-full">
                                                <td colspan="6" class="py-12">
                                                    No Services.
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($ServicesJobs as $ServicesJob)
                                                <tr class="border-b text-sm text-center text-black">
                                                    <td class="py-5 px-3">{{ $ServicesJob->Customer_name }}</td>
                                                    <td class="py-5 px-3">{{ $ServicesJob->registration_number }}</td>
                                                    <td class="py-5 px-3">{{ $ServicesJob->Car_modal }}</td>
                                                    <td class="py-5 px-3 flex justify-center">
                                                        <span class="font-bold rounded px-2 py-1">
                                                            {{ number_format($ServicesJob->Percentage, 2) }}%
                                                        </span>
                                                    </td>

                                                    <td class="py-5 px-3 text-center">
                                                        <span
                                                            class="font-bold rounded px-2 py-1 shadow-lg
                                                {{ $ServicesJob->Washing_section == 'Running' ? 'bg-red-500 text-white' : '' }}
                                                {{ $ServicesJob->Washing_section == 'InProgres' ? 'bg-yellow-500 text-white' : '' }}
                                                {{ $ServicesJob->Washing_section == 'Pending' ? 'bg-blue-500 text-white' : '' }}
                                                {{ $ServicesJob->Washing_section == 'Completed' ? 'bg-green-500 text-white' : '' }}">
                                                            {{ $ServicesJob->Washing_section }}
                                                        </span>
                                                    </td>

                                                    <td class="py-5 px-3 text-center">
                                                        <span
                                                            class="font-bold rounded px-2 py-1 shadow-lg
                                                {{ $ServicesJob->Interior_cleaning_section == 'Running' ? 'bg-red-500 text-white' : '' }}
                                                {{ $ServicesJob->Interior_cleaning_section == 'InProgres' ? 'bg-yellow-500 text-white' : '' }}
                                                {{ $ServicesJob->Interior_cleaning_section == 'Pending' ? 'bg-blue-500 text-white' : '' }}
                                                {{ $ServicesJob->Interior_cleaning_section == 'Completed' ? 'bg-green-500 text-white' : '' }}">
                                                            {{ $ServicesJob->Interior_cleaning_section }}
                                                        </span>
                                                    </td>
                                                    <td class="py-5 px-3 text-center">
                                                        <span
                                                            class="font-bold rounded px-2 py-1 shadow-lg
                                                {{ $ServicesJob->Service_section == 'Running' ? 'bg-red-500 text-white' : '' }}
                                                {{ $ServicesJob->Service_section == 'InProgres' ? 'bg-yellow-500 text-white' : '' }}
                                                {{ $ServicesJob->Service_section == 'Pending' ? 'bg-blue-500 text-white' : '' }}
                                                {{ $ServicesJob->Service_section == 'Completed' ? 'bg-green-500 text-white' : '' }}">
                                                            {{ $ServicesJob->Service_section }}
                                                        </span>
                                                    </td>
                                                    <td class="py-5 px-3 flex justify-center">
                                                        <span class="font-bold rounded px-2  py-1">
                                                            @php
                                                                $created_at = \Carbon\Carbon::parse(
                                                                    $ServicesJob->created_at,
                                                                );
                                                                $estimatedTime = $ServicesJob->Estimated_finish_time;

                                                                $finishTime = $created_at->addHours($estimatedTime);
                                                            @endphp
                                                            {{ $finishTime->format('g:i A') }}
                                                        </span>

                                                    </td>

                                                    <td class="py-5 px-3 text-center">
                                                        @if (
                                                            $ServicesJob->Washing_section == 'Pending' &&
                                                                $ServicesJob->Interior_cleaning_section == 'Pending' &&
                                                                $ServicesJob->Service_section == 'Pending')
                                                            <button type="button"
                                                                wire:click="serviceConformation({{ $ServicesJob->id }})"
                                                                class="shadow-lg text-gray-900 bg-gray-200 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                                Confirm
                                                            </button>
                                                        @else
                                                            <button type="button"
                                                                wire:click="openViewServiceModal({{ $ServicesJob->id }})"
                                                                class="shadow-lg text-gray-900 bg-gray-200 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                                View
                                                            </button>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

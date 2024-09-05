<?php

namespace App\Livewire;

use App\Models\ServiceJob;
use App\Models\ServiceJobTasks;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class ServicesView extends Component
{

    public $statusType;
    public $jobTasks = [];
    public $viewDetais = false;



    public function openViewServiceModal($id)
    {
        $this->jobTasks = ServiceJobTasks::where('services_id', $id)->get();
        $this->viewDetais = true;
    }

    public function viewServiceClose()
    {
        $this->viewDetais = false;
    }

    public function changeWashStatus($newStatus, $serviceJobId)
    {
        $serviceJobs = ServiceJobTasks::where('services_id', $serviceJobId)
            ->where('services', 'Washing section')
            ->get();

        if ($serviceJobs->isEmpty()) {
            return;
        }

        foreach ($serviceJobs as $serviceJob) {
            $serviceJob->service_task_status = $newStatus;
            $serviceJob->save();
        }

        $service = ServiceJob::find($serviceJobId);

        if ($service) {
            $service->Washing_section = ($newStatus == 'Completed') ? 'Completed' : 'Running';
            $service->save();
        }

        $this->jobTasks = ServiceJobTasks::where('services_id', $serviceJobId)->get();

        Toaster::success('Status updated successfully.');
    }

    public function changeInteriorStatus($newStatus, $serviceJobId)
    {
        $serviceJobs = ServiceJobTasks::where('services_id', $serviceJobId)
            ->where('services', 'Interior cleaning section')
            ->get();

        if ($serviceJobs->isEmpty()) {
            return;
        }

        foreach ($serviceJobs as $serviceJob) {
            $serviceJob->service_task_status = $newStatus;
            $serviceJob->save();
        }
        $service = ServiceJob::find($serviceJobId);

        if ($service) {
            $service->Interior_cleaning_section = ($newStatus == 'Completed') ? 'Completed' : 'Running';
            $service->save();
        }

        $this->jobTasks = ServiceJobTasks::where('services_id', $serviceJobId)->get();

        Toaster::success('Status updated successfully.');
    }

    public function changeServiceStatus($newStatus, $serviceJobId, $taskIndex)
    {
        $serviceJob = ServiceJobTasks::where('id', $serviceJobId)->first();

        if ($serviceJob && $serviceJob->services == 'Service section') {
            $tasks = explode("\n", $serviceJob->service_tasks);
            if (isset($tasks[$taskIndex])) {
                $tasks[$taskIndex] = $newStatus;
                $serviceJob->service_task_status = implode("\n", $tasks);
                $serviceJob->save();
            }

            $allTasksCompleted = ServiceJobTasks::where('services_id', $serviceJob->services_id)
                ->where('services', 'Service section')
                ->get()
                ->every(function ($task) {
                    return $task->service_task_status === 'Completed';
                });

            $service = ServiceJob::find($serviceJob->services_id);
            if ($service) {
                $service->Service_section = $allTasksCompleted ? 'Completed' : 'Running';
                $service->save();
            }

            $this->jobTasks = ServiceJobTasks::where('services_id', $serviceJob->services_id)->get();

            Toaster::success('Status updated successfully.');
        }
    }

    public function render()
    {

        $allJobs = ServiceJob::all();
        return view('livewire.services-view', [
            'ServicesJobs' => $allJobs,

        ]);
    }
}

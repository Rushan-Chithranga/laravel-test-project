<?php

namespace App\Livewire\Dashboard;

use App\Models\ServiceJob;
use App\Models\ServiceJobTasks;
use Livewire\Component;

class AdminChart extends Component
{

    public $data;
    public $completedCount;
    public $pendingCount;
    public $inProgressCount;

    public function mount()
    {
        $this->getData();
    }

    public function getData(){

        $this->completedCount = ServiceJobTasks::where('service_task_status', 'Completed')->count();
        $this->pendingCount = ServiceJobTasks::where('service_task_status', 'Pending')->count();
        $this->inProgressCount = ServiceJobTasks::where('service_task_status', 'InProgres')->count();
        $this->data = [
            'labels' => ['Completed', 'Pending','In Progress'],
            'values' => [$this->completedCount, $this->pendingCount, $this->inProgressCount]
        ];

    }
    public function render()
    {
        return view('livewire.dashboard.admin-chart');
    }
}

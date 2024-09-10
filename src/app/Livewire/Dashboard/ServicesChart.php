<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class ServicesChart extends Component
{

    public $data;

    public function mount()
    {
        
        $this->data = [
            'labels' => ['Red', 'Blue', 'Yellow', 'Green', 'Purple'],
            'values' => [12, 19, 3, 5, 2]
        ];
    }
    public function render()
    {
        return view('livewire.dashboard.services-chart');
    }
}

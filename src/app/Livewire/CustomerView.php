<?php

namespace App\Livewire;

use App\Handlers\CustomerViewHandler;
use App\Models\ServiceJob;
use App\Models\ServiceJobTasks;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class CustomerView extends Component
{
    public $search;
    public $noDataFound = false;
    public $ServicesJobs = [];
    public $jobTasks = [];
    public $viewDetais = false;
    protected $customerViewHandler;


    public function __construct()
    {
        $this->customerViewHandler = new CustomerViewHandler();
    }

    public function openViewServiceModal($id)
    {
        $this->jobTasks = ServiceJobTasks::where('services_id', $id)->get();
        $this->viewDetais = true;
    }

    public function viewServiceClose()
    {
        $this->viewDetais = false;
    }

    public function render()
    {
        $customerDetails = [];

        if ($this->search) {
            $customerDetails = $this->customerViewHandler->CustomerSearch($this->search);

            foreach ($customerDetails as $customer) {
                foreach ($customer->cars as $car) {
                    $this->ServicesJobs = ServiceJob::where('registration_number', $car->registration_number)->get();
                }
            }
            if (empty($customerDetails)) {
                $this->noDataFound = true;
            } else {
                $this->noDataFound = false;
            }
        }

        return view('livewire.customer-view', [
            'customerDetails' => $customerDetails
        ]);
    }

    public function searchCustomer()
    {
        try {
            $customerDetails = $this->customerViewHandler->CustomerSearch($this->search);

            if (empty($customerDetails)) {
                $this->noDataFound = true;
            } else {
                $this->noDataFound = false;
            }
        } catch (\Exception $e) {
            Toaster::error('Something went wrong while searching for the car!');
        }
    }
}

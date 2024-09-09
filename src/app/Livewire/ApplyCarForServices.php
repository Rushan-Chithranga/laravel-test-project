<?php

namespace App\Livewire;

use App\Handlers\ApplyCarForServicesHandler;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Service;
use App\Models\ServiceTask;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class ApplyCarForServices extends Component
{
    public $search;
    public $Washing_section;
    public $Interior_cleaning_section;
    public $registration_number, $carModel, $NIC ,$customer_name;
    public $Service_section = [];
    public $noDataFound = false;
    public $addService = false;

    protected $applyCarForServicesHandler;

    public function __construct()
    {
        $this->applyCarForServicesHandler = new ApplyCarForServicesHandler();
    }

    public function render()
    {
        $allServices = Service::all();
        $allServicesTasks = ServiceTask::all();
        $applyCarServices = [];

        if ($this->search) {
            $applyCarServices = $this->applyCarForServicesHandler->applyServicesSearch($this->search);

            if ($applyCarServices->isEmpty()) {
                $this->noDataFound = true;
            } else {
                $this->noDataFound = false;
            }
        }

        return view('livewire.apply-car-for-services', [
            'applyCarServices' => $applyCarServices,
            'services' => $allServices,
            'servicesTasks' => $allServicesTasks,
        ]);
    }

    public function searchCustomer()
    {
        try {
            $applyCarServices = $this->applyCarForServicesHandler->applyServicesSearch($this->search);

            if ($applyCarServices->isEmpty()) {
                $this->noDataFound = true;
            } else {
                $this->noDataFound = false;
            }
        } catch (\Exception $e) {
            Toaster::error( 'Something went wrong while searching for the car!');
        }
    }

    public function resetFields()
    {
        $this->Washing_section = '';
        $this->Interior_cleaning_section = '';
        $this->Service_section = '';


    }

    public function openAddServiceModal($user_id, $car_id)
    {
        $car = Car::findOrFail($car_id);
        $customer = Customer::findOrFail($user_id);
        $this->NIC = $customer->NIC;
        $this->customer_name = $customer->name;
        $this->registration_number = $car->registration_number;
        $this->carModel = $car->model;
        $this->addService = true;
    }
    public function closeAddServiceModal()
    {
        $this->addService = false;
    }

    public function create()
    {
        try {
            $this->applyCarForServicesHandler->createService($this->customer_name, $this->NIC, $this->registration_number, $this->carModel,$this->Washing_section, $this->Interior_cleaning_section, $this->Service_section);
            $this->resetFields();
            $this->closeAddServiceModal();
        } catch (\Exception $e) {
            $this->resetFields();
            $this->closeAddServiceModal();
            Toaster::error( 'Something goes wrong while creating car!!');
        }
    }
}

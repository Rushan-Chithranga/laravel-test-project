<?php

namespace App\Livewire;

use App\Handlers\CarHandler;
use App\Models\Car;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class AddCar extends Component
{
    use WithPagination;

    protected $carHandler;

    public $search;
    public $customerSearch;
    public $registration_number, $carModel, $fuel_type, $transmission, $customer_name;
    public $updareRegistration_number, $updateCarModel, $updateFuel_type, $updateTransmission, $updateCustomer_name, $updateCar_id;
    public $updateCars;
    public $deleteCars, $deleteCarName;
    public $addCar = false;
    public $updateCar = false;
    public $deleteCar = false;

    protected $rules = [
        'registration_number' => 'required',
        'carModel' => 'required',
    ];

    public function resetFields()
    {
        $this->registration_number = '';
        $this->carModel = '';
        $this->fuel_type = '';
        $this->transmission = '';
        $this->customer_name = '';
    }

    public function __construct()
    {

        $this->carHandler = new CarHandler();
    }

    public function render()
    {
        $customers = Customer::all();
        if ($this->search && !$this->carHandler->carSearch($this->search, $this->customerSearch)) {
            $cars = [];
        } else {
            $cars = $this->carHandler->carSearch($this->search, $this->customerSearch);
        }

        return view('livewire.add-car', ['cars' => $cars, 'customers' => $customers]);
    }
    public function searchCustomer()
    {

        try {
            $this->carHandler->carSearch($this->search, $this->customerSearch);
        } catch (\Exception $e) {
            Session::flash('error', 'Something goes wrong while search car!!');
        }
    }

    public function openAddCarModal()
    {
        $this->addCar = true;
    }

    public function addCarModalClose()
    {
        $this->addCar = false;
    }

    public function openUpdateModal($id)
    {
        $updateCars = Car::findOrFail($id);
        $this->updareRegistration_number = $updateCars->registration_number;
        $this->updateCarModel = $updateCars->model;
        $this->updateFuel_type = $updateCars->fuel_type;
        $this->updateTransmission = $updateCars->transmission;
        $this->updateCustomer_name = $updateCars->customer->name;
        $this->updateCar_id = $updateCars->id;
        $this->updateCar = true;
    }
    public function updateyModalClose()
    {
        $this->updateCar = false;
    }

    public function openDeleteModal($id)
    {
        $this->deleteCars = Car::findOrFail($id);
        $this->deleteCarName = $this->deleteCars->model;
        $this->deleteCar = true;
    }

    public function deleteModalClose()
    {
        $this->deleteCar = false;
    }


    public function create()
    {
        $this->validate();

        try {
            $this->carHandler->createCar($this->registration_number, $this->carModel, $this->fuel_type, $this->transmission, $this->customer_name);
            $this->resetFields();
            $this->addCarModalClose();
        } catch (\Exception $e) {
            dd($e);
            Toaster::error('Something goes wrong while creating car!!');
            $this->resetFields();
            $this->addCarModalClose();
        }
    }

    public function carUpdate()
    {
        $this->validate([
            'updareRegistration_number' => 'required',
            'updateCarModel' => 'required',
        ]);

        try {
            $this->carHandler->updateCar($this->updateCar_id, $this->updareRegistration_number, $this->updateCarModel, $this->updateFuel_type, $this->updateTransmission,  $this->updateCustomer_name);
            $this->updateyModalClose();
        } catch (\Exception $e) {
            Toaster::error('Something goes wrong while updating car!!');
            $this->updateyModalClose();
        }
    }

    public function carDelete()
    {
        try {

            $this->carHandler->deleteCar($this->deleteCars->id);
            $this->deleteModalClose();
        } catch (\Exception $e) {
            Toaster::error('Something goes wrong while deleting customer!!');
            $this->deleteModalClose();
        }
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}

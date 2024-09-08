<?php

namespace App\Livewire;

use App\Handlers\CustomerVIewHandler;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class CustomerView extends Component
{
    public $search;
    public $noDataFound = false;
    protected $customerViewHandler;


    public function __construct()
    {
        $this->customerViewHandler = new CustomerVIewHandler();
    }

    public function render()
    {

        $customerDetails = [];

        if ($this->search) {
            $customerDetails = $this->customerViewHandler->CustomerSearch($this->search);

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

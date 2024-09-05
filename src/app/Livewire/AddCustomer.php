<?php

namespace App\Livewire;

use App\Handlers\CustomerHandler;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class AddCustomer extends Component
{
    use WithPagination;

    protected $customerHandler;

    public $search;
    public $name, $NIC, $email, $phone, $address, $password;
    public $updateName, $updateNIC, $updateEmail, $updatePhone, $updateAddress, $updateCustomer_id, $updatePassword;
    public $deleteCustomers ,$deleteCustomerName;
    public $createCustomer = false;
    public $updateCustomer = false;
    public $deleteCustomer = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'NIC' => 'required|numeric|unique:customers,NIC',
        'email' => 'required|string|email|max:255|unique:customers,email',
        'phone' => 'required|string',
        'address' => 'required|string|max:500',
        'password' => 'required|string|min:8',
    ];


    public function __construct()
    {

        $this->customerHandler = new CustomerHandler();
    }

    public function render()
    {
        if ($this->search && !$this->customerHandler->customerSearch($this->search)) {
            $customers = [];
        } else {
            $customers = $this->customerHandler->customerSearch($this->search);
        }
        return view('livewire.add-customer', ['customers' => $customers]);
    }

    public function searchCustomer()
    {

        try {
            $this->customerHandler->customerSearch($this->search);
        } catch (\Exception $e) {
            Session::flash('error', 'Something goes wrong while search category!!');
        }
    }

    public function openCreateModal()
    {
        $this->createCustomer = true;
    }

    public function customerModalClose()
    {
        $this->createCustomer = false;
    }

    public function openUpdateModal($id)
    {
        $updateCustomer = Customer::findOrFail($id);
        $this->updateName = $updateCustomer->name;
        $this->updateNIC = $updateCustomer->NIC;
        $this->updateEmail = $updateCustomer->email;
        $this->updatePhone = $updateCustomer->phone;
        $this->updateAddress = $updateCustomer->address;
        $this->updateCustomer_id = $updateCustomer->id;
        $this->updateCustomer = true;
    }
    public function updateyModalClose()
    {
        $this->updateCustomer = false;
    }

    public function openDeleteModal($id)
    {
        $this->deleteCustomers = Customer::findOrFail($id);
        $this->deleteCustomerName = $this->deleteCustomers->name;
        $this->deleteCustomer = true;
    }

    public function deleteModalClose()
    {
        $this->deleteCustomer = false;
    }

    public function resetFields()
    {
        $this->name = '';
        $this->NIC = '';
        $this->email = '';
        $this->phone = '';
        $this->address = '';
        $this->password = '';
    }

    public function create()
    {
        $this->validate();

        try {
            $this->customerHandler->createCustomer($this->name, $this->NIC, $this->email, $this->phone, $this->address, $this->password);
            $this->resetFields();
            $this->customerModalClose();
        } catch (\Exception $e) {
            Toaster::error( 'Something goes wrong while creating customer!!');
            $this->resetFields();
            $this->customerModalClose();
        }
    }

    public function customerUpdate()
    {
        $this->validate([
            'updateName' => 'required|string|max:255',
            'updateNIC' => 'required|numeric|exists:customers,NIC',
            'updateEmail' => 'required|string|email|max:255|exists:customers,email',
            'updatePhone' => 'required|string',
            'updateAddress' => 'required|string|max:500',
        ]);

        try {
            $this->customerHandler->updateCustomer($this->updateCustomer_id, $this->updateName, $this->updateNIC, $this->updateEmail, $this->updatePhone,  $this->updateAddress);
            $this->updateyModalClose();
        } catch (\Exception $e) {
            Toaster::error( 'Something goes wrong while updating customer!!');
            $this->updateyModalClose();
        }
    }

    public function customerDelete()
    {
        try {

            $this->customerHandler->deleteCustomer($this->deleteCustomers->id);
            $this->deleteModalClose();

        } catch (\Exception $e) {
            Toaster::error( 'Something goes wrong while deleting customer!!');
            $this->deleteModalClose();
        }
    }
    public function updatingSearch(){
        $this->resetPage();
    }
}

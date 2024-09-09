<?php

namespace App\Handlers;

use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Masmerise\Toaster\Toastable;
use Masmerise\Toaster\Toaster;

class CustomerHandler

{
    use Toastable;
    public static function customerSearch($search)
    {
        return Customer::query()
            ->when($search, function ($query, $search) {
                $query->where('email', 'like', '%' . $search . '%');
            })
            ->paginate(8);
    }
    public static function createCustomer($name, $NIC, $email, $phone, $address, $password)
    {

        $data = [
            'name' => $name,
            'NIC' => $NIC,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'password' => Hash::make($password),
        ];

        Customer::create($data);
        Toaster::success('Customer Created Successfully!!');
    }


    public static function updateCustomer($id, $name, $NIC, $email, $phone, $address)
    {

        $customer = Customer::findOrFail($id);

        $customer->fill([
            'name' => $name,
            'NIC' => $NIC,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
        ])->save();

        Toaster::success('Customer Updated Successfully!!');
    }

    public static function deleteCustomer($id)
    {

        $cutomer = Customer::findOrFail($id);
        $cutomer->delete();
        Toaster::success('Customer Deleted Successfully!!');
        return redirect(request()->header('Referer'));
    }
}

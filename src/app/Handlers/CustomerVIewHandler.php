<?php

namespace App\Handlers;

use App\Models\Car;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Masmerise\Toaster\Toaster;

class CustomerVIewHandler
{
    public static function CustomerSearch($search)
    {
        if (Auth::user()->email == $search || Auth::user()->name == $search) {
            return Customer::query()
                ->with('cars')
                ->when($search, function ($query, $search) {
                    $query->where(function ($query) use ($search) {
                        $query->where('email', 'like', '%' . $search . '%')
                            ->orWhere('name', 'like', '%' . $search . '%');
                    })->orWhereHas('cars', function ($q) use ($search) {
                        $q->where('registration_number', 'like', '%' . $search . '%')
                            ->orWhere('model', 'like', '%' . $search . '%')
                            ->orWhere('fuel_type', 'like', '%' . $search . '%')
                            ->orWhere('transmission_type', 'like', '%' . $search . '%');
                    });
                })
                ->paginate(2);
        } else {
            return [];
        }
    }
    // public static function createCar($register_number, $caModel, $fuel_type, $transmission, $customer_name)
    // {
    //     $data = [
    //         'registration_number' => $register_number,
    //         'model' => $caModel,
    //         'fuel_type' => $fuel_type,
    //         'transmission_type' => $transmission,
    //         'customer_id' => $customer_name,
    //     ];

    //     Car::create($data);
    //     Toaster::success('Car Created Successfully!!');
    // }


    // public static function updateCar($id, $register_number, $caModel, $fuel_type, $transmission, $customer_name)
    // {

    //     $customer = Car::findOrFail($id);

    //     $customer->fill([
    //         'registration_number' => $register_number,
    //         'model' => $caModel,
    //         'fuel_type' => $fuel_type,
    //         'transmission_type' => $transmission,
    //         'customer_id' => $customer_name,
    //     ])->save();

    //     Toaster::success('Car Updated Successfully!!');
    // }

    // public static function deleteCar($id)
    // {
    //     $car = Car::findOrFail($id);
    //     $car->delete();
    //     Toaster::success('Customer Deleted Successfully!!');
    //     return redirect(request()->header('Referer'));
    // }
}

<?php

namespace App\Handlers;

use App\Models\Car;
use Illuminate\Support\Facades\Session;
use Masmerise\Toaster\Toaster;

class CarHandler
{
    public static function carSearch($search, $customerSearch = null)
    {

        return Car::query()
            ->when($search, function ($query, $search) {
                $query->where('registration_number', 'like', '%' . $search . '%');
            })
            ->when($customerSearch, function ($query, $customerSearch) {
                $query->where('customer_id', $customerSearch);
            })
            ->paginate(8);
    }
    public static function createCar($register_number, $caModel, $fuel_type, $transmission, $customer_name)
    {
        $data = [
            'registration_number' => $register_number,
            'model' => $caModel,
            'fuel_type' => $fuel_type,
            'transmission_type' => $transmission,
            'customer_id' => $customer_name,
        ];

        Car::create($data);
        Toaster::success('Car Created Successfully!!');
    }


    public static function updateCar($id, $register_number, $caModel, $fuel_type, $transmission, $customer_name)
    {

        $customer = Car::findOrFail($id);

        $customer->fill([
            'registration_number' => $register_number,
            'model' => $caModel,
            'fuel_type' => $fuel_type,
            'transmission_type' => $transmission,
            'customer_id' => $customer_name,
        ])->save();

        Toaster::success('Car Updated Successfully!!');
    }

    public static function deleteCar($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        Toaster::success('Customer Deleted Successfully!!');
        return redirect(request()->header('Referer'));
    }
}

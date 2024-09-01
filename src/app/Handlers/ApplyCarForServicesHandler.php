<?php

namespace App\Handlers;

use App\Models\Car;
use App\Models\Customer;
use App\Models\serviceJob;
use Illuminate\Support\Facades\Session;

class ApplyCarForServicesHandler
{
    public static function applyServicesSearch($search)
    {

        return Customer::query()
            ->with('cars')
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('email', 'like', '%' . $search . '%')
                        ->orWhere('name', 'like', '%' . $search . '%')
                        ->orWhere('NIC', 'like', '%' . $search . '%');
                })
                    ->orWhereHas('cars', function ($q) use ($search) {
                        $q->where('registration_number', 'like', '%' . $search . '%')
                            ->orWhere('model', 'like', '%' . $search . '%')
                            ->orWhere('fuel_type', 'like', '%' . $search . '%')
                            ->orWhere('transmission_type', 'like', '%' . $search . '%');
                    });
            })
            ->paginate(8);
    }

    public static function createService($customer_name, $NIC, $register_number, $caModel, $Washing_section, $Interior_cleaning_section, $Service_section)
    {
        $Service_section_json = json_encode($Service_section);
        $data = [
            'NIC' => $NIC,
            'Customer_name' => $customer_name,
            'registration_number' => $register_number,
            'Car_modal' => $caModel,
            'Washing_section' => $Washing_section,
            'Washing_section_status' => 'Pending',
            'Interior_cleaning_section' => $Interior_cleaning_section,
            'Interior_cleaning_section_status' => 'Pending',
            'Service_section' => $Service_section_json,
            'service_status' => 'Pending',
        ];

        serviceJob::create($data);
        Session::flash('success', 'Car Created Successfully!!');
    }
}

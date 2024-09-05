<?php

namespace App\Handlers;

use App\Models\Customer;
use App\Models\ServiceJob;
use App\Models\ServiceJobTasks;
use Illuminate\Support\Facades\DB;
use Masmerise\Toaster\Toaster;

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
        DB::beginTransaction();

        try {
            if (!is_array($Service_section)) {
                $Service_section = [$Service_section];
            }

            $data = [
                'NIC' => $NIC,
                'Customer_name' => $customer_name,
                'registration_number' => $register_number,
                'Car_modal' => $caModel,
                'Washing_section' => 'Running',
                'Interior_cleaning_section' => 'Running',
                'Service_section' => 'Running',
            ];

            $services = ServiceJob::create($data);

            if ($services) {
                ServiceJobTasks::create([
                    'services' => 'Washing section',
                    'service_tasks' => $Washing_section,
                    'services_id' => $services->id,
                    'service_task_status' => 'Pending'
                ]);

                ServiceJobTasks::create([
                    'services' => 'Interior cleaning section',
                    'service_tasks' => $Interior_cleaning_section,
                    'services_id' => $services->id,
                    'service_task_status' => 'Pending'
                ]);

                foreach ($Service_section as $service_section) {
                    ServiceJobTasks::create([
                        'services' => 'Service section',
                        'service_tasks' => $service_section,
                        'services_id' => $services->id,
                        'service_task_status' => 'Pending'
                    ]);
                }
            }

            DB::commit();

            Toaster::success('Services Created Successfully!!');
        } catch (\Exception $e) {
            DB::rollBack();
            Toaster::error('Failed to create services. Please try again.');
            throw $e;
        }
    }
}

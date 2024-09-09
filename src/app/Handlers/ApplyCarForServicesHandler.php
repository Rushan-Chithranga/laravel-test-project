<?php

namespace App\Handlers;

use App\Models\Customer;
use App\Models\ServiceJob;
use App\Models\ServiceJobTasks;
use App\Models\ServiceTask;
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

            $allEstimated_finish_time = self::calculateEstimatedFinishTime($Washing_section, $Interior_cleaning_section, $Service_section);

            $data = [
                'NIC' => $NIC,
                'Customer_name' => $customer_name,
                'registration_number' => $register_number,
                'Car_modal' => $caModel,
                'Washing_section' => 'Pending',
                'Interior_cleaning_section' => 'Pending',
                'Service_section' => 'Pending',
                'Estimated_finish_time' => $allEstimated_finish_time,
                'Percentage' => 0,
            ];

            $services = ServiceJob::create($data);

            if ($services) {
                self::createServiceJobTask($services->id, 'Washing section', $Washing_section);
                self::createServiceJobTask($services->id, 'Interior cleaning section', $Interior_cleaning_section);

                foreach ($Service_section as $service_section) {
                    self::createServiceJobTask($services->id, 'Service section', $service_section);
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

    private static function calculateEstimatedFinishTime($Washing_section, $Interior_cleaning_section, $Service_section)
    {
        $WashEstimated_finish_time = 0;
        $InteriorEstimated_finish_time = 0;
        $ServiceEstimated_finish_time = 0;

        $allServicesTasks = ServiceTask::all()->keyBy('task_name');

        if (isset($allServicesTasks[$Washing_section])) {
            $WashEstimated_finish_time = $allServicesTasks[$Washing_section]->estimate_time;
        }

        if (isset($allServicesTasks[$Interior_cleaning_section])) {
            $InteriorEstimated_finish_time = $allServicesTasks[$Interior_cleaning_section]->estimate_time;
        }

        foreach ($Service_section as $service_section) {
            if (isset($allServicesTasks[$service_section])) {
                $ServiceEstimated_finish_time += $allServicesTasks[$service_section]->estimate_time;
            }
        }

        return $ServiceEstimated_finish_time + $WashEstimated_finish_time + $InteriorEstimated_finish_time;
    }

    private static function createServiceJobTask($serviceJobId, $serviceType, $taskName)
    {
        ServiceJobTasks::create([
            'services' => $serviceType,
            'service_tasks' => $taskName,
            'services_id' => $serviceJobId,
            'service_task_status' => 'Pending',
        ]);
    }
}

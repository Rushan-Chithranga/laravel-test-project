<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serviceJob extends Model
{
    use HasFactory;
    protected $fillable = [
        'NIC',
        'Customer_name',
        'registration_number',
        'Car_modal',
        'Washing_section',
        'Washing_section_status',
        'Washing_section',
        'Interior_cleaning_section',
        'Interior_cleaning_section_status',
        'Service_section',
        'service_status',
    ];

    protected $casts = [
        'service_tasks' => 'array',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'NIC', 'NIC');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'registration_number', 'registration_number');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function serviceTask()
    {
        return $this->belongsTo(serviceTask::class);
    }
}

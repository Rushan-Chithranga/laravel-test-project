<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceJob extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'NIC',
        'Customer_name',
        'registration_number',
        'Car_modal',
        'Washing_section',
        'Interior_cleaning_section',
        'Service_section',
        'Estimated_finish_time',
        'Percentage',
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

    public function serviceJobsTasks()
    {
        return $this->belongsToMany(ServiceJobTasks::class);
    }
}

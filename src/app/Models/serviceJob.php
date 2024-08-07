<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serviceJob extends Model
{
    use HasFactory;
    protected $fillable = ['NIC', 'email', 'registration_number', 'service_tasks', 'service_status'];

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
}

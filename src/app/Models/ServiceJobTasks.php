<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceJobTasks extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'services',
        'service_tasks',
        'services_id',
        'service_task_status',
    ];

    public function serviceJobs() {
        return $this->belongsToMany(ServiceJob::class);
    }
}

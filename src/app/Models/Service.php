<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['service_name'];

    public function serviceTasks()
    {
        return $this->hasMany(ServiceTask::class);
    }

    public function serviceJobs()
    {
        return $this->hasMany(serviceJob::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTask extends Model
{
    use HasFactory;
    protected $fillable = ['task_name','price','service_id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function serviceJobs()
    {
        return $this->hasMany(serviceJob::class);
    }
    
}

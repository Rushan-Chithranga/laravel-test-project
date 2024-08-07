<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['NIC','name', 'email', 'phone', 'address','password'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}

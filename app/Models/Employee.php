<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function resource()
    {
        return $this->morphMany('App\Models\Resource', 'resourceable');
    }

    public function data()
    {
        return $this->hasOne('App\Models\EmployeeData', 'NOMINA', 'nomina');
    }
}

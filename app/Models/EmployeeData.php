<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeData extends Model
{
    use HasFactory;

    public $connection = 'proaex';
    public $table = 'dbo.ASCOL';
    public $primaryKey = 'NOMINA';

    public function getFullNameAttribute()
	{
	    return $this->NOMBRE.' '.$this->APELLIDOPATERNO.' '.$this->APELLIDOMATERNO;
	}

    public function scopeActive($query)
	{
	    return $query->where('STATUS', 3);
	}

    public function resource()
    {
        return $this->morphMany('App\Models\Resource', 'resourceable');
    }
}

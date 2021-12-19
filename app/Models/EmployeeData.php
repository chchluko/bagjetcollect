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

    public function scopeActive($query,$status)
    {
     if ($status) {
            return $query->where('STATUS',$status);
        }
    }

    public function resource()
    {
        return $this->morphMany('App\Models\Resource', 'resourceable');
    }
}

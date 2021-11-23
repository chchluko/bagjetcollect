<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $guarded = ['id'];

    public function resourceable(){
        return $this->morphTo();
    }

    public function tipo(){
        return $this->belongsTo('App\Models\DocumentType','type_id', 'id');
    }
}

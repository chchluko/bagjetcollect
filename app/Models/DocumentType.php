<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;

   /* public function resource()
    {
        return $this->morphMany('App\Models\Resource', 'resourceable');
    }*/

    public function scopeCategory($query, $category_id)
    {
        if ($category_id) {
            return $query->where('category_id', $category_id);
        }
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function permiso()
    {
        return $this->hasOne('App\Models\Permission','id','permission_id');
    }

    public function recursos()
    {
        return $this->hasMany('App\Models\Resource', 'type_id', 'id');
    }
}

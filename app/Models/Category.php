<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }

    public function resources()
    {
        return $this->hasManyThrough('App\Models\Resource', 'App\Models\DocumentType','category_id', 'type_id', 'id', 'id');
    }

    public function tipos()
    {
        return $this->hasMany('App\Models\DocumentType');
    }
}

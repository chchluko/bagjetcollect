<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'status'];
    protected $withCount = ['students', 'reviews'];


    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    public function getRatingAttribute()
    {
        if ($this->reviews_count) {
            return round($this->reviews->avg('rating'), 1);
        } else {
            return 5;
        }
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function observation()
    {
        return $this->hasOne('App\Models\Observation');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
    public function requirements()
    {
        return $this->hasMany('App\Models\Requirement');
    }
    public function goals()
    {
        return $this->hasMany('App\Models\Goal');
    }
    public function sections()
    {
        return $this->hasMany('App\Models\Section');
    }

    public function audiences()
    {
        return $this->hasMany('App\Models\Audience');
    }

    //relacion uno a muchos
    public function teacher()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    //relacion muchos a muchos
    public function students()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function price()
    {
        return $this->belongsTo('App\Models\Price');
    }

    //polimor 1-1
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function lessons()
    {
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }

    //query scopes

    public function scopeCategory($query, $category_id)
    {
        if ($category_id) {
            return $query->where('category_id', $category_id);
        }
    }

    public function scopeLevel($query, $level_id)
    {
        if ($level_id) {
            return $query->where('level_id', $level_id);
        }
    }
}

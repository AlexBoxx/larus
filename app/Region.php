<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['country_id', 'title'];

    public function country()
    {
      return $this->belongsTo('App\Country');
    }

    public function scopeCountrys($query, $id)
    {
      return $query->where('country_id', $id);
    }

    public function settlements()
    {
      return $this->hasMany('App\Settlement');
    }



}

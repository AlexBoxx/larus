<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['title'];

    public function regions()
    {
      return $this->hasMany('App\Region');
    }
}

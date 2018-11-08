<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    protected $fillable = ['parent_id','country_id','region_id', 'title'];

    public function region()
    {
      return $this->belongsTo('App\Region');
    }

    public function scopeRegions($query, $id)
    {
      return $query->where('region_id', $id);
    }

    public function children(){
  		return $this->hasMany(self::class, 'parent_id');
  	}
}

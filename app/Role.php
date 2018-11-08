<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

  protected $fillable = ['title', 'alias', 'parent_id', 'created_by', 'modified_by'];


  // Get children role
    public function children(){
      return $this->hasMany(self::class, 'parent_id');
    }
}

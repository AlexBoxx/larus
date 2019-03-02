<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Article extends Model
{

    protected $fillable = ['title', 'slug', 'description', 'text', 'img', 'img_schow', 'meta_title', 'meta_description', 'meta_key', 'publisched', 'created_by', 'modified_by'];

		public function setSlugAttribute($value){
			$this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    // Polymorphic relation with Categories

    public function categories(){
      return $this->morphToMany('App\Category', 'categoryable');
      
    }

    //
    public function scopeLastArticles($query, $count){
  		return $query->orderBy('created_at', 'desc')->take($count)->get();
  	}

    // scope фильтр по публикации

    public function scopePublisched($query, $publisched){
      return $query->where('publisched', $publisched);
    }



}

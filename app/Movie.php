<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function user()
	{
		return $this->belongsTo("App\User","user_id");
	}
	protected $fillable = ['title' , 'description' , 'user_id','poster','genre',"stars","video"];
	public function path()
    {
    	return "/movies/{$this->id}";
    }
    public function comments()
	{
		return $this->hasMany("App\Comment");
	}
}

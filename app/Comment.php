<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['description','user_id','movie_id'];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
	
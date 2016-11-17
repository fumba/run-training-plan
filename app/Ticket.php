<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	//alternative
    //protected $fillable = ['title', 'content', 'slug', 'status', 'user_id'];

	protected $guarded = ['id'];

	public function comments()
	{
		//return $this->hasMany('App\Comment', 'post_id');
		return $this->morphMany('App\Comment', 'post');
	}

}

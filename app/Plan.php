<?php

/**
 *Plan Model.
 *
 * PHP version 7
 *
 * @author     Fumba Chibaka <fumba.me@gmail.com>
 * */
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Week;

class Plan extends Model {
	protected $guarded = [
			'id'
	];

	// Get the weekly schedule for the plan
	public function weeks() {
		return $this->hasMany ( 'App\Week', 'plan_id' );
	}
}

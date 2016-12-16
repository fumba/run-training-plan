<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EnrollFormRequest;
use App\Http\Requests\LogMilesFormRequest;
use App\PlanDays;

class PlansController extends Controller {

	/**
	 * Opens the main page for plan types.
	 *
	 * @param string $type
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|unknown
	 */
	public function showPlans($type = '') {
		if ($type == '' && Auth::check ()) {
			$type = Auth::user ()->plan_type;
		}

		if ($type == '') {
			return redirect ( '/' );
		}

		$plan = Plan::whereType ( $type )->first ();
		if (! $plan) {
			return redirect ( '/' );
		}

		$weeks = $plan->weeks ()->get ();
		foreach ( $weeks as $week ) {
			$week->days = $week->days ()->orderBy ( 'order', 'ASC' )->get ();
		}

		return view ( 'plans.show', [
				'weeks' => $weeks,
				'name' => $plan->name
		] );
	}

	/**
	 *
	 * @param string $week
	 * @param string $day
	 * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
	 */
	public function showLogScreen($week = '', $day = '') {
		return view ( 'plans.log', [ ] );
	}

	/**
	 *
	 * @param EnrollFormRequest $request
	 */
	public function saveLoggedMiles(LogMilesFormRequest $request) {
		$user = Auth::user ();
		$plan_days = PlanDays::whereUserId ( $user->id )->first ();
		$plan_days->day_1 = $request->get ( 'miles' );
		$plan_days -> save();
		return redirect ( action ( 'PlansController@showPlans' ) )->with ( 'status', 'Your miles have been logged!' );
	}

	/**
	 * Opens a page that allows users to enroll in a plan.
	 *
	 * @param string $type
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|unknown
	 */
	public function enroll($type = '') {
		$plans = Plan::all ();
		return view ( 'plans.enroll', [
				'plans' => $plans,
				'type' => $type
		] );
	}

	/**
	 * Saves enrollment option.
	 *
	 * @param FormRequest $request
	 */
	public function saveEnrollment(EnrollFormRequest $request) {
		$user = Auth::user ();
		$user->plan_type = $request->get ( 'options' );
		$user->save ();
		return redirect ( action ( 'PlansController@showPlans' ) )->with ( 'status', 'The post has been updated!' );
	}
}

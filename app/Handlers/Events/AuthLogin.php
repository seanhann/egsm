<?php namespace App\Handlers\Events;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Http\Request;

class AuthLogin{
	private $request;
	
	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	/**
	 * Handle the event.
	 *
	 * @param  Events  $event
	 * @return void
	 */
	public function handle($user, $remember)
	{
		$model = \Models\egsm\FailedLogin::find($user->username);
		if($model){
			$model->num = 0;
			$model->save();
		}
	}

}

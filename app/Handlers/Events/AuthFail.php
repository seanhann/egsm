<?php namespace App\Handlers\Events;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Http\Request;

class AuthFail{
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
	public function handle(array $payload, $remember, $login)
	{
		if(isset($payload['username'])){
			$model = \Models\egsm\FailedLogin::find($payload['username']);
			if($model){
				$model->num = ($model->num + 1);
			}else{
				$model = new \Models\egsm\FailedLogin();
				$model->username = $payload['username'];
				$model->num = 1;
			}
			$model->ip = $this->request->getClientIp();

			$model->save();
			
		}
	}

}

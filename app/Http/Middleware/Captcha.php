<?php namespace App\Http\Middleware;

use Closure;
use Session;

class Captcha{

    public function handle($request, Closure $next)
    {
	$model = \Models\egsm\FailedLogin::find($request->input('username'));
	if($model && $model->reachMaxium() && (Session::get('captcha') != $request->input('captcha'))){
		return response()->json(['code'=>3, 'msg'=>'验证码错误']);	
	}
	return $next($request);
    }
}

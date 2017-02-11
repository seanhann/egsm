<?php namespace App\Http\Middleware;

use Closure;
use Session;

class AttemptLimit{

    public function handle($request, Closure $next)
    {
	$model = \Models\egsm\FailedLogin::find($request->input('username'));
	if($model && $model->reachMaxium()){
		return response()->json(['code'=>3, 'msg'=>'登录失败次数太多，账户被锁定，请联系客服']);	
	}
	return $next($request);
    }
}

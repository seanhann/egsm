<?php namespace App\Http\Middleware;

use Closure;
use \Lib\Token as Token;
use Illuminate\Contracts\Auth\Guard;

class EgsmAuth{
        /**
         * The Guard implementation.
         *
         * @var Guard
         */
        protected $auth;

        /**
         * Create a new filter instance.
         *
         * @param  Guard  $auth
         * @return void
         */
        public function __construct(Guard $auth)
        {
                $this->auth = $auth;
        }
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$input = $request->route('token') ? $request->route('token') : $request->input('token'); 
		$token = new Token($input, $this->auth);
		if ($token->check()){
			return $next($request);
		}else{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				return redirect()->guest('/login');
			}
		}

	}

}

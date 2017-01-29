<?php namespace App\Auth;

use Illuminate\Auth\EloquentUserProvider as UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class EgsmUserProvider extends UserProvider {
    protected $model;

    public function __construct(UserContract $model)
    {
        $this->model = $model;
    }

    public function validateCredentials(UserContract $user, array $credentials)
    {
	        $plain = $credentials['password'];

                return md5(md5($plain)) === $user->getAuthPassword();
    }

    public function createModel()
    {
            return $this->model;
    }

}

<?php namespace Models\egsm;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {
	use Authenticatable, CanResetPassword;

	//protected $connection = 'egsm_remote';
	protected $connection = 'egsm';


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pmw_member';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'regip', 'regtime', 'logintime', 'loginip'];

    	/**
    	 * The name of the "created at" column.
    	 *
    	 * @var string
    	 */
    	const CREATED_AT = 'regtime';

    	/**
    	 * The name of the "updated at" column.
    	 *
    	 * @var string
    	 */
    	const UPDATED_AT = 'logintime';

	protected function getDateFormat()
    	{
    	    return 'U';
    	}

}

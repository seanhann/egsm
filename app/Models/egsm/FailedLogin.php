<?php namespace Models\egsm;

use Illuminate\Database\Eloquent\Model;

class FailedLogin extends Model {

	protected $connection = 'egsm';


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pmw_failedlogin';


	protected $primaryKey = 'username';

    	/**
    	 * The name of the "created at" column.
    	 *
    	 * @var string
    	 */
    	const CREATED_AT = 'time';

    	/**
    	 * The name of the "updated at" column.
    	 *
    	 * @var string
    	 */
    	const UPDATED_AT = 'time';

	protected function getDateFormat()
    	{
    	    return 'U';
    	}

	public function reachMaxium(){
		return	$this->num >= 3; 
	}
}

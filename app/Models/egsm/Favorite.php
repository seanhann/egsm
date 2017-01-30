<?php namespace Models\egsm;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model {

	protected $connection = 'egsm';


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pmw_userfavorite';


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


	public function article(){
		return $this->hasOne('\Models\egsm\NewArticle','id','aid');
	}
}

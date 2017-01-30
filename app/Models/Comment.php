<?php namespace Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pmw_usercomment';

	protected $timestamp = false;
}

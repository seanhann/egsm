<?php namespace Models\egsm;

use Illuminate\Database\Eloquent\Model;

class HotSearch extends Model {
	protected $connection = 'egsm';
	protected $table = 'hot_search';
	public $timestamps = false;
}

<?php namespace Models\egsm;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model {
	protected $connection = 'egsm';
	protected $table = 'catalog';
	public $timestamps = false;

    	public function articles()
    	{
    	    return $this->hasMany('\Models\egsm\Article', 'catalogId', 'id');
    	}
}

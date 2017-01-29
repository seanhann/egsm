<?php namespace Models\egsm;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {
	protected $connection = 'egsm';
	protected $table = 'article';
	public $timestamps = false;
}

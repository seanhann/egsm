<?php namespace Models\egsm;

use Illuminate\Database\Eloquent\Model;

class Images extends Model {
	protected $connection = 'egsm';
	protected $table = 'Images';
	public $timestamps = false;
}

<?php namespace Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model {
	protected $table = 'pmw_infoclass';
	public $timestamps = false;

	public function getNameAttribute(){
		return $this->classname;
	}

        public function articles(){
		return $this->hasMany('\Models\Article', 'classid');
        }
}

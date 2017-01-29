<?php namespace Models\egsm;

use Illuminate\Database\Eloquent\Model;

class NewCatalog extends Model {
	protected $connection = 'egsm';
	protected $table = 'Catalog';
	public $timestamps = false;


	public function getArticlesAttribute(){
	    return \Models\egsm\NewArticle::where('catalogId', $this->id)->paginate(2);
	}

	public function getAllArticlesAttribute(){
	    return \Models\egsm\NewArticle::where('catalogId', $this->id)->get();
	}

	/*
    	public function articles()
    	{
    	    return $this->hasMany('\Models\egsm\NewArticle', 'catalogId', 'id');
    	}
	*/
}

<?php namespace Models\egsm;

use Illuminate\Database\Eloquent\Model;

class ArticleDetail extends Model {
	protected $connection = 'egsm';
	protected $table = 'article_detail';
	public $timestamps = false;

    	public function images()
    	{
    	    return $this->hasMany('\Models\egsm\Images', 'article_detail_id', 'id');
    	}

	public function favorite(){
		return $this->hasOne('\Models\egsm\Favorite', 'aid', 'article_id');
	}
}

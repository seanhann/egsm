<?php namespace Models\egsm;

use Illuminate\Database\Eloquent\Model;

class NewArticle extends Model {
	protected $connection = 'egsm';
	protected $table = 'Article';
	public $timestamps = false;
	
	public function detail(){
		return $this->hasOne('\Models\egsm\ArticleDetail', 'article_id', 'id');
	}
}

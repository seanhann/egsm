<?php namespace Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {
	protected $table = 'pmw_infoimg';
	public $timestamps = false;

	public function getImagesAttribute(){
		preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $this->content, $img);
		$img[1][] = "/$this->picurl";
		return $img[1];
	}
}

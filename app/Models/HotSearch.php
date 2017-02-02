<?php namespace Models;

use Illuminate\Database\Eloquent\Model;

class HotSearch extends Model {
	protected $table = 'pmw_hotsearch';

        public static function updateHotSearch($keyWords){                                                    
                $find = self::where('key_words','like', $keyWords)->first();               
        
                if($find){                                                                              
                        $find->count = $find->count+1;                                                  
                }else{
                        $find = new self();                                                
                        $find->key_words = $keyWords;                                                   
                        $find->count = 1;                                                               
                }
                return $find->save();   
        }  
}

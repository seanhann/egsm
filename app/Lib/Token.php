<?php namespace Lib;

use \Models\User as User;
use Illuminate\Contracts\Auth\Guard;

class Token{
    
    	private $token = null;
    	private $auth = null;
    	
    	public function __construct($token, Guard $auth){
    	    	$this->token = $token;
		$this->auth = $auth;
    	}

	public function check(){
		if($this->token == '') return false;

		$arr = explode("|",$this->token);
		if(count($arr) != 2) return false;
		
		$id = $arr[0];
		$inputToken = $arr[1];
	
		$user = User::find($id);

		if($user){
			if($user->remember_token === $inputToken){
				if($this->auth) $this->auth->login($user);
				return true;			
			}
		}else{
			return false;
		}
	} 
    
}

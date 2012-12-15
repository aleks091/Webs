<?php
class CleanText{
	
	static function validAlpha($text){
		$pattern = "/^[a-z]+$/i";
		if(preg_match($pattern, $text))
			return true;
		return false;
	}
	
	static function IsValidUserName($text){
		return true;
	}
	
	static function IsValidPassword($text){
		return true;
	}
	
	static function IsSafeText($text){
		return true;
	}
	
	static function validAlphaNumeric($text){
		$pattern = "/^[a-z][a-z0-9]+$/i";
		if(preg_match($pattern, $text))
			return true;
		return false;
	}
	static function validEmail($text){
		//no valida para .com.mx si para .com
		$pattern = "/^[a-z0-9_.-]*@[a-z]+.[a-z]{2,3}$/i";
		//$pattern = "^[a-zA-Z0-9._-]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$";
		if (preg_match($pattern, $text)) 
	        return true;
		return false;   
	}
	static function isNumeric($text){
		$pattern = "/^[0-9]+$/";
		if (preg_match($pattern, $text)) 
	        return true;
		return false;   	
	}
}
?>

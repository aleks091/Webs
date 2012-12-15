<?php 
class LogInFunctions{
	public static function SetLogInCookie(User $user){
		setcookie("userName",$user->UserName);
		setcookie("userPass",$user->Password);
	}
	
	public static function RemoveLogInCookie(){
		setcookie("userName",false);
		setcookie("userPass",false);
	}
	
	public static function GetLogInCookie(){
		if ( isset ( $_COOKIE['userName'] ) 
		  && isset ( $_COOKIE['userPass'] ) ){
		  	return true;
		  }else{
		  	return false;
		  }
	}
	
	public static function IsLogged(MembersModel $modelObj){
		
		if ( ! self::GetLogInCookie() ){
			$u = new UserFactory(null);
			return $u->GetUser();
		}
		
		if( CleanText::IsValidUserName( $_COOKIE['userName'] ) 
		 && CleanText::IsValidPassword( $_COOKIE['userPass'] ) ){
		 	
			$userName = $_COOKIE['userName'];
			$password = $_COOKIE['userPass'];			
						
			$user = $modelObj->LogIn($userName, $password);
			return $user;
		 } else{
		 	$u = new UserFactory(null);
			return $u->GetUser();
		 }
	}
}
?>
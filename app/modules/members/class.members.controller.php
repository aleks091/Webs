<?php
class MembersController{
	
	public function __construct(){
		$this->modelObj = new MembersModel();
		$this->viewObj = new MembersView();
		$this->linkObj = new MembersLinks();		
	}
	
	public function LogIn(){
		return $this->viewObj->LogIn();
	}
	
	public function LogInPost(){
		
		$credentials = $_POST['LogIn'];			
		
		if(  CleanText::IsValidUserName ( $credentials['user'] )
		  && CleanText::IsValidPassword ( $credentials['pass'] ) ){
		  	
		  	$user = $this->modelObj->LogIn($credentials['user'], md5($credentials['pass']));
			
			if($user->WasFound){
				LogInFunctions::SetLogInCookie($user);
				$location = "LOCATION: " . $this->linkObj->MemberCheckLists();
				header($location);
			}else{
				return "Verify your information";
			}		  	
		  	
		  }else{
		  	return "Verify your information";
		  }
	
	}
	
	public function logOut(){
		LogInFunctions::RemoveLogInCookie();		
		header("LOCATION: index.php");
	}
	
	public function Register(){
		return $this->viewObj->Register();
	}
	
	public function RegisterPost(){
		
		$data = $_POST['Register'];
		
		$factory = new UserFactory($data);
		$user = $factory->GetUser();
		$user->IdLevel = Level::$User;
		$user->IsActive = true;
		$user->LastIpLogIn = $_SERVER['REMOTE_ADDR'];
		$user->LastLogInDate = date("Y-m-d");
		$user->TimesLogIn = 1;
		
		$this->modelObj->Register($user);		
	}
	
	
}
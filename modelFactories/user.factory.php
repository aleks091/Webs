<?php
class UserFactory{
		
	public function __construct($data){
		$this->userModel = new User();
		$this->BuildUser($data);
	}
	
	public function GetUser(){
		return $this->userModel;
	}
	
	private function BuildUser($data){
		
		if($data == null){
			$this->userModel->WasFound = false;
			return $this->userModel;
		}		
		
		
		if(array_key_exists('Email', $data))
			$this->userModel->Email = $data['Email'];
					
		if(array_key_exists('IdLevel', $data))
			$this->userModel->IdLevel = $data['IdLevel'];
			
		if(array_key_exists('IdUser', $data))
			$this->userModel->IdUser = $data['IdUser'];
		
		if(array_key_exists('IsActive', $data))
			$this->userModel->IsActive = $data['IsActive'];
		
		if(array_key_exists('LastIpLogIn', $data))
			$this->userModel->LastIpLogIn = $data['LastIpLogIn'];
		
		if(array_key_exists('Password', $data))
			$this->userModel->Password = $data['Password'];
		
		if(array_key_exists('TimesLogIn', $data))
			$this->userModel->TimesLogIn = $data['TimesLogIn'];
		
		if(array_key_exists('UserName', $data))
			$this->userModel->UserName = $data['UserName'];
			
		if(array_key_exists('LastLogInDate', $data))
			$this->userModel->LastLogInDate = $data['LastLogInDate'];

		$this->userModel->WasFound = true;
		
		return $this->userModel;
	}
	
	
	
}
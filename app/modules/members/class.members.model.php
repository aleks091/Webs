<?php
class MembersModel extends ModuleModel{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function LogIn($user, $password){
		
		$qStr = 'SELECT SQL_CALC_FOUND_ROWS * FROM %s WHERE UserName = :userName AND Password = :pass';
		$queryStr = sprintf ( $qStr , $this->_ ( 'user' ) );
		$qParams = array (':userName' => $user, ':pass' => $password );
		$this->query($queryStr, $qParams);
		$record = $this->getRows(true);
		
		if($record['total'] == 1){			
			$userFactory = new UserFactory($record['rows'][0]);		
			return $userFactory->GetUser();
		}else{
			$u = new UserFactory(null);
			return $u->GetUser();
		}
		
	}
	
	public function Register(User $user){
		
		$qStr = 'INSERT INTO %s (`UserName`, `Password`, `Email`, `IsActive`, `TimesLogIn`, `LastIpLogIn`, `LastLogInDate`, `IdLevel`) 
						 VALUES (:UserName,  :Password, :Email, :IsActive, :TimesLogIn, :LastIpLogIn, :LastLogInDate, :IdLevel);';
		
		$qParams = array(':UserName' => $user->UserName,  ':Password' => md5($user->Password), 
							':Email' => $user->Email , ':IsActive' => $user->IsActive , 
							':TimesLogIn' => $user->TimesLogIn, ':LastIpLogIn' => $user->LastIpLogIn, 
							':LastLogInDate' => $user->LastLogInDate, ':IdLevel' => $user->IdLevel);
		
		$queryStr = sprintf ( $qStr, $this->_ ( 'user' ) );
		$result = $this->query ( $queryStr, $qParams );
		
		print_array($result);
		
		
	}
	
}

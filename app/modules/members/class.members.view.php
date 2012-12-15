<?php
class MembersView{
	
	function __construct(){
		$this->linksObj = new MembersLinks();
	}
	
	function LogIn(){
		$tplObj = new template('app/modules/members/templates/LogIn.tpl');	
		$tplObj->assign ( 'logInAction', $this->linksObj->LogIn() );	
		$tplObj->parse ( 'LogIn' );
		return $tplObj->get ( 'LogIn' );
	}
	
	function Register(){
		$tplObj = new template('app/modules/members/templates/Register.tpl');	
		$tplObj->assign ( 'registerAction', $this->linksObj->Register() );		
		$tplObj->parse('Register');
		return $tplObj->get('Register');
	}
	
}

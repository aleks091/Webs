<?php 
class MembersLinks{
	
	function LogIn(){
		return BASE_URL . "?section=members&action=LogInPost";
	}
	
	function Register(){
		return BASE_URL . "?section=members&action=RegisterPost";
	}
	
	function MemberCheckLists(){
		return "index.php?section=checkLists&action=GetAllCheckLists";
	}
	
}
?>
<?php 
class AdminController{
	
	function __construct(){
		$this->viewObj = new AdminView();
		$this->modelObj = new AdminModel();
	}
}
?>
<?php 
class TaskView{
	
	function __construct(){
		$this->checkListView = new CheckListView();
		$this->linkObj = new TaskLinks();
	}
	
	function AddTask(){
		
		$tplObj = new template ( 'app/modules/tasks/templates/AddTask.tpl' );	
		$tplObj->assign ( 'addTask', $this->linkObj->AddTask($_GET['checkList']));	
		$tplObj->parse ( 'AddTask' );
		$addCheckList =  $tplObj->get ( 'AddTask' );
		
		return $this->checkListView->ListsOptions($addCheckList);
	}	
	
	function ViewTask(){
		
	}
}
?>
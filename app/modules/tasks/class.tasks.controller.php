<?php 
class TaskController{
	function __construct(){
		$this->viewObj = new TaskView();
		$this->modelObj = new TasksModel();
		$this->linkObj = new TaskLinks();
	}
	
	function AddTask(){	
		return $this->viewObj->AddTask();
	}
	
	function AddTaskPost(){
		if ( isset( $_GET['checkList'] )
		  && CleanText::isNumeric ( $_GET['checkList'] ) ) {
			
			if ( isset ( $_POST['Task'] ) 
			  && CleanText::IsSafeText ( $_POST['Task'] ) ) {
			  	
			  	//if $_GET['checkList'] was set and was a valid number
			  	//then whe can use it to insert the data
			  	$checkListId = $_GET['checkList'];
			  	
			  	$factory = new TaskFactory($_POST['Task']);
			  	$task = $factory->GetTask();
			  	
			  	$task->Created = date("Y-m-d H:i:s");
			  	$task->IdCheckList = $checkListId;
			  	
			  	$result = $this->modelObj->AddTask($task);
			  	
			  	 if(!$result){
			  	 	return 'Verify your informati&oacute;n';
			  	 }			  	
			  	
			  }else{
			  	return 'Verify your informati&oacute;n';
			  }
		}
		else{
			return 'Vefiry your informati&oacute;n';
		}
	}
	
	function UpdateTasks(){	
		
		if ( isset ( $_POST['Task']['Id'] ) ) {
			
			$Ids = $_POST['Task']['Id'];
			
			foreach ( $Ids as $i => $id ) {
				if ( !CleanText::isNumeric($id ) && $id != "" ) {
					return 'Vefiry your informati&oacute;n';
				}
			}
			
			$this->modelObj->SetTasksCompletedStatus($Ids);
		}
				
		header("LOCATION: " . $this->linkObj->RefreshCheckList( $_GET['checkList']));
	}
		
}
?>
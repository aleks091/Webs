<?php 
class TasksModel extends ModuleModel{
	
	function __construct(){
		parent::__construct();
		$this->checkListModel = new CheckListModel();
	}
	
	function ViewTasksFromCheckList($checkListId){
		$qStr = "SELECT SQL_CALC_FOUND_ROWS * FROM %s WHERE IdCheckList=:idchecklist AND IsDeleted = false";
		
		$qParams = array (':idchecklist' => $checkListId );
		
		$queryStr = sprintf ( $qStr , $this->_ ( 'task' ) );
		
		$this->query ( $queryStr,  $qParams );		
		$row = $this->getRows ();
		
		foreach ( $row ['rows'] as $i => $value )
			$rw [] = $row ['rows'] [$i];
		return $rw;
	}
	
	function GetTask($idTask){
		
		$qStr = 'SELECT SQL_CALC_FOUND_ROWS * FROM %s WHERE IdTask = :idtask AND IsDeleted = false';
		
		$queryStr = sprintf ( $qStr , $this->_ ( 'task' ) );
		$qParams = array (':idtask' => $idTask );
		$this->query($queryStr, $qParams);
		$record = $this->getRows(true);
		
		if($record['total'] == 1){			
			$taskFactory = new TaskFactory($record['rows'][0]);		
			return $taskFactory->GetTask();
		}else{
			$t = new TaskFactory(null);
			return $t->GetTask();
		}
	}
	
	function AddTask(Task $task){
		
		//Before we add a task to the checklist
		//we verify that the checklist is from the user
		//because the checkListId is obtained from a hidden field
		$canUserAddTask = $this->checkListModel->IsCheckListFromUser($task->IdCheckList, SESSION_USER_ID);
				
		if($canUserAddTask){	
			
			$qStr = "INSERT INTO %s(`Created`, `IdCheckList` ,`Description`) 
							 VALUES(:created,  :idchecklist,  :description)";
			
			$qParams = array(':created' => $task->Created,  
							 ':idchecklist'  => $task->IdCheckList,  
						 	 ':description'    => $task->Description);
			
			$queryStr = sprintf ( $qStr, $this->_ ( 'task' ) );
			$result = $this->query ( $queryStr, $qParams );
			
			return $result;
		}else{
			return false;
		}
		
	}
	
	function SetTasksCompletedStatus($Ids){
				
		$completedIds = array();
		$incompletedIds = array();
		
		foreach($Ids as $i => $id) {
			
			if($id == null){
				array_push ( $incompletedIds , $i );
			}else{
				array_push ( $completedIds , $id );	
			}
		}
		
		$this->TasksCompleted ( $completedIds );
		$this->TasksIncompleted ( $incompletedIds );
	}	
	
	function TasksCompleted ( $completedIds ) {
		$this->UpdateCompletedStatus($completedIds, true);		
	}
	
	function TasksIncompleted ( $incompletedIds ) {
		$this->UpdateCompletedStatus($incompletedIds, false);		
	}
	
	function UpdateTask($task){
		
	}
	
	private function UpdateCompletedStatus($ids, $isCompleted){
		
		if ( $ids != null ){
			
			$sParams = array (':IsCompleted' => $isCompleted );
			
			$wParams = array ();
			$where = "IdTask in (";		
			
			foreach($ids as $i => $id) {
			
			    $where .= ":id".$id;
			    
			    if (next($ids)==true) {
			    	$where .= " , ";
			    }else{
			    	$where .= ")";
			    }
			    
			    $wParams[':id'.$id] = $id;			
			}
			
			$this->update ( 'task', $sParams, $where, $wParams );
			$this->affectedRows ();
		}
	}
	
}
?>
<?php
class TaskFactory{
	function __construct($data){
		$this->taskModel = new Task();
		$this->BuildTask($data);
	}
	
	function GetTask(){
		return $this->taskModel;
	}
	
	function BuildTask($data){
				
		if(array_key_exists('Created', $data))
			$this->taskModel->Created = $data['Created'];
			
		if(array_key_exists('Completed', $data))
			$this->taskModel->Completed = $data['Completed'];
			
		if(array_key_exists('Description', $data))
			$this->taskModel->Description = $data['Description'];
			
		if(array_key_exists('IdCheckList', $data))
			$this->taskModel->IdCheckList = $data['IdCheckList'];
			
		if(array_key_exists('IdTask', $data))
			$this->taskModel->IdTask = $data['IdTask'];
			
		if(array_key_exists('IsCompleted', $data))
			$this->taskModel->IsCompleted = $data['IsCompleted'];
			
		if(array_key_exists('IsDeleted', $data))
			$this->taskModel->IsDeleted = $data['IsDeleted'];
	}
}
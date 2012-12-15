<?php
class CheckListFactory{
	function __construct($data){
		$this->checkListModel = new CheckList();
		$this->BuildCheckList($data);
	}
	
	function GetCheckList(){
		return $this->checkListModel;
	}
	
	function BuildCheckList($data){
		
		if ( $data == null )
				return null;
				
		if(array_key_exists('Created', $data))
			$this->checkListModel->Created = $data['Created'];
			
		if(array_key_exists('Finish', $data))
			$this->checkListModel->Finish = $data['Finish'];
			
		if(array_key_exists('IdCheckList', $data))
			$this->checkListModel->IdCheckList = $data['IdCheckList'];
			
		if(array_key_exists('IdUser', $data))
			$this->checkListModel->IdUser = $data['IdUser'];
			
		if(array_key_exists('IsDeleted', $data))
			$this->checkListModel->IsDeleted = $data['IsDeleted'];
			
		if(array_key_exists('IsFinish', $data))
			$this->checkListModel->IsFinish = $data['IsFinish'];
			
		if(array_key_exists('Name', $data))
			$this->checkListModel->Name = $data['Name'];
	}
}
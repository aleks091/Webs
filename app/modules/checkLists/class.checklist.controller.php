<?php 
class CheckListController{
	public function __construct(){
		$this->modelObj = new CheckListModel();
		$this->viewObj = new CheckListView();
		$this->linkObj = new CheckListLinks();
		
	}
	
	function ListsOptions(){
		return $this->viewObj->ListsOptions();
	}
	
	function AddCheckList(){
		return $this->viewObj->AddCheckList();
	}
	
	function AddCheckListPost(){
		$data = $_POST['List'];
		
		if(CleanText::IsSafeText($data)){
			
			$factory = new CheckListFactory($data);
			
			$checkList = $factory->GetCheckList();		
			$checkList->Created = date("Y-m-d");
			$checkList->IdUser = SESSION_USER_ID;
			
			$this->modelObj->AddCheckList($checkList);
			header("LOCATION: " . $this->linkObj->ViewAllCheckLists());
			
		}else {
			return 'Verify your input characters';
		}
		
	}
	
	function FindCheckLists(){
		
	}
	
	function FindCheckListsPost(){
		
	}
	
	function GetAllCheckLists(){
		
		$checkLists = $this->modelObj->FindAllCheckListForUser(SESSION_USER_ID);
		return $this->viewObj->FindCheckLists($checkLists);
		
	}
	
	function ViewCheckList(){
		
		if ( isset ( $_GET['id'] ) && CleanText::isNumeric ( $_GET['id'] ) ){
			
			$idCheckList = $_GET['id'];			
			$tasks = $this->modelObj->CheckListTasks($idCheckList);	
			
			$data = $this->modelObj->GetCheckList($idCheckList);
			
			$factory = new CheckListFactory($data);
			$checkList = $factory->GetCheckList();
			
			return $this->viewObj->ViewCheckList($tasks, $checkList);
		}		
	}
	
	function UpdateCheckList(){
		
	}
}
?>
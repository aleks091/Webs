<?php 
class CheckListView{
	
	function __construct(){
		$this->linkObj = new CheckListLinks();
	}
	
	function ListsOptions($options = null){
		
		$tplObj = new template ( 'app/modules/checkLists/templates/ListsOptions.tpl' );	
		$tplObj->assign ( 'AddCheckList', $this->linkObj->AddCheckList () );	
		$tplObj->assign ( 'ViewCheckLists', $this->linkObj->ViewAllCheckLists () );
		
		$tplObj->assign ( 'options', $options );
		
		$tplObj->parse ( 'ListsOptions' );
		return $tplObj->get ( 'ListsOptions' );
	}
	
	function AddCheckList(){
		
		$tplObj = new template ( 'app/modules/checkLists/templates/AddCheckList.tpl' );	
		$tplObj->assign ( 'AddCheckListPost', $this->linkObj->AddCheckListPost() );	
		$tplObj->parse ( 'AddCheckList' );
		$addCheckList =  $tplObj->get ( 'AddCheckList' );
		
		return $this->ListsOptions($addCheckList);
	}
	
	function FindCheckLists($checkLists){
		
		$tplObj = new template ( 'app/modules/checkLists/templates/ViewAllCheckLists.tpl' );
					
		$tplObj->assign ( 'userCheckLists', SESSION_USER_NAME . " CheckLists" );
		
		if ( $checkLists != null ){
			foreach($checkLists as $i => $checkList){
				$checkList = (object)$checkList;	
	
				$tplObj->assign ( 'IdCheckList', $checkList->IdCheckList );	
				$tplObj->assign ( 'Name', $checkList->Name );
				$tplObj->assign ( 'viewCheckList', $this->linkObj->ViewCheckLists ( $checkList->IdCheckList ) );
				$tplObj->assign ( 'Created', $checkList->Created );	
				$tplObj->assign ( 'Finish', $checkList->Finish );	
				
				$tplObj->parse('ViewAllCheckLists.activities');
			}
		}
		
		$tplObj->parse ( 'ViewAllCheckLists' );
		$addCheckList =  $tplObj->get ( 'ViewAllCheckLists' );
		
		return $this->ListsOptions($addCheckList);
	}
	
	function ViewCheckList($tasks, CheckList $checkList){
		$tplObj = new template ( 'app/modules/checkLists/templates/ViewCheckList.tpl' );
					
		$title = "Please add a task to the checklist";
		
		
		if($tasks != null){
			
			$title = $checkList->Name . " Tasks ";			
			
			foreach($tasks as $i => $task){
				$task = (object)$task;	
	
				$tplObj->assign ( 'IdTask', $task->IdTask );	
				
				if($task->IsCompleted)
					$tplObj->parse('ViewCheckList.activities.checkedBox');
				else 
					$tplObj->parse('ViewCheckList.activities.checkBox');
					
				$tplObj->assign ( 'IsCompleted', $task->IsCompleted );			
				$tplObj->assign ( 'Description', $task->Description );
				$tplObj->assign ( 'Created', $task->Created );	
				$tplObj->assign ( 'Completed', $task->Completed );	
				
				$tplObj->parse('ViewCheckList.activities');
			}
			
		}
		
		$tplObj->assign ( 'addTask', $this->linkObj->AddTask ( $_GET['id'] ) );
		$tplObj->assign ( 'saveJob', $this->linkObj->SaveJob ( $_GET['id'] ) );
		
		$tplObj->assign ( 'checkListName', $title );
		
		$tplObj->parse ( 'ViewCheckList' );
		$addCheckList =  $tplObj->get ( 'ViewCheckList' );
		
		return $this->ListsOptions($addCheckList);
	}
}

?>
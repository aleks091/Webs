<?php
class CheckListLinks{
	function AddCheckList(){
		return BASE_URL . "?section=checkLists&action=AddCheckList";
	}
	
	function AddCheckListPost(){
		return BASE_URL . "?section=checkLists&action=AddCheckListPost";
	}
	
	function AddTask($id){
		return BASE_URL . "?section=tasks&action=AddTask&checkList=" . $id;
	}
	
	function SaveJob($id){
		return BASE_URL . "?section=tasks&action=UpdateTasks&checkList=" . $id;
	}
	
	function ViewAllCheckLists(){
		return "index.php?section=checkLists&action=GetAllCheckLists";
	}
	
	function ViewCheckLists($id){
		return BASE_URL . "?section=checkLists&action=ViewCheckList&id=".$id;		
	}
	
	function FindCheckLists(){
		return BASE_URL . "?section=checkLists&action=FindCheckLists";
	}
}
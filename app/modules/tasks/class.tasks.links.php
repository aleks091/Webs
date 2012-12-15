<?php 
class TaskLinks{

	function AddTask($id){
		return "index.php?section=tasks&action=AddTaskPost&checkList=" . $id;
	}
	
	function RefreshCheckList($id){
		return "index.php?section=checkLists&action=ViewCheckList&id=" . $id;
	}
	
}
?>
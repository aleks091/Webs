<?php 
class CheckListModel extends ModuleModel{
	function __construct(){
		parent::__construct();
	}
	
	function AddCheckList(CheckList $checkList){
		$qStr = "INSERT INTO %s(`Created`, `IdUser` ,`Name`) 
						 VALUES(:created,  :iduser,  :name)";
		
		$qParams = array(':created' => $checkList->Created,  
						 ':iduser'  => $checkList->IdUser,  
					 	 ':name'    => $checkList->Name);
		
		$queryStr = sprintf ( $qStr, $this->_ ( 'checkList' ) );
		$result = $this->query ( $queryStr, $qParams );
	}
	
	function FindAllCheckListForUser($userId){
		
		$qStr = "SELECT SQL_CALC_FOUND_ROWS * FROM %s WHERE IdUser=:iduser AND IsDeleted = false";
		
		$qParams = array (':iduser' => $userId );
		
		$queryStr = sprintf ( $qStr , $this->_ ( 'checkList' ) );
		
		$this->query ( $queryStr,  $qParams );		
		$row = $this->getRows ();
		$rw = "";
		foreach ( $row ['rows'] as $i => $value )
			$rw [] = $row ['rows'] [$i];
		return $rw;
	}
	
	function IsCheckListFromUser($checkListId, $userId){
		$qStr = "SELECT count(`IdCheckList`) as Total FROM %s WHERE IdUser=:iduser 
					AND IdCheckList = :idchecklist AND IsDeleted = false";
		
		$qParams = array (':iduser' => $userId , ':idchecklist' => $checkListId );
		
		$queryStr = sprintf ( $qStr , $this->_ ( 'checkList' ) );
		
		$this->query ( $queryStr,  $qParams );		
		$row = $this->fetchRow();
		
		return $row;
	}
	
	function UpdateCheckList(CheckList $checkList){
		
	}
	
	function GetCheckList($checkListId){
		$qStr = "SELECT SQL_CALC_FOUND_ROWS * FROM %s WHERE IdCheckList = :idchecklist AND IsDeleted = false";
		
		$qParams = array (':idchecklist' => $checkListId );
		
		$queryStr = sprintf ( $qStr , $this->_ ( 'checkList' ) );
		
		$this->query ( $queryStr,  $qParams );		
		$row = $this->fetchRow();
		
		return $row;
	}
	
	function CheckListTasks($checkListId){
		$qStr = "SELECT SQL_CALC_FOUND_ROWS * FROM %s WHERE IdCheckList = :idchecklist AND IsDeleted = false";
		
		$qParams = array (':idchecklist' => $checkListId );
		
		$queryStr = sprintf ( $qStr , $this->_ ( 'task' ) );
		
		$this->query ( $queryStr,  $qParams );		
		$row = $this->getRows ();

		if ( count ( $row['rows'] ) == 0 )
			return null;
		
		
		foreach ( $row ['rows'] as $i => $value )
			$rw [] = $row ['rows'] [$i];
			
		
		return $rw;
	}
	
}

?>
<?php

abstract class Database {
	
	protected $dbhost;
	protected $dbuser;
	protected $dbpass;
	protected $dbname;
	
	protected $_connection = NULL;
	protected $_queryId = NULL;
	protected $_errorInfo = array ();
	
	public function __construct() {
		global $config;
		$registry = $config;
		
		
		$this->dbname = 'checklist';
		$this->dbuser = 'webuser';
		$this->dbhost = '127.0.0.1';
		$this->dbpass = '1234';
		
		
		
		/*$this->dbname = $registry->database->name;
		$this->dbuser = $registry->database->user;
		$this->dbhost = $registry->database->host;
		$this->dbpass = $registry->database->pass;
		/*$this->dbmembers = $registry->database->members;
		$this->dbcultura = $registry->database->cultura;*/
	}
	
	function getParams($params, $string = false) {
		if ($string) {
			foreach ( $params as $key => $val ) {
				$str [] = '`' . str_replace ( ':', '', $key ) . '` = ' . $key;
			}
			return implode ( ',', $str );
		}
		foreach ( $params as $key => $val ) {
			$ret ['fields'] [] = '`' . str_replace ( ':', '', $key ) . '`';
			$ret ['labels'] [] = $key;
		}
		return $ret;
	}
	
	function add($table, array $params, $dbMembers = false) {
		$pParams = $this->getParams ( $params, true );
		
		if ($dbMembers)
			$query = "INSERT INTO " . $this->_m ( $table ) . " SET $pParams";
		else
			$query = "INSERT INTO " . $this->_ ( $table ) . " SET $pParams";
			
		if ($this->query ( $query, $params ))
			return $this->lastInsertId ();
		return false;
	}
	
	function update($table, array $sParams, $where, $wParams, $dbMembers = false) {
		$pParams = $this->getParams ( $sParams, true );
		
		if ($dbMembers)
			$query = "UPDATE " . $this->_m ( $table ) . " SET $pParams WHERE $where";
		else
			$query = "UPDATE " . $this->_ ( $table ) . " SET $pParams WHERE $where";
		
		$rParams = $sParams + $wParams;
				
		return $this->query ( $query, $rParams );
	}
	
	public function getStatus() {
		return $this->errno;
	}
	
	protected function query($query, $params = NULL) {
		$this->_connection = PDOSingleton::getInstance ( $this->dbhost, $this->dbuser, $this->dbpass );
		$this->_queryId = $this->_connection->prepare ( $query, array (PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY ) );
		$this->_queryId->setFetchMode ( PDO::FETCH_ASSOC );
		$result = $this->_queryId->execute ( $params );
		$this->_errorInfo = $this->_queryId->errorInfo ();
		if (! $result) {
			$this->reportError ( $query, $params );
		}
		
		return $result;
	}
	
	protected function lastInsertId() {
		if (is_object ( $this->_connection )) {
			return $this->_connection->lastInsertId ();
		}
		return false;
	}
	
	protected function getRows($foundRows = false) {
		if (! is_object ( $this->_queryId )) {
			return array ('status' => false, 'message' => 'queryId no es un objeto' );
		}
		$records = array ();
		$return ['rows'] = $this->_queryId->fetchAll ( PDO::FETCH_ASSOC );
		$return ['error'] = $this->getError ();
		if ($foundRows) {
			$this->query ( 'SELECT FOUND_ROWS() as total' );
			$return ['total'] = $this->_queryId->fetch ( PDO::FETCH_ASSOC );
			$return ['total'] = $return ['total'] ['total'];
		}
		return $return;
	}
	
	protected function fetchRow() {
		if (is_object ( $this->_queryId ))
			return $this->_queryId->fetch ( PDO::FETCH_ASSOC );
		return false;
	}
	
	protected function affectedRows() {
		if (is_object ( $this->_queryId ))
			return $this->_queryId->rowCount ();
		return false;
	}
	
	private function reportError($query, $params) {
		echo '<pre>';
		echo "\n\nDATABASE ERROR:\n";
		echo "ERRNO: " . $this->_errorInfo [1] . "\n";
		echo "ERROR: " . $this->_errorInfo [2] . "\n";
		echo "QUERY: " . $query . "\n";
		echo "PARAMS: " . print_r ( $params, true ) . "\n";
		echo '</pre>';
	}
	protected function _($table) {
		return '`' . $this->dbname . '`.`' . $table . '`';
	}
	
	protected function _m($table) {
		return '`' . $this->dbmembers . '`.`' . $table . '`';
	}
	
	protected function _cm($table) {
		return '`' . $this->dbcultura . '`.`' . $table . '`';
	}
	
	public function getError() {
		return array ('status' => $this->_errorInfo [1] == 0, 'errno' => $this->_errorInfo [1], 'message' => $this->_errorInfo [2] );
	}
}

final class PDOSingleton {
	
	private static $_instances = array ();
	
	private function __construct() {
	}
	
	public static function getInstance($host, $user, $pwd) {
		$instanceId = $host . '_' . $user;
		if (! isset ( self::$_instances [$instanceId] )) {
			self::$_instances [$instanceId] = new PDO ( 'mysql:host=' . $host, $user, $pwd, array (PDO::ATTR_PERSISTENT => false ) );
		}
		return self::$_instances [$instanceId];
	}
	
	public static function closeConnections() {
		foreach ( self::$_instances as &$instance ) {
			$instance = null;
		}
	}
}
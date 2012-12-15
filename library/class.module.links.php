<?php

abstract class ModuleLinks{
	protected $classId = null;
	protected static $_links = array ();
	
	public static function getInstance($configSection = null) {
		$class = str_replace ( 'Core', '', get_called_class () );
		$classId = $configSection != null ? $class . '_' . $configSection : $class;
		if (isset ( self::$_links [$classId] )) {
			return self::$_links [$classId];
		}
		return self::$_links [$classId] = new $class ( $configSection );
	}
}
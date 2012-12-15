<?php
	define ( "ABS_PATH", dirname ( __FILE__ ) . '/' );
	define ( "CSS_PATH", "/app/css/" );
	define ( "JS_PATH", "/app/js/" );
	define ( "BASE_URL", "http://localhost/CheckList/index.php" );
	
	include_once ABS_PATH . 'autoload.php';
	
	
	
	isset($_GET['section']) ?
		$section = $_GET['section'] :
		$section = "";
	
	isset($_GET['action']) ?
		$method = $_GET['action'] :
		$method = "";
	
	switch ($section) {
		
		case 'admin':
			$module = new AdminController();
			LoadAdmin ( $module, $method );
			break;
		
		case 'checkLists':
			$module = new CheckListController();
			LoadModule ( $module, $method );
			break;
			
		case 'members':
			$module = new MembersController();
			LoadModule ( $module, $method );
			break;
			
		case 'tasks':
			$module = new TaskController();
			LoadModule($module, $method);
			break;
		
		default:
			$module = new MainController();
			LoadModule ( $module, 'DefaultPage' );
			break;
		
	}
	
	function LoadModule( $module, $method ){		
		
		$membersModel = new MembersModel ();	
		$memberLogged = LogInFunctions::IsLogged ( $membersModel );	
		DEFINE ( 'SESSION_USER_ID' , $memberLogged->IdUser );
		DEFINE ( 'SESSION_USER_NAME' , $memberLogged->UserName );	
		DEFINE ( 'USER_LOGGED' , $memberLogged->WasFound );
		
		method_exists ( $module , $method ) ? 
			$html = $module->$method() 
			: $html = '<p class="error">Error</p>';
			
		$tplObj = new template ( ABS_PATH . '/app/templates/page.tpl' );
		
		if ( USER_LOGGED ){
			$tplObj->assign('userName', $memberLogged->UserName);
			$tplObj->parse('site.logindiv');
			$tplObj->parse('site.menuLogInOptions');
		}else{
			$tplObj->parse('site.userNotLogged');
		}
		
		
		$tplObj->assign ( 'content', $html );
		
		$tplObj->parse ( 'site' );
		
		echo $tplObj->get ( 'site' );
	}
	
	function LoadAdmin ( $module, $method ){
		
	}	
	
	//Funcion to print array with format
	function print_array($array) {
		echo "<pre>";
			print_r ($array);
		echo "</pre>";
	}	
?>
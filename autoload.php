<?php 

	//Library Include
	include 'library/class.checktext.php';
	include 'library/class.database.php';
	include 'library/class.module.controller.php';
	include 'library/class.module.links.php';
	include 'library/class.module.model.php';
	include 'library/template.class.php';	
	include 'library/components/class.loginfunctions.php';	
	include 'library/components/class.functions.php';	
	
	//Factories Include
	include 'modelFactories/user.factory.php';
	include 'modelFactories/checkList.factory.php';
	include 'modelFactories/task.factory.php';
	
	//Entities Include
	include 'models/user.php';
	include 'models/level.php';
	include 'models/task.php';
	include 'models/checkList.php';
	
	
	//Admin Module Include
	include 'app/modules/admin/class.admin.model.php';
	include 'app/modules/admin/class.admin.view.php';
	include 'app/modules/admin/class.admin.controller.php';
	
	//Main Module Include
	include 'app/modules/main/class.main.controller.php';
	include 'app/modules/main/class.main.view.php';
	
	//Members Module Include
	include 'app/modules/members/class.members.model.php';
	include 'app/modules/members/class.members.view.php';
	include 'app/modules/members/class.members.controller.php';
	include 'app/modules/members/class.members.links.php';
	
	//CheckLists Module Include
	include 'app/modules/checkLists/class.checklist.model.php';
	include 'app/modules/checkLists/class.checklist.view.php';
	include 'app/modules/checkLists/class.checklist.controller.php';
	include 'app/modules/checkLists/class.checklist.links.php';
	
	//Tasks Module Include
	include 'app/modules/tasks/class.tasks.model.php';
	include 'app/modules/tasks/class.tasks.view.php';
	include 'app/modules/tasks/class.tasks.controller.php';
	include 'app/modules/tasks/class.tasks.links.php';

?>
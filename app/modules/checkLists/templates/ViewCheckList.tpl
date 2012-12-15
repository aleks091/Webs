<!-- BEGIN: ViewCheckList -->
<form id = "formValues" method = "post" action = "{saveJob}">
	<span id = "checkListTitle">{checkListName}</span>
	
	<div class = "taskItem">
		<a href = "{addTask}" >Add Task</a>
	</div>
	<div class = "taskItem">
		<a href="javascript:{}" onclick="document.getElementById('formValues').submit();">Save Job</a>
	</div>
	
	<table id = "checkListTable">
		<tr>
			<th><span class = "text">Done</span></th>
			<th><span class = "text">Description</span></th>
			<th><span class = "text">Created</span></th>
			<th><span class = "text">Completed</span></th>
		</tr>
		<!-- BEGIN: activities -->
		<tr>
			<td>
				<input type="hidden" name="Task[Id][{IdTask}]" value="" />
				<!-- BEGIN: checkedBox -->			
				
					<input type="checkbox" checked value = "{IdTask}" name="Task[Id][{IdTask}]"/>	
				<!-- END: checkedBox -->	
				<!-- BEGIN: checkBox -->
					<input type="checkbox" value = "{IdTask}" name="Task[Id][{IdTask}]"/>	
				<!-- END: checkBox -->			
			</td>
			<td>
				<span class = "text">{Description}</span>
			</td>
			
			<td>
				<span class = "text">{Created}</span>
			</td>
			
			<td>
				<span class = "text">{Completed}</span>
			</td>
		</tr>
		<!-- END: activities -->
	</table>
</form>
<link rel="stylesheet" type="text/css" href="app/modules/checkLists/css/ViewAllCheckLists.css" media="screen"/>
<!-- END: ViewCheckList -->
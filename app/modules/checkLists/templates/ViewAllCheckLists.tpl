<!-- BEGIN: ViewAllCheckLists -->
<span id = "checkListTitle">{userCheckLists}</span>

<div class = "taskItem">
	<a href = "{addCheckList}" >Add</a>
</div>

<div class = "taskItem">
	<a href = "{saveChanges}" >Save</a>
</div>

<table id = "checkListTable">
	<tr>
		<th><span class = "text">Done</span></th>
		<th><span class = "text">Name</span></th>
		<th><span class = "text">Created</span></th>
		<th><span class = "text">Finish</span></th>
	</tr>
	<!-- BEGIN: activities -->
	<tr>
		<td>
			<input type="checkbox" name="{IdCheckList}"/>
		</td>
		<td>
			<a class = "text" href ="{viewCheckList}">{Name}</a>
		</td>
		
		<td>
			<span class = "text">{Created}</span>
		</td>
		
		<td>
			<span class = "text">{Finish}</span>
		</td>
	</tr>
	<!-- END: activities -->
</table>
<link rel="stylesheet" type="text/css" href="app/modules/checkLists/css/ViewAllCheckLists.css" media="screen"/>
<!-- END: ViewAllCheckLists -->
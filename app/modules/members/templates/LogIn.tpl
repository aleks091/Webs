<!-- BEGIN: LogIn -->
	<div id="LogInDiv">
		<form method="post" action="{logInAction}">
			User: <input type="text" name="LogIn[user]" /><br/>
			Password: <input type="password" name="LogIn[pass]" /><br/>
			
			<div class="error">
				Invalid Username or password.	
			</div>
				
			<input type="submit" value="Log In">
			
		</form>
	</div>
<!-- END: LogIn -->
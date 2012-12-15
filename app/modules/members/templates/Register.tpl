<!-- BEGIN: Register -->
	<div id = "Register">
		<form method="post" action="{registerAction}">
			Username: <input type="text" name="Register[UserName]"/><br/>
			
			Password: <input type="password" name="Register[Password]" />
			
				<label class="error">
					Passwords don't match
				</label><br/>
				
			Confirm Password: <input type="password" name="Register[confPass]"/> <br/>
			
						
			
			Email: <input type="text" name="Register[Email]"/><br/>
			<input type="submit" value="Register"/> 
		</form>
	</div>
<!-- END: Register -->
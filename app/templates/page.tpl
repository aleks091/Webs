<!-- BEGIN: site -->
<html>
	<head>
	</head>
	<body>
	
		<div id="header">
		
			<div id = "mainRightMenu">
				<ul class = "HeaderMainNavigationMenu">
					<li> 
						<div class="mainNavigationMenuItem">
							<a href="index.php">Home</a> 
						</div>
					</li>
					<!-- BEGIN: userNotLogged -->
					<li>
						<div class="mainNavigationMenuItem">
							<a href="index.php?section=members&action=LogIn">Log In</a>
						</div>
					</li>
					<li>
						<div class="mainNavigationMenuItem">
							<a href="index.php?section=members&action=Register">Register</a> 
						</div>
					</li>
					<!-- END: userNotLogged -->
					<!-- BEGIN: menuLogInOptions -->
					<li>
						<div class="mainNavigationMenuItem">
							<a href="index.php?section=checkLists&action=GetAllCheckLists">CheckLists</a>
						</div>
					</li>
					<li>
						<div class="mainNavigationMenuItem">
							<a href="index.php?section=members&action=LogOut">Sign Out</a>
						</div>
					</li>
					<!-- END: menuLogInOptions -->
				</ul>
			</div>
		
			 
			
			
			<!-- BEGIN: logindiv -->			
			<div id = "LogInDiv" >
				Welcome: {userName}
			</div>
			<!-- END: logindiv -->
			
		</div>
		
		<div id="body"> 
			{content}
		</div>
		
		<div id = "footer">
			
		</div>		
		
	</body>
	
	<script type="text/javascript" src="app/js/jquery-1.7.2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="app/css/page.css" media="screen"/>
</html>
<!-- END: site -->
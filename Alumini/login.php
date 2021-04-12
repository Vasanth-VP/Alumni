<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
			
		</div>
			<a href="authenticate.php">Sign up</a>
			<div class="topnav-right">

			 <a href="authenticate.php">Need Help?</a>
			
			</div>
		</div>
	</form>


</body>
</html>
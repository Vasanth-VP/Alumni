<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>Complete Profile</h2>
	</div>
	
	<form method="post" action="setpassword.php">

		<?php echo display_error(); ?>
		
		
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" >
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="password_btn">Save</button>
		</div>	
			</form>


</body>
</html>
<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Hindusthan</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Authentication</h2>
	</div>
	
	<form method="post" action="password_fb.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Enter the password</label>
			<input type="text" name="password_fb1" >
		</div>
		<div class="input-group">
			<label>Renter the password</label>
			<input type="text" name="password_fb2" >
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="password_fb_btn">Verify</button>
		</div>
		<p>
			Return to home page? <a href="login.php">Click here</a>
		</p>
	</form>
</body>
</html>
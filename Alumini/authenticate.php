<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Authentication</h2>
	</div>
	
	<form method="post" action="authenticate.php">

		<?php echo display_error(); ?>




		<?php 
		if(!empty($success == 1)) {  
		?>
		<div class="input-group">
			<label>Enter the OTP</label>
			<input type="text" name="otp" >
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="submit_otp">Submit OTP</button>
		<div class="topnav-right-otp">


			 <a href="authenticate.php">Resend OTP?</a>
		<?php
		}else if ($success == 2) {
		    header('location: home.php');
		}
		else {
		?>
		<div class="input-group">
			<label>Register Number</label>
			<input type="text" name="register_number" value="<?php echo $reg_num; ?>">
		</div>
		<div class="input-group">
			<label>Year of passing</label>
			<input type="text" name="year_of_passing" value="<?php echo $year_of_passing; ?>">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="authentication_btn">Verify</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
		<?php }
		?>
	</form>
</body>
</html>
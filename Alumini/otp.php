<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>OTP verification</h2>
	</div>
	
	<form method="post" action="otp.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Enter the OTP</label>
			<input type="text" name="otp" value="">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="submit_otp">Submit OTP</button>
		<div class="topnav-right-otp">


			 <a href="authentication.php">Resend OTP?</a>
			
		</div>
		</div>
	</form>

	</form>
</body>
</html>
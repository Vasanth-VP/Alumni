<?php 
include('../functions.php');
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Admin</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="header">
			<h2>Create User</h2>
		</div>
		
		<form method="post" action="add_user_admin.php">
		<?php echo display_error(); ?>
		
			
			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username_admin" value="<?php echo ""; ?>">
			</div>
			<div class="input-group">
				<label>Register Number</label>
				<input type="text" name="register_number_admin" value="<?php echo ""; ?>">
			</div>
			<div class="input-group">
				<label>Email</label>	
				<input type="email" name="email_admin" value="<?php echo ""; ?>">
			</div>
			
			<div class="input-group">
				<label>Branch</label>
				<input type="text" name="branch_admin" value="<?php echo ""; ?>">
			</div>
			<div class="input-group">
				<label>Year of passing / Joining</label>
				<input type="text" name="year_of_passing_admin" value="<?php echo ""; ?>">
			</div>
			<div class="input-group">
			<label>User type</label>
			<select name="user_type_admin" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">Student</option>
				<option value="user">Staff</option>
			</select>
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="admin_btn">Register</button>
			</div>
			
			<p>
				Return to <a href="first_page_admin.php">Home</a>
			</p>
		</form>
	</body>
	</html>
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
			<h2>Delete User</h2>
		</div>
		
		<form method="post" action="delete.php">
		<?php echo display_error(); ?>
		
			
			<div class="input-group">
				<label>Enter ID to delete</label>
				<input type="text" name="delete_id" value="<?php echo ""; ?>">
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="delete_btn">Delete</button>
			</div>
			
			<p>
				Return to <a href="first_page_admin.php">Home</a>
			</p>
		</form>
	</body>
	</html>

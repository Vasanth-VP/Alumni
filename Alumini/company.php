<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Company</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>Company Details</h2>
	</div>
	
	<form method="post" action="company.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Company</label>
			<input type="text" name="company_name" >
		</div>
		
		<div class="input-group">
			<label>Job Location</label>
			<input type="text" name="job_location">
		</div>
		<div class="input-group">
			<label>Start date</label>
			<input type="date" name="start_date">
		</div>
		<div class="input-group">
			<label>End date</label>
			<input type="date" name="end_date">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="company_btn">Save</button>
			
		</div>
						 <a href="profile_update.php">Profile page</a>
			
			</div>
		</div>
	</form>


</body>
</html>
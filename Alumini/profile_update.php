<?php 
include('functions.php');
if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>

<html>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="profile_style.css" rel="stylesheet" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
table.table-bordered{
    margin-top:20px;
    width:61%;
    font-size:12px;
  }
table.th{
font-size:1%;
  
}
</style>
<body>
<form method="post" action="profile_update.php">

  <div class="main-content">
    <div class="container mt-7">
      <!-- Table -->
      <h2 class="mb-5">Alumini Profile</h2>
      <div class="row">
        <div class="col-xl-8 m-auto order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Update Profile</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="first_page.php" class="btn btn-sm btn-primary">Home</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">Profile information</h6>
                <div class="pl-lg-4">
                  <div class="row">
				  
				  
				  <?php 
                    //profileDetails();
				  global $db,$success,$error_message;
				  $id = $_SESSION['register_number'];
				  $result = mysqli_query($db,"SELECT * FROM user WHERE register_number='". $id . "'");
				  
				  $count  = mysqli_num_rows($result);
				  $user=mysqli_fetch_assoc($result);
				  //$username=$user["name"];
				  
				  //$username= $user["name"];
				  ?>
				  
				  <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Name</label>
                        <input type="text" name="profile_name" class="form-control form-control-alternative" placeholder="Username" value="<?=$user["name"]?>"readonly>
                      </div>
                    </div>
                    
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Register Number</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Register Number" value="<?=$user["register_number"]?>"readonly>
                      </div>
                    </div>
					
					<div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Department</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Department" value="<?=$user["branch"]?>"readonly>
                      </div>
                    </div>
					
					<div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Year of passing</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Year of passing" value="<?=$user["year_of_passing"]?>"readonly>
                      </div>
                    </div>
					
					
					  <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="email" value="<?=$user["email"]?>"readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                   <div class="col-lg-6">
                      <div class="form-group focused">
					  <label class="form-control-label" for="input-last-name">Employement Sector</label>
                        <select name="employement"  class="form-control form-control-alternative">
                        <option value="No values">No values</option>
                        <option value="Government">Government</option>
						<option value="Own Business">Own Business</option>
						<option value="Private">Private</option>
						<option value="Others">Others</option>
						</select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Designation</label>
						<select name="designation"  class="form-control form-control-alternative">
						<option value="No values">No values</option>
                        <option value="Accounting">Accounting</option>
						<option value="Finance">Finance</option>
						<option value="Software Engineer">Software Engineer</option>
						<option value="Human Resources">Human Resources</option>
						<option value="Marketting">Marketting</option>
						<option value="Nursing">Nursing</option>
						<option value="Teaching">Teaching</option>
						</select>
                      </div>
                    </div>
                    
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Current Company</label>
                        <input type="text" name="current_company" class="form-control form-control-alternative" placeholder="Current Company" value="<?=$user["current_company"]?>">
                      </div>
                    </div>
                    
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">State</label>
                        <input type="text" name="profile_state" class="form-control form-control-alternative" placeholder="Home Address" value= "<?=$user["state"]?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" name="profile_city" class="form-control form-control-alternative" placeholder="City" value="<?=$user["city"]?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" name="profile_country" class="form-control form-control-alternative" placeholder="Country" value="<?=$user["country"]?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="number" name="profile_postal" class="form-control form-control-alternative" placeholder="Postal code" value="<?=$user["Postal"]?>">
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn" name="profile_save_btn">Save</button>
				
                <hr class="my-4">
				
				
				
				
				
				
				
				<div class="container">
				<button type="submit" class="btn" name="education_add">Add Company</button>
  
  <h6>Company</h6>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Company</th>
        <th>Company Location</th>
        <th>Start time</th>
        <th>End time</th>
        <th>Delete</th>
       
      </tr>
    </thead>
    <tbody>
      <?php 
      $conn = mysqli_connect("localhost", "root", "", "alumini_management");
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      $cmp_id=$_SESSION['register_number'];
      $sql = "SELECT id, company_name, job_location, job_start_date, job_end_date FROM company_details where company_id=$cmp_id";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              $delete=$row["id"];
             echo "<tr><td>" . $row["company_name"]. "</td><td>" . $row["job_location"] . "</td><td>"
            . $row["job_start_date"]. "</td><td>" . $row["job_end_date"] . "</td><td> <a href='profile_update.php?delete_id=$delete'>Delete</a> </td></tr>";
          }
         
          if (isset($_GET['delete_id']))
          {
              //session_destroy();
              $res_id = $_GET['delete_id'];
               $query = "DELETE from company_details  WHERE id='$res_id'";
              $results = mysqli_query($db, $query);
              
          }
          
          
          echo "</table>";
      } else { echo "0 results"; }
      $conn->close();
      ?>
    </tbody>
  </table>
</div>

<hr class="my-4">

<footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
          
        </div>
      </div>
    </div>
  </footer>
 </form>
  
</body>
</html>
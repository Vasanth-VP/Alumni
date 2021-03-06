<?php include('functions.php') ?>
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
  <div class="main-content">
    <div class="container mt-7">
      <!-- Table -->
      <h2 class="mb-5">View Profile</h2>
      <div class="row">
        <div class="col-xl-8 m-auto order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">View Profile</h3>
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
				  $id1=$_GET['id1'];
				  $result = mysqli_query($db,"SELECT * FROM user WHERE register_number='". $id1 . "'");
				  
				  $count  = mysqli_num_rows($result);
				  $user=mysqli_fetch_assoc($result);
				  
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
                        <select name="employement"  class="form-control form-control-alternative" placeholder="Employement">
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
                        <input type="text" name="profile_state" class="form-control form-control-alternative" placeholder="Home Address" value= "<?=$user["state"]?>"readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" name="profile_city" class="form-control form-control-alternative" placeholder="City" value="<?=$user["city"]?>"readonly>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" name="profile_country" class="form-control form-control-alternative" placeholder="Country" value="<?=$user["country"]?>"readonly>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="number" name="profile_postal" class="form-control form-control-alternative" placeholder="Postal code" value="<?=$user["Postal"]?>"readonly>
                      </div>
                    </div>
                  </div>
                </div>		
				
				
				
				
				
				
				
				<div class="container">
  <h6>Company</h6>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Company</th>
        <th>Job Location</th>
        <th>Start time</th>
        <th>End time</th>
       
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
      $sql = "SELECT company_name, job_location, job_start_date, job_end_date FROM company_details where company_id=$id1";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo "<tr><td>" . $row["company_name"]. "</td><td>" . $row["job_location"] . "</td><td>"
              . $row["job_start_date"]. "</td><td>" . $row["job_end_date"] . "</td></tr>";
          }
          echo "</table>";
      } else { echo "0 results"; }
      $conn->close();
      ?>    </tbody>
  </table>
</div>

<hr class="my-4">

	
	
	
				
				
				
				  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
          
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
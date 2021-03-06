<?php 
include('functions.php');
if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<title>CSS Template</title>

<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>




<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" type="text/css" href="style_new.css">
<link rel="stylesheet" type="text/css" href="filter.css">

</head>
<body>
<form method=post action="first_page.php">
<?php echo display_error();
$id=$_SESSION["register_number"];
//echo $id;
?>
<header>
  <h2>Welcome to Hindusthan Educational Institutions</h2>
  <div class="navbar_home">
  <button class="w3-large">
  <i class="fa fa-home"></i>
    </button>
  
  </div>
  <div class="navbar">
  
  			<div class="dropdown">
    			<button class="dropbtn">
    
   				 <i class="fa fa-user icon"  style="font-size:24px;"></i>
    			 <i class="fa fa-caret-down" style="font-size:20px;"></i>
       				Profile
      			 </button>
      			 
    			<div class="dropdown-content">
      			<a href="profile_update.php?id1=<?=$id ?>">Update</a>
      			<a href="logout.php">Logout</a>
    			</div>
  			</div> 
		</div>
</header>
  
<article>
<p>Search by</p>
<input type="button" name=name_search value="Name" onclick="onButtonClick_name()">
<input type="button" name=name_search value="Register Number" onclick="onButtonClick_rn()">
<input type="button" name=name_search value="Company" onclick="onButtonClick_branch()">
<input type="button" name=name_search value="City" onclick="onButtonClick_city()">
<input type="button" name=name_search value="Employement" onclick="onButtonClick_employement()">
<input type="button" name=name_search value="Designation" onclick="onButtonClick_designation()">

<script >
function onButtonClick_name(){
  document.getElementById('myInput_name').className="show";
  document.getElementById('myInput_rn').className="hide";
  document.getElementById('myInput_branch').className="hide";
  document.getElementById('myInput_city').className="hide";
  document.getElementById('myInput_employement').className="hide";
  document.getElementById('myInput_designation').className="hide";
}
function onButtonClick_rn(){
  document.getElementById('myInput_rn').className="show";
  document.getElementById('myInput_name').className="hide";
  document.getElementById('myInput_branch').className="hide";
  document.getElementById('myInput_city').className="hide";
  document.getElementById('myInput_employement').className="hide";
  document.getElementById('myInput_designation').className="hide";
}
function onButtonClick_branch(){
  document.getElementById('myInput_branch').className="show";
  document.getElementById('myInput_rn').className="hide";
  document.getElementById('myInput_name').className="hide";
  document.getElementById('myInput_city').className="hide";
  document.getElementById('myInput_employement').className="hide";
  document.getElementById('myInput_designation').className="hide";
  
  
}
function onButtonClick_city(){
  document.getElementById('myInput_city').className="show";
  document.getElementById('myInput_rn').className="hide";
  document.getElementById('myInput_name').className="hide";
  document.getElementById('myInput_branch').className="hide";
  document.getElementById('myInput_employement').className="hide";
  document.getElementById('myInput_designation').className="hide";
}
function onButtonClick_employement(){
  document.getElementById('myInput_city').className="hide";
  document.getElementById('myInput_rn').className="hide";
  document.getElementById('myInput_name').className="hide";
  document.getElementById('myInput_branch').className="hide";
  document.getElementById('myInput_employement').className="show";
  document.getElementById('myInput_designation').className="hide";
}
function onButtonClick_designation(){
  document.getElementById('myInput_city').className="hide";
  document.getElementById('myInput_rn').className="hide";
  document.getElementById('myInput_name').className="hide";
  document.getElementById('myInput_branch').className="hide";
  document.getElementById('myInput_employement').className="hide";
  document.getElementById('myInput_designation').className="show";
}

</script>
<input class="hide" type="text" id="myInput_name" onkeyup="myFunction_name()" placeholder="Search for names.." title="Type in a name">
<input class="hide" type="text" id="myInput_rn" onkeyup="myFunction_rn()" placeholder="Search for Register Number.." title="Type in a Register Number">
<input class="hide" type="text" id="myInput_branch" onkeyup="myFunction_branch()" placeholder="Search for Company" title="Type in a Branch">
<input class="hide" type="text" id="myInput_city" onkeyup="myFunction_city()" placeholder="Search for City" title="Type in a City">
<input class="hide" type="text" id="myInput_employement" onkeyup="myFunction_employement()" placeholder="Search for Employement" title="Type in a Employement">
<input class="hide" type="text" id="myInput_designation" onkeyup="myFunction_designation()" placeholder="Search for Designation.." title="Type in a Designation">


<table id="myTable">
  <tr class="header">
    <th style="width:20%;">Name</th>
    <th style="width:20%;">Register Number</th>
    <th style="width:20%;">Current Company</th>
    <th style="width:20%;">City</th>
    <th style="width:20%;">Employement</th>
    <th style="width:20%;">Designation</th>
    <th style="width:20%;">View</th>
  </tr>
  <tbody>
      <?php 
      if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
      } else {
          $pageno = 1;
      }
      $no_of_records_per_page = 10;
      $offset = ($pageno-1) * $no_of_records_per_page;
      
      $conn = mysqli_connect("localhost", "root", "", "alumini_management");
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      $sql = "SELECT register_number FROM user";
      $result = mysqli_query($conn,$sql);
      $total_rows = mysqli_num_rows($result);
      $total_pages = ceil($total_rows / $no_of_records_per_page);
     // echo $total_pages;
      $sql = "SELECT name, register_number, current_company, city, employement_sector, designation FROM user LIMIT $offset, $no_of_records_per_page";
      $res_date = mysqli_query($conn,$sql);
      //$id1=$row["register_number"];
      
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $res_date->fetch_assoc()) {
              $id1=$row["register_number"];
              echo "<tr><td>" . $row["name"]. "</td><td>" . $row["register_number"] . "</td><td>"
              . $row["current_company"]. "</td><td>" . $row["city"] . "</td><td>" . $row["employement_sector"] . "</td><td>" . $row["designation"] . "</td>
<td> <a href='profile.php?id1=$id1'>View More</a> </td></tr>";
          }
          echo "</table>";
      } else { echo "0 results"; }
      $conn->close();
      ?>
      
      <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
      
      
      
      
      
    </tbody>
  
  </table>
  <script>
function myFunction_name() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput_name");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction_rn() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput_rn");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction_branch() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput_branch");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction_city() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput_city");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction_employement() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput_employement");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction_designation() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput_designation");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

</script>
  
</section>
</article>








</form>


</body>


</html>
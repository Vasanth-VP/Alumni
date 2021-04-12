<?php include 'functions.php';?>
<?php
//index.php
function fill_study1()
{
    echo "hai";
    //$db = mysqli_connect('localhost', 'root', '', 'alumini_management');
    $connect = new PDO("mysql:host=localhost;dbname=alumini_management", "root", "");
    $output = '';
    $query = "SELECT * FROM study_field";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        //echo $row["study"];
        $output .= '<option value="'.$row["study"].'">'.$row["study"].'</option>';
        
    }
    return $output;
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Add Remove Select Box Fields Dynamically using jQuery Ajax in PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Add Remove Select Box Fields Dynamically using jQuery Ajax in PHP</h3>
   <br />
   <h4 align="center">Enter Item Details</h4>
   <br />
   <form method="post" id="insert_form" >
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
       <th>School Name</th>
       <th>field of Study</th>
       <th>Start date</th>
       <th>End date</th>
       <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
      </tr>
     </table>
     <div align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Insert" />
     </div>
    </div>
   </form>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><input type="text" name="school[]" class="form-control school" /></td>';
  html += '<td><select name="field_of_study[]" class="form-control field_of_study"><option value="">Select </option><?php echo fill_study1() ?></select></td>';
  html += '<td><input type="date" name="edu_start_date[]" class="form-control edu_start_date" /></td>';
  html += '<td><input type="date" name="edu_end_date[]" class="form-control edu_end_date" /></td>';
  
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
  $('#item_table').append(html);
 });
 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('.school').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter School Name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.edu_start_date').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Education starting date at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.edu_end_date').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Education ending date at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  
  $('.field_of_study').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Field of study at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  
  if(error == '')
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
    console.log(data);
     if(data)
     {
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
     }
    }
   });
  }
  else
  {
    $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });
 
});
</script>
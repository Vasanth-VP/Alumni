<?php include('functions.php') ?>
<?php
//insert.php;

if(isset($_POST["school"]))
{
    suma();
    //echo "hai";
}
function suma() {
      // echo $_POST["school"];
    //echo $_SESSION["user_id"];
    //echo "Hai";
    $connect = new PDO("mysql:host=localhost;dbname=alumini_management", "root", "");
    for($count = 0; $count < count($_POST["school"]); $count++)
    {
        //echo""
        $query = "INSERT INTO education
  (education_id,register_number, school_name, start_date)
  VALUES (:education_id,:register_number, :school_name, :start_date)
  ";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                ':register_number'   =>$_SESSION["register_number"],
                ':education_id'   =>$_SESSION["user_id"],
                ':school_name'  => $_POST["school"][$count],
                ':field_of_study'  => $_POST["field_of_study"][$count],
                ':start_date'  => $_POST["edu_start_date"][$count],
                ':end_date'  => $_POST["edu_end_date"][$count]
            )
            
            );
       
    }
    $result = $statement->fetchAll();
    if(isset($result))
    {
        echo TRUE;
    }
}
?>


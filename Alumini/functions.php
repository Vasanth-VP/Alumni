<?php
session_start();
//$_SESSION['register_number'] =17110067;
//$_SESSION['user_id'] =58;
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'alumini_management');

// variable declaration
$success = "";
$error_message = "";
$reg_num="";
$year_of_passing="";
$username = "";
//$email    = "";
$errors   = array();
$reservation_list = array();




function fill_study()
{
    //echo "hai";
    $db = mysqli_connect('localhost', 'root', '', 'alumini_management');
    //$connect = new PDO("mysql:host=localhost;dbname=alumini_management", "root", "");
    $output = '';
    $result = mysqli_query($db,"SELECT * FROM study_field");
    $statement = mysqli_fetch_assoc($result);
    foreach($statement as $row)
    {
        echo $row["study"];
        //$output .= '<option value="'.$row["study"].'">'.$row["study"].'</option>';
        
    }
    return $output;
}

if(isset($_POST['education_add']))
{
    header("location:company.php");
}

if(isset($_POST['company_btn']))
{
    global $db,$school,$field_of_study,$start_date,$end_date;
    $company = $_POST["company_name"];
    $job_location  =$_POST["job_location"];
    $start_date  = $_POST["start_date"];
    $end_date  = $_POST["end_date"];
    
    if (empty($company)) {
        array_push($errors, "Company name is required");
    }
    if (empty($job_location)) {
        array_push($errors, "Job location is required");
    }
    if (empty($start_date)) {
        array_push($errors, "Start date is required");
    }
      if(!isset($end_date))
    {
        $end_date=NULL;

    }
    $id_num=$_SESSION['register_number'];
    $query = "INSERT INTO company_details (company_id, company_name, job_location, job_start_date,job_end_date)
						  VALUES('$id_num', '$company', '$job_location', '$start_date', '$end_date')";
    mysqli_query($db, $query);
    header("location:profile_update.php");
    
    
    
}



if(isset($_POST['profile_save_btn']))
{
    //header("location:login.php");
    profile_save();
    // $success=1;
}


function profile_save()
{
    global $db;
    $employement_sector    =  e($_POST['employement']);
    $designation = e($_POST['designation']);
    //$employement_sector= e($_POST['employement_sector']);
    $city = e($_POST['profile_city']);
    $state = e($_POST['profile_state']);
    $country=e($_POST['profile_country']);
    $postal_code=e($_POST['profile_postal']);
    $current_company=e($_POST['current_company']);
    //echo $city;
    //echo $designation;
    $id_pro=$_SESSION['register_number'];
     $query= " UPDATE user set designation='$designation',city='$city', employement_sector='$employement_sector', current_company='$current_company',state='$state', postal=$postal_code, country='$country' where register_number=$id_pro";
   // $query1 = "INSERT INTO user (designation, profile_city, employement_sector, state,postal,country)
	//					  VALUES('$designation', '$city', '$employement_sector', '$state', '$postal_code', '$country')";
    mysqli_query($db, $query);
    
}
//Admin register
if(isset($_POST['admin_btn']))
{
    //header("location:login.php");
    add_user_admin();
    // $success=1;
}
function add_user_admin() {
        global $db,$year_of_passing_admin,$register_number_admin,$errors,$email_admin,$branch_admin,$email_admin,$username_admin;
        
        $username_admin    =  e($_POST['username_admin']);
        $register_number_admin    =  e($_POST['register_number_admin']);
        $branch_admin    =  e($_POST['branch_admin']);
        $email_admin    =  e($_POST['email_admin']);
        $year_of_passing_admin    =  e($_POST['year_of_passing_admin']);
        
        
        if (empty($username_admin)) {
            array_push($errors, "Username is required");
        }
        if (empty($register_number_admin)) {
            array_push($errors, "Register Number  is required");
        }
        if (empty($year_of_passing_admin)) {
            array_push($errors, "Year of passing is required");
        }
        
        if (empty($email_admin)) {
            array_push($errors, "email is required");
        }
        if (empty($branch_admin)) {
            array_push($errors, "branch is required");
        }
        
        
        if (count($errors) == 0) {
            if (isset($_POST['user_type_admin'])) {
                $user_type = e($_POST['user_type_admin']);
                $query = "INSERT INTO admin (name, register_number, branch, year_of_passing,email,user_type)
						  VALUES('$username_admin', '$register_number_admin', '$branch_admin', '$year_of_passing_admin', '$email_admin', '$user_type')";
                mysqli_query($db, $query);
                echo " <br/><br/> <p align='center'> <font color=green> SUCCESSFULL !!! </p>";
                
        }
        else 
        {
            array_push($errors, "User type is required");
        }
        
        }
            
}
//Delete user
if(isset($_POST['delete_btn']))
{
    //header("location:login.php");
    delete_user();
    // $success=1;
}
function delete_user() {
    global $db,$delete_id,$errors;
    
    $delete_id    =  e($_POST['delete_id']);
    $query = "DELETE from user  WHERE user_id='$delete_id'";
    $results = mysqli_query($db, $query);
    echo "User id " .$delete_id . " is deleted<br>";
}

//call the authentication function() if authentication_btn is clicked

if(isset($_POST['authentication_btn']))
{
   authentication();
   // $success=1;
}
// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
    register();
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
    login();
}

if (isset($_GET['logout'])) {
}
function logOut()
{
    session_destroy();
    unset($_SESSION['user']);
    header("location:login.php");
}


function authentication() {
    global $db,$year_of_passing,$register_number,$errors;
    
    $register_number    =  e($_POST['register_number']);
    $year_of_passing    =  e($_POST['year_of_passing']);
    
    
    if (empty($register_number)) {
        array_push($errors, "Register Number is required");
    }
    if (empty($year_of_passing)) {
        array_push($errors, "Year of passing  is required");
    }
    
    if (count($errors) == 0) {
        
        $query = "select register_number, year_of_passing from admin where register_number='	".$register_number."' and year_of_passing = '".$year_of_passing."'";
        //echo $query; 
        $results= mysqli_query($db, $query);
        
        if(mysqli_num_rows($results) == 1){
            one_time_password();
            $_SESSION['register_number'] =$_POST["register_number"];
        }
        else 
        {
            array_push($errors, "Wrong register number or Year of passing");
        }
    }
}

function one_time_password() {
    global $db,$success,$error_message;
$result = mysqli_query($db,"SELECT email FROM admin WHERE register_number='". $_POST["register_number"] . "'");
    
    $count  = mysqli_num_rows($result);
    $em=mysqli_fetch_assoc($result);
    $email=$em["email"];
    if($count>0) {
        // generate OTP
        $otp = rand(100000,999999);
        
        $_SESSION['otp'] =$otp;
        // Send OTP
        require_once("mail_function.php");
        $mail_status = sendOTP($email,$otp);
        
        if($mail_status == 1) {
            $result = mysqli_query($db,"INSERT INTO otp_expiry(otp,is_expired,create_at,register_number) VALUES ('" . $otp . "', 0,   now(), '". $_POST["register_number"] . "')");
            $current_id = mysqli_insert_id($db);
            if(!empty($current_id)) {
                $success=1;
            }
            
        }
        else
        {
            echo "Something wrong";
        }
    }
}

if(isset($_POST['submit_otp'])) {
    otp_check();
}
function otp_check()
{
    
    global $db;
     $one=e($_POST['otp']);
    $result = mysqli_query($db,"SELECT * FROM otp_expiry WHERE otp='" . $_POST["otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR) AND register_number='".  $_SESSION['register_number']."'"  );
    $count  = mysqli_fetch_assoc($result);
    if($count>0) {
        $result = mysqli_query($db,"UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
        $success = 2;
        header('location: setPassword.php');
    } else {
        $success =1;
        echo $error_message = "Invalid OTP!";
        $result = mysqli_query($db,"UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" .$_SESSION['otp']  . "'");
    }
}

if(isset($_POST['password_btn']))
{
    setPassword();
}

function setPassword()
{
    global $db, $errors;
    
    // receive all input values from the form
    $password_1  =  e($_POST['password_1']);
    $password_2  =  e($_POST['password_2']);
   // echo $password_1;
   // echo $password_2;
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
   // array_push($errors,"aukgv");
    if (count($errors) == 0)
    {
    $password = md5($password_1);//encrypt the password before saving in the database
   // print_r($password);
    $query = "SELECT id,register_number ,name, branch, year_of_passing, email FROM admin WHERE register_number= '" .$_SESSION['register_number']. "'";
    $results= mysqli_query($db, $query);
    $row=mysqli_fetch_assoc($results);
    $query_insert = "INSERT INTO user (user_id, name,email,branch, year_of_passing,register_number,password) VALUES(".$row['id'].",'". $row['name'] ."','".$row['email']."','".$row['branch']."',".$row['year_of_passing'].",".$row['register_number'].",'$password')";
    echo $query_insert;
    mysqli_query($db,$query_insert);
   header('location: login.php');
    }
}





function educationDetails()
{
    global $db, $errors;
    $school= e($_POST['school']);
    $field_of_study= e($_POST['field_of_study']);
    $edu_start_date= e($_POST['edu_start_date']);
    $edu_end_date= e($_POST['edu_end_school']);
    
    if (empty($school)) {
        array_push($errors, "School is required");
    }
    
    if (empty($field_of_study)) {
        array_push($errors, "Field of Study is required");
    }
    
    if (empty($edu_start_date)) {
        array_push($errors, "School start date  is required");
    }
    if ($edu_start_date <= $edu_end_date) {
        array_push($errors, "Incorrect");
    }
    if (count($errors) == 0)
    {
        echo"HAI";
    }
}


// REGISTER USER
function register(){
    global $db, $errors;
    
    // receive all input values from the form
    $username    =  e($_POST['username']);
    $email       =  e($_POST['email']);
    $password_1  =  e($_POST['password_1']);
    $password_2  =  e($_POST['password_2']);
    
    // form validation: ensure that the form is correctly filled
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
    // user duplication login starts here
    
    $query = "select email from users where email='	".$email."'";
    $results = mysqli_query($db, $query);
    
    if (mysqli_num_rows($results) >= 1) {
        array_push($errors, "Email is already exist");
    }
    
    // user duplication login stops here
    
    
    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
        
        if (isset($_POST['user_type'])) {
            $user_type = e($_POST['user_type']);
            $query = "INSERT INTO users (username, email, user_type, password)
						  VALUES('$username', '$email', '$user_type', '$password')";
            mysqli_query($db, $query);
            $_SESSION['success']  = "New user successfully created!!";
            header('location: home.php');
        }else{
            $query = "INSERT INTO users (username, email, user_type, password)
						  VALUES('$username', '$email', 'user', '$password')";
            mysqli_query($db, $query);
            
            // get id of the created user
            $logged_in_user_id = mysqli_insert_id($db);
            
            $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
            $_SESSION['success']  = "You are now logged in";
            header('location: index.php');
        }
        
    }
    
}

// return user array from their id
function getUserById($id){
    global $db;
    $query = "SELECT * FROM users WHERE id=" . $id;
    $result = mysqli_query($db, $query);
    
    $user = mysqli_fetch_assoc($result);
    return $user;
}

// LOGIN USER
function login(){
    global $db, $email, $errors;
    
    // grap form values
    $email = e($_POST['email']);
    $password = e($_POST['password']);
    
    // make sure form is filled properly
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    
    // attempt login if no errors on form
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
        $results = mysqli_query($db, $query);
        
        if (mysqli_num_rows($results) == 1) { // user found
            // check if user is admin or user   
            $query1 = "SELECT register_number FROM user WHERE email='$email'LIMIT 1";
            $results1 = mysqli_query($db, $query1);
            $end=mysqli_fetch_assoc($results1);
            $_SESSION['id']= $end["user_id"];
            $_SESSION['register_number']= $end["register_number"];
                $_SESSION['user'] = 'user';
                $_SESSION['success']  = "You are now logged in";
                header('location: first_page.php');
            }
            else 
            {
                array_push($errors,"User not found ");
            }
    }
        else 
        {
            array_push($errors, "Wrong username/password combination");
        }
    
}

function isLoggedIn()
{
    if (isset($_SESSION['user'])) {
        return true;
    }else{
        return false;
    }
}

function isAdmin()
{
    if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
        return true;
    }else{
        return false;
    }
}

// escape string
function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
    global $errors;
    
    if (count($errors) > 0){
        echo '<div class="error">';
        foreach ($errors as $error){
            echo $error .'<br>';
        }
        echo '</div>';
    }
}






//date submit
/*
 * 
 * function login(){
    global $db, $email, $errors;
    
    // grap form values
    $email = e($_POST['email']);
    $password = e($_POST['password']);
    
    // make sure form is filled properly
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    
    // attempt login if no errors on form
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
        $results = mysqli_query($db, $query);
        
        if (mysqli_num_rows($results) == 1) { // user found
            // check if user is admin or user
            $logged_in_user = mysqli_fetch_assoc($results);
            if ($logged_in_user['user_type'] == 'admin') {
                
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "You are now logged in";
                header('location: admin/home.php');
            }else{
                $_SESSION['user'] = $logged_in_user;
                echo $_SESSION['user'];
                $_SESSION['success']  = "You are now logged in";
                
                header('location: index.php');
            }
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * if (isset($_POST['date_submit']))
 {
 do_reservation();
 }
 
 // GETTING DATE
 function do_reservation()
 {
 global $db;
 $res_date   =e($_POST['res_date']);
 //isset($_SESSION['user'])
 $username 	=$_SESSION['user']['username'];
 print_r($username);
 //$query = "INSERT INTO users (username, email, user_type, password)
 //			  VALUES('$username', '$email', '$user_type', '$password')";
 $query = "INSERT INTO reservation (username,res_date)
 VALUES('$username','$res_date')";
 mysqli_query($db, $query);
 echo "APPOINTMENT SUCCESSFULL !!!";
 //get_reservation();
 
 }
 
function get_reservation(){
    global $db, $reservation_list;
    $username 	=$_SESSION['user']['username'];
    
    $query = "SELECT id,username,res_date FROM reservation WHERE username='$username'";
    $results = mysqli_query($db, $query);
    
    if (mysqli_num_rows($results) >= 1)
    { // user found
        // check if user is admin or user
        
        while ($row = mysqli_fetch_assoc($results)) {
            //printf("ID: %s  Date: %s</br>", $row['username'], $row['res_date']);
            //print_r("<br>");
            //print_r($row);
            array_push($reservation_list,array($row['id'],$row['res_date']));
        }
        
        //mysql_free_result($results);
        
    }
    
}

function display_reservation() {
    global $reservation_list;
    get_reservation();
    
    if (count($reservation_list) > 0){
        echo '<div class="error">';
        foreach ($reservation_list as $res){
            //echo $res .'<br>';
        }
        echo '</div>';
    }
}


//delete the data from db








*/




?>
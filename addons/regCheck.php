<?php
session_abort();
    //  Include freqently used code
include("dbHandle.php");
var_dump($_POST);
    //  Starts the session
session_start();
   
    //  Copy post values to session
$_SESSION["fname"] = $_POST["fname"];
$_SESSION["lname"] = $_POST["lname"];
$_SESSION["email"] = $_POST["email"];
$_SESSION["date"] = $_POST["date"];
$_SESSION["psw"] = $_POST["psw"];
$_SESSION["profile"] = $_POST["profile"];

    // Creates the session me
$_SESSION["msg"];

    //  Assign to variables
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$name = $fname." ".$lname;

$email = $_SESSION["email"];
$dob = $_SESSION["date"];
$psw = $_SESSION["psw"];
$profile = $_SESSION["profile"];

$available = userAvailabilityCheck($email, $psw);

    //  Empty Check
if(($fname != null && $lname != null) && ($email != null && $dob != null) && ($psw != null && $profile != null)){

        //  Availability Check
    if($available){
        $_SESSION["msg"] = "This user is aleady exist. Please try a differennt username.";
        header("Location: ../index.php");
    }
    else{
        addUser($email, $psw, $name, $dob, $profile);
        $_SESSION["msg"] = "You Are Registered.";
        header("Location: ../index.php");
    }
}else{
    $_SESSION["msg"] = "Please fill all the fields.";
    header("Location: ../index.php");
}
?>
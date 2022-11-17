<?php

    //  Include freqently used code
include("dbHandle.php");
//session_destroy();
    //  Starts the session
session_start();
  
    //  Copy post values to session
$_SESSION["username"] = $_POST["username"];
$_SESSION["password"] = $_POST["password"];

$_SESSION["msg"] = "Test";

    //  Assign to variables
$user = $_SESSION["username"];
$pass = $_SESSION["password"];

$_SESSION["profile"] = profilePath($user);
$available = userAvailabilityCheck($user, $pass);

    //  Empty Check
if($user != null && $pass != null){

        //  Availability Check
    if($available){
        $_SESSION["msg"] = "Logged in successfully.";
        header("Location : ../index.php");
    }
    else{
        $_SESSION["msg"] = "Username and Password doesn't match.";
        header("Location : ../index.php");
    }
}else{
    $_SESSION["msg"] = "Please fill all fields";
    header("Location : ../index.php");
}
?>
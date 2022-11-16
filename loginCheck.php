<?php
    //  Include freqently used code
include("dbHandle.php");

    //  Starts the session
session_start();
   
    //  Copy post values to session
$_SESSION["username"] = $_POST["username"];
$_SESSION["password"] = $_POST["password"];

    //  Assign to variables
$user = $_SESSION["username"];
$pass = $_SESSION["password"];

$available = userAvailabilityCheck($user, $pass);

    //  Empty Check
if($user != null && $pass != null){

        //  Availability Check
    if($available){
        echo "Available";
    }
    else{
        echo "Not Available";
    }
}else{
    echo "Please fill all fields";
}
session_destroy();
?>
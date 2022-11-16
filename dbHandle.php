<?php
//  Check user availability
function userAvailabilityCheck(string $usr, string $psw){

    $servername = "localhost";
    $username = "test";
    $password = "test";
    $dbname = "starmeapp";

        // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

        //  Query
    $sql = "SELECT userID, username, password FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        //  If user available
        while($row = $result->fetch_assoc()) {
            if($usr == $row["username"] && $row["password"]){
                return true;
            }
        }
    } else {

        return false;
    }
    $conn->close();

}
?>
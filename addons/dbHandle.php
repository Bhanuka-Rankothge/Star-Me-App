<?php

    //  Check user availability
function userAvailabilityCheck(string $usr, string $psw){

    $servername = "localhost";
    $username = "test";
    $password = "test";
    $dbname = "starme";

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
    //  Add user to database
function addUser(string $usr, string $psw, string $name, string $dob, string $profile){

    $servername = "localhost";
    $username = "test";
    $password = "test";
    $dbname = "starme";

        // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (username, password, name, dob, profile)
    VALUES ('$usr', '$psw', '$name', '$dob', '$profile')";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

    //  Upload profile picture to the drive
function uploadPhoto(string $directory, string $htmlTagName){
    
    $target_dir = $directory;
    $target_file = $target_dir . basename($_FILES["$htmlTagName"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["$htmlTagName"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

        // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }   

        // Check file size
    if ($_FILES["$htmlTagName"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

        // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

        // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["$htmlTagName"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["$htmlTagName"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
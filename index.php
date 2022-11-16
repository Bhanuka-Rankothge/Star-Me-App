<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Starme Login and Registration</title>
</head>
<body>

<!-- Start Login Form -->

<h3> Login Form </h3>

<form action = "loginCheck.php" method = "post" name = "login">
	Email : <input type = "text" name = "username"/><br/>
	Password : <input type = "password" name = "password"/><br/>
	<input type = "submit" value = "Login"/><br/><br/>
</form>

<!-- End of the Login form -->

<hr/>

<!-- Start Registration Form -->

<h3> Registration Form </h3>
<form action = "regCheck.php" method = "post" name = "registration">
	First Name : <input type = "text" name = "fname"/><br/>
	Last Name : <input type = "text" name = "lname"/><br/>
	Email (username) : <input type = "text" name = "email"/><br/>
	Date of birth : <input type = "date" name = "lname"/><br/> 
	Password : <input type = "password" name = "psw"/></br>
	Contact No : <input type = "number" name ="contact"/><br/>
	Profile Picture : <input type = "file" name = "profile"><br/>
	<input type = "submit" value = "Register as a user"><br/>
</form>

<!-- End of the Registration Form-->
</body>
</html>
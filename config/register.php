<?php
/**
 * Start the session.
 */
session_start();

/**
 * Include our MySQL connection.
 */
$pdo = new PDO( "sqlsrv:Server=localhost;Database=aarjocar", "sa", "password1" );


//If the POST var "register" exists (our submit button), then we can
//assume that the user has submitted the registration form.
if(isset($_POST['register'])){

	//Retrieve the field values from our registration form.
	$username = !empty($_POST['username']) ? trim($_POST['username']) : null;
	$pass = !empty($_POST['password']) ? trim($_POST['password']) : null;

	//TO ADD: Error checking (username characters, password length, etc).
	//Basically, you will need to add your own error checking BEFORE
	//the prepared statement is built and executed.

	//Now, we need to check if the supplied username already exists.

	//Construct the SQL statement and prepare it.
	$sql = "SELECT COUNT(username) AS num FROM users WHERE username = :username";
	$stmt = $pdo->prepare($sql);


	//Bind the provided username to our prepared statement.
	$stmt->bindValue(':username', $username);

	//Execute.
	$stmt->execute();

	//Fetch the row.
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	print_r( $row );

	//If the provided username already exists - display error.
	//TO ADD - Your own method of handling this error. For example purposes,
	//I'm just going to kill the script completely, as error handling is outside
	//the scope of this tutorial.
	if($row['num'] > 0){
		die('That username already exists!');
	}

	//Hash the password as we do NOT want to store our passwords in plain text.
	$passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));

//	print_r( $passwordHash );

	//Prepare our INSERT statement.
	//Remember: We are inserting a new row into our users table.
	$sql = "INSERT INTO users (username, password) VALUES ($username, $passwordHash)";
	$stmt = $pdo->exec($sql);

//	print_r( $stmt );

//	//Bind our variables.
//	$stmt->bindValue(':username', $username);
//	$stmt->bindValue(':password', $passwordHash);

	//Execute the statement and insert the new account.
//	$result = $stmt->execute();

	print_r( $stmt );


	//If the signup process is successful.
	if($stmt){
		//What you do here is up to you!
		echo 'Thank you for registering with our website.';
	}else {
		echo 'Niet gelukt';
		print_r($stmt);
	}
}else {
	echo 'niks gedaan';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Register</title>
</head>
<body>
<h1>Register</h1>
<form action="register.php" method="post">
	<label for="username">Username</label>
	<input type="text" id="username" name="username"><br>
	<label for="password">Password</label>
	<input type="text" id="password" name="password"><br>
	<input type="submit" name="register" value="Register"></button>
</form>
</body>
</html>
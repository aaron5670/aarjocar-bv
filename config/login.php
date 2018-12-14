<?php
/**
 * Start de session.
 */
session_start();

/**
 * Database connectie
 */
try {
	$pdo = new PDO( "sqlsrv:Server=localhost;Database=aarjocar;ConnectionPooling=0", "sa", "password1" );
	$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch ( PDOException $e ) {
	echo "Er ging iets mis met de database.<br>";
	echo "De melding is {$e->getMessage()}";
}


//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.
if(isset($_POST['login'])){

	//Retrieve the field values from our login form.
	$username = !empty($_POST['username']) ? trim($_POST['username']) : null;
	$passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

	//Retrieve the user account information for the given username.
	$sql = "SELECT id, username, password FROM users WHERE username = :username";
	$stmt = $pdo->prepare($sql);

	//Bind value.
	$stmt->bindValue(':username', $username);

	//Execute.
	$stmt->execute();

	//Fetch row.
	$user = $stmt->fetch(PDO::FETCH_ASSOC);

	print_r($user);

	//Hash the password as we do NOT want to store our passwords in plain text.
	$passwordHash = password_hash($user['password'], PASSWORD_BCRYPT, array("cost" => 12));

	//If $row is FALSE.
	if($user === false){
		//Could not find a user with that username!
		//PS: You might want to handle this error in a more user-friendly manner!
		die('Username not found');
	} else{
		//User account found. Check to see if the given password matches the
		//password hash that we stored in our users table.

		//Compare the passwords.
		$validPassword = password_verify($passwordAttempt, $passwordHash);

		//If $validPassword is TRUE, the login has been successful.
		if($validPassword){

			//Provide the user with a login session.
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['logged_in'] = time();

			//Redirect to our protected page, which we called home.php
			header('Location: index.php');
			exit;

		} else{
			//$validPassword was FALSE. Passwords do not match.
			die('Password do not match');
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<form action="login.php" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username"><br>
    <label for="password">Password</label>
    <input type="text" id="password" name="password"><br>
    <input type="submit" name="login" value="Login">
</form>
</body>
</html>
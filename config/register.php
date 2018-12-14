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

if ( isset( $_POST['register'] ) ) {

	//Haalt de gegevens op van het formulier
	$username = ! empty( $_POST['username'] ) ? trim( $_POST['username'] ) : null;
	$pass     = ! empty( $_POST['password'] ) ? trim( $_POST['password'] ) : null;

	//Maakt een SQL query
	$sql  = "SELECT COUNT( username ) AS num FROM users WHERE username = :username";
	$stmt = $pdo->prepare( $sql );

	//Pakt de gebruikersnaam
	$stmt->bindValue( ':username', $username );

	//Execute.
	$stmt->execute();

	//Fetch de rij.
	$row = $stmt->fetch( PDO::FETCH_ASSOC );


	//Controleert of de gebruikersnaam al bestaat. Bestaat die, killt die het script.
	if ( $row['num'] > 0 ) {
		die( 'Gebruikersnaam bestaat al.' );
	}

	//Hash het wachtwoord (veiligheid)
	$passwordHash = password_hash( $pass, PASSWORD_BCRYPT, array( "cost" => 12 ) );

	//Insert de gegevens in de database
	$pdo->query( "INSERT INTO users( username, password ) values( '$username', '$passwordHash' )" );

	//If the signup process is successful.
	if ( $stmt ) {
		//What you do here is up to you!
		echo 'Geregistreerd!';
	} else {
		echo 'Niet gelukt';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF - 8">
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
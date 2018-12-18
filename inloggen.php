<?php
include 'includes/header.php';

if ( isset( $_SESSION['user_id'] ) ) {
	header( 'location: ' . $url );
}

if ( $_GET['succes'] ) {
	$message = 'U bent succesvol geregistreerd!';
	print_r($_GET);
}

//database connectie
require_once 'config/connect.php';

//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.
if ( isset( $_POST['login'] ) ) {

	//Retrieve the field values from our login form.
	$username        = ! empty( $_POST['username'] ) ? trim( $_POST['username'] ) : null;
	$passwordAttempt = ! empty( $_POST['password'] ) ? trim( $_POST['password'] ) : null;

	//Retrieve the user account information for the given username.
	$sql  = "SELECT id, username, password FROM users WHERE username = :username";
	$stmt = $pdo->prepare( $sql );

	//Bind value.
	$stmt->bindValue( ':username', $username );

	//Execute.
	$stmt->execute();

	//Fetch row.
	$user = $stmt->fetch( PDO::FETCH_ASSOC );

	print_r( $user );

	//If $row is FALSE.
	if ( $user === false ) {
		//Could not find a user with that username!
		//PS: You might want to handle this error in a more user-friendly manner!
		$message = 'Gebruikersnaam niet gevonden';
	} else {
		//User account found. Check to see if the given password matches the
		//password hash that we stored in our users table.

		//Compare the passwords.
		$validPassword = password_verify( $passwordAttempt, $user['password'] );

		//If $validPassword is TRUE, the login has been successful.
		if ( $validPassword ) {

			//Provide the user with a login session.
			$_SESSION['user_id']  = $user['id'];
			$_SESSION['username'] = $user['username'];

			//Redirect to our protected page, which we called home.php
			header( 'Location: beheerpaneel' );
			exit;

		} else {
			//$validPassword was FALSE. Passwords do not match.
			$message = 'Wachtwoord is incorrect';
		}
	}
}
?>
    <main class="sectie-main">
        <div class="sectie-inner">
            <form action="inloggen.php" method="post">
                <div class="inlog-formulier">
					<?php
					if ( isset( $message ) ) {
						echo '<h1>' . $message . '</h1>';
					}
					?>
                    <label for="username"><b>Gebruikersnaam</b></label>
                    <input type="text" placeholder="Vul hier uw Gebruikersnaam in" id="username" name="username"
                           required>

                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Vul hier uw wachtwoord in" id="password" name="password"
                           required>
                    <label>
                        Bent u nog niet geregisteerd? Klik dan <a href="registreren.php">hier</a>!
                    </label>
                    <div class="button-container">
                        <input class="inlogknop" type="submit" name="login" value="Login">
                    </div>
                </div>
            </form>
        </div>

    </main>
<?php include 'includes/footer.php' ?>
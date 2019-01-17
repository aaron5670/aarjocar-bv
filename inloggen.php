<?php
include 'includes/header.php';

if ( isset( $_SESSION['user_id'] ) ) {
	header( 'location: ' . $url );
}

if ( $_GET['succes'] ) {
	$message = 'U bent succesvol geregistreerd!';
}

//database connectie
require_once 'config/connect.php';

if ( isset( $_POST['login'] ) ) {

	$username        = ! empty( $_POST['username'] ) ? trim( $_POST['username'] ) : null;
	$passwordAttempt = ! empty( $_POST['password'] ) ? trim( $_POST['password'] ) : null;

	$sql  = "SELECT * FROM users WHERE username = :username";
	$stmt = $pdo->prepare( $sql );

	$stmt->bindValue( ':username', $username );

	$stmt->execute();

	$user = $stmt->fetch( PDO::FETCH_ASSOC );


	if ( $user === false ) {
		$message = 'Gebruikersnaam niet gevonden';
	} else {
		$validPassword = password_verify( $passwordAttempt, $user['password'] );

		if ( $validPassword ) {

			$_SESSION['user_id']   = $user['id'];
			$_SESSION['user_role'] = $user['user_role'];
			$_SESSION['username']  = $user['username'];
			$_SESSION['firstname'] = $user['firstname'];
			$_SESSION['lastname']  = $user['lastname'];

			header( 'Location: beheerpaneel' );
			exit;
		} else {
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
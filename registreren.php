<?php
include 'includes/header.php';

if ( isset( $_SESSION['user_id'] ) ) {
	header( 'location: ' . $url );
}

//database connectie
require_once 'config/connect.php';

if ( isset( $_POST['register'] ) ) {
	$firstname = ! empty( $_POST['firstname'] ) ? trim( $_POST['firstname'] ) : null;
	$lastname  = ! empty( $_POST['lastname'] ) ? trim( $_POST['lastname'] ) : null;
	$email     = ! empty( $_POST['email'] ) ? trim( $_POST['email'] ) : null;
	$username  = ! empty( $_POST['username'] ) ? trim( $_POST['username'] ) : null;
	$pass      = ! empty( $_POST['password'] ) ? trim( $_POST['password'] ) : null;

	//Maakt een SQL query
	$sql  = "SELECT COUNT( username ) AS num FROM users WHERE username = :username";
	$stmt = $pdo->prepare( $sql );

	//Pakt de gebruikersnaam
	$stmt->bindValue( ':username', $username );

	//Execute.
	$stmt->execute();

	//Fetch de rij.
	$row = $stmt->fetch( PDO::FETCH_ASSOC );

	//Controleert of de gebruikersnaam al bestaat.
	if ( $row['num'] > 0 ) {
		$message = 'Gebruikersnaam bestaat al.';
	} else {
		//Hash het wachtwoord (veiligheid)
		$passwordHash = password_hash( $pass, PASSWORD_BCRYPT, array( "cost" => 12 ) );

		//Insert de gegevens in de database
		$pdo->query( "INSERT INTO users( username, password, firstname, lastname, email ) values( '$username', '$passwordHash', '$firstname', '$lastname', '$email' )" );

		//als het gelukt is
		if ( $stmt ) {
			header( 'Location: ' . $url . 'inloggen.php?succes=true' );
		} else {
			$message = 'Er is iets niet goed gegaan...';
		}
	}
}
?>
    <main class="sectie-main">
        <div class="sectie-inner">
            <form action="registreren.php" method="post">
                <div class="inlog-formulier">
					<?php
					if ( isset( $message ) ) {
						echo '<h1>' . $message . '</h1>';
					}
					?>
                    <label for="firstname"><b>Voornaam</b></label>
                    <input type="text" placeholder="Vul hier uw voornaam in" name="firstname" id="firstname" required>

                    <label for="lastname"><b>Achternaam</b></label>
                    <input type="text" placeholder="Vul hier uw achternaam in" name="lastname" id="lastname" required>

                    <label for="email"><b>E-mailadres</b></label>
                    <input type="text" placeholder="Vul hier uw E-mailadres in" name="email" id="email" required>

                    <label for="username"><b>Gebruikersnaam</b></label>
                    <input type="text" placeholder="Vul hier uw Gebruikersnaam in" name="username" id="username"
                           autofocus required>

                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Vul hier uw wachtwoord in" name="password" id="password"
                           required>

                    <label>
                        Bent u al geregisteerd? Klik dan <a href="inloggen.php">hier</a>!
                    </label>
                    <div class="button-container">
                        <input class="inlogknop" type="submit" name="register" value="Register">
                    </div>
                </div>
            </form>
        </div>

    </main>
<?php include 'includes/footer.php' ?>
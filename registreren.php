<?php
include 'includes/header.php';

if (isset($_SESSION['user_id'])) {
	header('location: ' . $url);
}

//database connectie
require_once 'config/connect.php';

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

	//als het gelukt is
	if ( $stmt ) {
		$message = 'U bent succesvol geregistreerd!';
	} else {
		$message = 'Er is iets niet goed gegaan...';
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
                    <label for="username"><b>Gebruikersnaam</b></label>
                    <input type="text" placeholder="Vul hier uw Gebruikersnaam in" name="username" id="username"
                           autofocus required>
                    <!--                    <label><b>Voornaam</b></label>-->
                    <!--                    <input type="text" placeholder="Vul hier uw voornaam in" name="voornaam" required>-->
                    <!--                    <label><b>Achternaam</b></label>-->
                    <!--                    <input type="text" placeholder="Vul hier uw achternaam in" name="achternaam" required>-->
                    <!--                    <label><b>E-mailadres</b></label>-->
                    <!--                    <input type="text" placeholder="Vul hier uw E-mailadres in" name="E-mailadres" required>-->
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
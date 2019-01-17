<?php include '../config/config.php';
require_once '../config/connect.php';
include 'beheer_config/config.php'; ?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AARJO Car BV</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $url; ?>favicon.ico">
</head>
<body>
<?php
include 'includes/menu.php';
if ( isset( $_POST['submit'] ) ) {
	//Haalt de gegevens op van het formulier
	if ( ! empty( $_POST['rubriek'] ) ) {
		$rubriek = $_POST['rubriek'];
	} else {
		$message = 'Rubriek mag niet leeg zijn!';
	}
	$omschrijving = ! empty( $_POST['omschrijving'] ) ? trim( $_POST['omschrijving'] ) : null;

	if ( ! isset( $message ) ) {
		$data = [
			'rubriek'      => $rubriek,
			'omschrijving' => $omschrijving,
		];

		//Maakt een SQL query om te checken of de rubriek nog niet bestaat
		$sql  = "SELECT COUNT( rubriek ) AS num FROM rubrieken WHERE rubriek = :rubriek";
		$stmt = $pdo->prepare( $sql );

		//Pakt de gebruikersnaam
		$stmt->bindValue( ':rubriek', $rubriek );

		//Execute.
		$stmt->execute();

		//Fetch de rij.
		$row = $stmt->fetch( PDO::FETCH_ASSOC );

		//Controleert of de rubriek al bestaat.
		if ( $row['num'] > 0 ) {
			$message = 'Rubriek bestaat al...';
		} else {
			$sql  = "INSERT INTO rubrieken (rubriek, omschrijving) VALUES (:rubriek, :omschrijving)";
			$stmt = $pdo->prepare( $sql );
			$stmt->execute( $data );

			header( 'Location: forum.php?succes=true' );
		}
	}
}
?>
<div class="formulier-beheerpaneel-videos">
    <h1>Rubriek toevoegen</h1>
	<?php
	if ( isset( $message ) ) {
		echo '<p>' . $message . '</p>';
	}
	?>
    <form action="rubriek-toevoegen.php" method="post">
        <div class="formulier-videos">
            <label for="rubriek">Rubrieknaam</label>
            <input type="text" id="rubriek" name="rubriek">

            <label for="omschrijving">Rubriek omschrijving</label>
            <textarea id="omschrijving" name="omschrijving"></textarea>

            <input type="submit" name="submit" value="Toevoegen">
        </div>
    </form>
</div>
</body>
</html>
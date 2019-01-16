<?php
include '../../config/config.php';
require_once '../../config/connect.php';
include '../beheer_config/config.php';

if ( isset( $_GET['id'] ) ) {
	$_SESSION['id'] = $_GET['id'];
	$id             = $_SESSION['id'];
} else {
	header( 'location: index.php' );
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AARJO Car BV</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $url; ?>favicon.ico">
</head>
<body>
<?php
include '../includes/menu.php';
if ( isset( $_POST['submit'] ) ) {
	//Haalt de gegevens op van het formulier
	if ( ! empty( $_POST['rubriek'] ) ) {
		$rubriek = $_POST['rubriek'];
	} else {
		$message = 'Rubriek mag niet leeg zijn!';
	}
	$omschrijving = ! empty( $_POST['omschrijving'] ) ? trim( $_POST['omschrijving'] ) : null;
	$id           = $_SESSION['id'];

	$data = [
		'rubriek'      => $rubriek,
		'omschrijving' => $omschrijving,
		'id'           => $id
	];

	// Update statement
	$sql  = "UPDATE rubrieken SET rubriek=:rubriek, omschrijving=:omschrijving WHERE id = :id";
	$stmt = $pdo->prepare( $sql );
	$stmt->execute( $data );

	header( 'Location: index.php?id=' . $id . '&succes=true' );
}
?>

<div class="formulier-beheerpaneel-videos">
    <h1>Rubriek toevoegen</h1>
    <form action="rubriek-aanpassen.php" method="post">
		<?php
		$stmt = $pdo->prepare( "SELECT * FROM rubrieken WHERE id=:id" );
		$stmt->execute( [ 'id' => $id ] );
		$value = $stmt->fetch();
		?>
        <div class="formulier-videos">
            <label for="rubriek">Rubrieknaam</label>
            <input type="text" id="rubriek" name="rubriek" value="<?= $value['rubriek'] ?>">

            <label for="omschrijving">Rubriek omschrijving</label>
            <textarea id="omschrijving" name="omschrijving"><?= $value['omschrijving'] ?></textarea>

            <input type="submit" name="submit" value="Toevoegen">
        </div>
    </form>
</div>
</body>
</html>
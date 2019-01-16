<?php include '../config/config.php';
require_once '../config/connect.php';
include 'beheer_config/config.php'; ?>

<?php
if ( isset( $_GET['pageId'] ) ) {
	$_SESSION['pageId'] = $_GET['pageId'];
	$id                 = $_SESSION['pageId'];
} else {
	header( 'location: overons.php' );
}

if ( isset( $_GET['succes'] ) == true ) {
	$message = 'Gelukt, alles opgeslagen!';
}
?>

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
<?php include 'menu/menu.php';
if ( isset( $_POST['submit'] ) ) {

	//Haalt de gegevens op van het formulier
	$titel = ! empty( $_POST['titel'] ) ? trim( $_POST['titel'] ) : null;
	$tekst = ! empty( $_POST['tekst'] ) ? trim( $_POST['tekst'] ) : null;
	$id    = $_SESSION['pageId'];

	$tekst = base64_encode( $tekst );

	// update page_content query
	$pdo->query( "UPDATE page_content SET titel = '$titel', tekst = '$tekst' WHERE pageId = '$id'" );

	header( 'Location: overons-aanpassen.php?pageId=' . $id . '&succes=true' );
}

?>
<div class="formulier-beheerpaneel-videos">
	<?php
	if ( isset( $_GET['succes'] ) ) {
		echo '<h1>' . $message . '</h1>';
	}
	?>
    <form action="overons-aanpassen.php" method="post">
		<?php $row = $pdo->query( "SELECT * FROM page_content WHERE pageId = '$id'" );
		$value     = ( $row->fetch() ); ?>
        <div class="formulier-videos">

            <label for="titel">Titel</label>
            <input type="text" id="titel" name="titel" value="<?= $value['titel']; ?>"><br>

            <label for="tekst">Tekst</label>
            <textarea id="tekst" name="tekst"><?= base64_decode( $value['tekst'] ); ?></textarea><br>

            <input type="submit" name="submit" value="Updaten">
        </div>
    </form>
</div>
</body>
</html>
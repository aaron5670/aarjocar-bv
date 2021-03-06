<?php
include '../config/config.php';
require_once '../config/connect.php';
include 'beheer_config/config.php';

if ( isset( $_GET['id'] ) ) {
	$_SESSION['id'] = $_GET['id'];
	$pageId         = $_SESSION['id'];
} else {
	header( 'location: forum.php' );
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
<?php
include 'includes/menu.php';
if ( isset( $_POST['submit'] ) ) {
	//Haalt de gegevens op van het formulier
	$data = [
		'titel'  => $_POST['titel'],
		'tekst'  => $_POST['tekst'],
		'pageId' => $_SESSION['id']
	];

	// Update statement
	$sql  = "UPDATE content SET titel=:titel, tekst=:tekst WHERE page_id = :pageId";
	$stmt = $pdo->prepare( $sql );
	$stmt->execute( $data );

	header( 'Location: overons-aanpassen.php?id=' . $_SESSION['id'] . '&succes=true' );
}
?>
<div class="formulier-beheerpaneel-videos">
	<?php
	if ( isset( $_GET['succes'] ) ) {
		echo '<h1>' . $message . '</h1>';
	}
	?>
    <form action="overons-aanpassen.php" method="post">
		<?php
		$stmt = $pdo->prepare( "SELECT * FROM content WHERE page_id=:pageId" );
		$stmt->execute( [ 'pageId' => $pageId ] );
		$value = $stmt->fetch();
		?>
        <div class="formulier-videos">
            <label for="titel">Titel</label>
            <input type="text" id="titel" name="titel" value="<?= $value['titel']; ?>"><br>

            <label for="tekst">Tekst</label>
            <textarea id="tekst" name="tekst"
                      placeholder="<?= $value['tekst']; ?>"><?= $value['tekst']; ?></textarea><br>

            <input type="submit" name="submit" value="Updaten">
        </div>
    </form>
</div>
</body>
</html>
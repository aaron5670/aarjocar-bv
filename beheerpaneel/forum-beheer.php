<?php include '../config/config.php';
require_once '../config/connect.php';
include 'beheer_config/config.php';
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
<?php include 'includes/menu.php' ?>
<?php
$row = $pdo->query( "SELECT * FROM rubrieken" );
?>
<div class="gebruiker-tabel">
    <a href="rubriek-toevoegen.php">Rubriek toevoegen</a>
	<?php
	if ( isset( $_GET['succes'] ) == true ) {
		echo '<p>Actie succesvol gelukt!</p>';
	}
	?>
    <table>
        <tr>
            <th>ID</th>
            <th>Rubriek</th>
            <th>Omschrijving</th>
            <th>Aanpassen</th>
            <th>Verwijderen</th>
        </tr>
		<?php
		while ( $value = ( $row->fetch() ) ) {
			?>
            <tr>
                <td><?= $value['id']; ?></td>
                <td><?= $value['rubriek']; ?></td>
                <td><?= $value['omschrijving']; ?></td>
                <td><a href="rubriek-aanpassen.php?id=<?= $value['id'] ?>">Aanpassen</a></td>
                <td><a href="beheer_config/delete-rubriek.php?deleteRubriek&id=<?= $value['id'] ?>">Verwijderen</a></td>
            </tr>
			<?php
		}
		?>
    </table>
</div>
</body>
</html>
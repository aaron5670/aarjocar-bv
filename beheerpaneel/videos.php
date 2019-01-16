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
$row = $pdo->query( "SELECT * FROM page_iframe ORDER BY categorie" );
?>
<div class="gebruiker-tabel">
    <table>
        <tr>
            <th>ID</th>
            <th>iFrame-url</th>
            <th>titel</th>
            <th>Omschrijving</th>
            <th>Categorie</th>
            <th>Actie</th>
        </tr>
		<?php
		while ( $value = ( $row->fetch() ) ) {
			?>
            <tr>
                <td><?= $value['id']; ?></td>
                <td><?= $value['iframe_url']; ?></td>
                <td><?= $value['titel']; ?></td>
                <td><?= $value['omschrijving']; ?></td>
                <td><?= $value['categorie']; ?></td>
                <td><a href="video-aanpassen.php?id=<?= $value['id'] ?>">Aanpassen</a></td>
            </tr>
			<?php
		}
		?>
    </table>
</div>

</body>
</html>
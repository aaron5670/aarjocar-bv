<?php include '../../config/config.php';
require_once '../../config/connect.php';
include '../beheer_config/config.php';
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
<?php include '../includes/menu.php' ?>
<?php
$row = $pdo->query("SELECT * FROM rubrieken");
?>
<div class="gebruiker-tabel">
    <table>
        <tr>
            <th>ID</th>
            <th>Rubriek</th>
            <th>Omschrijving</th>
        </tr>
		<?php
		while ($value = ($row->fetch())) {
			?>
            <tr>
                <td><?= $value['id']; ?></td>
                <td><?= $value['rubriek']; ?></td>
                <td><?= $value['omschrijving']; ?></td>
            </tr>
			<?php
		}
		?>
    </table>
</div>
</body>
</html>
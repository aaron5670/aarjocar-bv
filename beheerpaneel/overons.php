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
<?php include 'includes/menu.php';
$stmt = $pdo->query( "SELECT * FROM page_content" );
?>
<div class="gebruiker-tabel">
    <table>
        <tr>
            <th>pageId</th>
            <th>Titel</th>
            <th>Tekst</th>
        </tr>
        <?php
        while ( $value = ( $stmt->fetch() ) ) {
            ?>
            <tr>
                <td><?= $value['pageId']; ?></td>
                <td><?= $value['titel']; ?></td>
                <td><?= $value['tekst']; ?></td>
                <td><a href="overons-aanpassen.php?id=<?= $value['pageId'] ?>">Aanpassen</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>?>
</body>
</html>
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
$stmt = $pdo->query("SELECT * FROM posts INNER JOIN rubrieken r on posts.rubriek = r.id");
?>
<div class="gebruiker-tabel">
    <table>
        <tr>
            <th>ID</th>
            <th>Rubriek</th>
            <th>userid</th>
            <th>post_titel</th>
            <th>post_omschrijving</th>
            <th>gemaakt_op</th>
        </tr>
        <?php
        while ($value = ($stmt->fetch())) {
            ?>
            <tr>
                <td><?= $value['id']; ?></td>
                <td><?= $value['rubriek']; ?></td>
                <td><?= $value['userid']; ?></td>
                <td><?= $value['post_titel']; ?></td>
                <td><?= $value['post_omschrijving']; ?></td>
                <td><?= $value['gemaakt_op']; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
</body>
</html>
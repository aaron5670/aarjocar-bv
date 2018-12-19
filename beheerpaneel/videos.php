<?php include '../config/config.php';
require_once '../config/connect.php';
include 'beheer_config/config.php';?>
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
if (isset($_POST['submit'])) {
//Haalt de gegevens op van het formulier
    $iframeurl = !empty($_POST['iframe_url']) ? trim($_POST['iframe_url']) : null;
    $titel = !empty($_POST['titel']) ? trim($_POST['titel']) : null;
    $omschrijving = !empty($_POST['omschrijving']) ? trim($_POST['omschrijving']) : null;
    $kenmerk = !empty($_POST['kenmerk']) ? trim($_POST['kenmerk']) : null;

// update page_content query
    $pdo->query("UPDATE page_iframe SET iframe_url = '$iframeurl', titel = '$titel',
                                            omschrijving = '$omschrijving', kenmerk = '$kenmerk'");

}
$row = $pdo->query("SELECT * FROM page_iframe");
$value = ($row->fetch());

?>
<div class="formulier-beheerpaneel">
    <form action="videos.php" method="post">
        <label for="iframe_url">iframe url</label>
        <input type="text" id="iframe_url" name="iframe_url" value="<?= $value['iframe_url']; ?>"><br>

        <label for="titel">Titel</label>
        <input type="text" id="titel" name="titel" value="<?= $value['titel']; ?>"><br>

        <label for="omschrijving">omschrijving</label>
        <textarea id="omschrijving" name="omschrijving"><?= $value['omschrijving']; ?></textarea><br>

        <label for="kenmerk">kenmerk</label>
        <input type="text" id="kenmerk" name="kenmerk" value="<?= $value['kenmerk']; ?>"><br>

        <input type="submit" name="submit" value="Updaten">
    </form>
</div>
</body>
</html>
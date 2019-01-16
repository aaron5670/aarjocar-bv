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
<?php include 'includes/menu.php';
if (isset($_POST['submit'])) {

//Haalt de gegevens op van het formulier
    $titel = !empty($_POST['titel']) ? trim($_POST['titel']) : null;
    $tekst = !empty($_POST['tekst']) ? trim($_POST['tekst']) : null;
    $tekst = base64_encode($tekst);

// update page_content query
    $pdo->query("UPDATE page_content SET titel = '$titel', tekst = '$tekst' WHERE pageId = 1");
}

$row = $pdo->query("SELECT * FROM page_content WHERE pageId = 1");
$value = ($row->fetch());

?>


<div class="formulier-beheerpaneel">
    <form action="home.php" method="post">
        <label for="titel">Titel</label>
        <input type="text" id="titel" name="titel" value="<?= $value['titel']; ?>"><br>

        <label for="tekst">Tekst</label>
        <textarea id="tekst" name="tekst"><?= base64_decode($value['tekst']); ?></textarea><br>

        <input type="submit" name="submit" value="Updaten">
    </form>
</div>
</body>
</html>
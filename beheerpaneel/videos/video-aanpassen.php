<?php
include '../../config/config.php';
require_once '../../config/connect.php';
include '../beheer_config/config.php';

if (isset($_GET['id'])) {
    $_SESSION['id'] = $_GET['id'];
    $id = $_SESSION['id'];
} else {
    header('location: index.php');
}

if (isset($_GET['succes']) == true) {
    $message = 'Gelukt, alles opgeslagen!';
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
if (isset($_POST['submit'])) {
    //Haalt de gegevens op van het formulier
    $iframeurl = !empty($_POST['iframe_url']) ? trim($_POST['iframe_url']) : null;
    $titel = !empty($_POST['titel']) ? trim($_POST['titel']) : null;
    $omschrijving = !empty($_POST['omschrijving']) ? trim($_POST['omschrijving']) : null;
    $categorie = !empty($_POST['categorie']) ? trim($_POST['categorie']) : null;
    $id = $_SESSION['id'];

    $data = [
        'iframe_url' => $iframeurl,
        'titel' => $titel,
        'omschrijving' => $omschrijving,
        'categorie' => $categorie,
        'id' => $id
    ];

    // Update statement
    $sql = "UPDATE page_iframe SET iframe_url=:iframe_url, titel=:titel, omschrijving=:omschrijving, categorie=:categorie WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    header('Location: video-aanpassen.php?id=' . $id . '&succes=true');
}
?>
<div class="formulier-beheerpaneel-videos">
    <?php
    if (isset($_GET['succes'])) {
        echo '<h1>' . $message . '</h1>';
    }
    ?>
    <form action="video-aanpassen.php" method="post">
        <?php
        $stmt = $pdo->prepare("SELECT * FROM page_iframe WHERE id=:id");
        $stmt->execute(['id' => $id]);
        $value = $stmt->fetch();
        ?>
        <div class="formulier-videos">
            <label for="iframe_url">iframe url</label>
            <input type="text" id="iframe_url" name="iframe_url" value="<?= $value['iframe_url']; ?>"><br>

            <label for="titel">Titel</label>
            <input type="text" id="titel" name="titel" value="<?= $value['titel']; ?>"><br>

            <label for="omschrijving">omschrijving</label>
            <textarea id="omschrijving" name="omschrijving"><?= $value['omschrijving']; ?></textarea><br>

            <label for="categorie">categorie</label>
            <select id="categorie" name="categorie">
                <?php $stmt = $pdo->query("SELECT * FROM categorieen");
                while ($value = $stmt->fetch()) { ?>
                    <option value="<?= $value['categorie']; ?>"><?= $value['categorie']; ?></option>
                <?php } ?>
            </select>

            <input type="submit" name="submit" value="Updaten">
        </div>
    </form>
</div>
</body>
</html>
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
<?php include 'includes/menu.php';
if (isset($_POST['submit'])) {
    $data = [
        'titel' => $_POST['titel'],
        'tekst' => $_POST['tekst']
    ];
// update page_content query
    $sql = "UPDATE content SET titel = :titel, tekst = :tekst WHERE page_id = 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
}
$row = $pdo->query("SELECT * FROM content WHERE page_id = 1");
$value = ($row->fetch());
?>
<div class="formulier-beheerpaneel">
    <form action="home.php" method="post">
        <label for="titel">Titel</label>
        <input type="text" id="titel" name="titel" value="<?= $value['titel']; ?>"><br>

        <label for="tekst">Tekst</label>
        <textarea id="tekst" name="tekst"><?= $value['tekst']; ?></textarea><br>

        <input type="submit" name="submit" value="Updaten">
    </form>
</div>
</body>
</html>
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
?>
<div class="formulier-beheerpaneel-videos">
    <?php $row = $pdo->query("SELECT * FROM page_iframe");
    while ($value = ($row->fetch())) { ?>
        <div class="formulier-videos">
            <a href="video-aanpassen.php?id=<?= $value['id'] ?>">LInk</a>
        </div>
    <?php } ?>
</div>
</body>
</html>
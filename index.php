<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AARJO Car BV</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
<?php include 'includes/header.php' ?>
<main class="sectie-main">
    <div class="sectie-inner">
        <div class="content-tekst">
            <?php
            require_once 'config/connect.php';

            $row = $pdo->query("SELECT titel FROM page_content WHERE pageId = 1");
            $valuetitel = ($row->fetch(PDO::FETCH_ASSOC));

            $row = $pdo->query("SELECT tekst FROM page_content WHERE pageId = 1");
            $valuetekst = ($row->fetch(PDO::FETCH_ASSOC));
            ?>

            <h1><?= $valuetitel['titel']; ?></h1>
            <p>
                <?= base64_decode($valuetekst['tekst']); ?>
            </p>
        </div>
        <div class="content-forum-items">
            <h1>Lees hier de meest recente forum berichten!</h1>
            <div class="forum-item">
                <h2>Standaard automaat op elke BMW!</h2>
                <p>
                    De BMW Steptronic automaat is onmisbaar geworden voor het rijplezier van BMW. Daarom nu
                    tijdelijk
                    standaard een automaat op elke BMW.
                </p>
            </div>
            <div class="forum-item">
                <h2>BMW 5 serie!</h2>
                <p>
                    Uw BMW 5 Serie wordt nog aantrekkelijker met de Steptronic automaat. Efficiënter, sportiever en
                    vooral slimmer. Want dankzij de geavanceerde koppeling met alle andere systemen in uw auto,
                    schakelt
                    de Steptronic automatisch naar de settings die optimaal zijn voor uw situatie.
                </p>
            </div>
            <div class="forum-item">
                <h2>De nieuwe audio Q8!</h2>
                <p>
                    De nieuwe Audi Q8 biedt alles waar Audi bekend om staat: een expressief design, toonaangevende
                    techniek en de kunst om ook de meest veeleisende mensen tevreden te stellen. Zijn sportieve
                    uiterlijk borduurt voort op de lijnen van de oer-quattro en verwijst met de nieuwe octagonale
                    Singleframe-grille tevens naar de toekomst.
                </p>
            </div>
        </div>
    </div>
    <div class="sectie-inner">
        <div class="video-home-container">



            <iframe class="video-home" height="315"
                    src="https://www.youtube-nocookie.com/embed/Cw_zy60o8j0?controls=0"
                    allowfullscreen></iframe>

            <iframe class="video-home" height="315"
                    src="https://www.youtube-nocookie.com/embed/DrUVMdkb4_k?controls=0"
                    allowfullscreen></iframe>

            <iframe class="video-home" height="315"
                    src="https://www.youtube-nocookie.com/embed/lRzIWRLWZgM?controls=0"
                    allowfullscreen></iframe>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>
</body>
</html>
<?php
if (strpos($_SERVER['REQUEST_URI'], 'submenu_paginas') == true) {
    include '../config/config.php';
} elseif (strpos($_SERVER['REQUEST_URI'], 'forum/') == true) {
    include '../config/config.php';
} elseif (strpos($_SERVER['REQUEST_URI'], 'video/') == true) {
    include '../config/config.php';
} elseif (strpos($_SERVER['REQUEST_URI'], 'forum/discussies/') == true) {
    include 'config/config.php';
} else {
    include 'config/config.php';
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" itemprop="content" property="content">
    <link rel="stylesheet" type="text/css" href="<?= $url; ?>css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $url; ?>favicon.ico">
    <title>AARJO Car BV</title>
</head>
<header class="sectie-main" id="header-main">
    <div class="sectie-inner">
        <div class="logo">
            <a href="<?= $url; ?>index.php">
                <img src="<?= $url; ?>images/logo.png" alt>
            </a>
        </div>
        <?php
        if (isset($_SESSION['user_id'])) {
            ?>
            <div class="inloggen">
                <a href="<?= $url; ?>logout.php">
                    Uitloggen
                </a>
                <p>Welkom <?= $_SESSION['firstname'] ?></p>
            </div>
            <?php
        } else {
            ?>
            <div class="inloggen">
                <a href="<?= $url; ?>inloggen.php">
                    Inloggen
                </a>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="sectie-inner">
        <ul id="nav">
            <li>
                <a href="<?= $url; ?>index.php">
                    Home
                </a>
            </li>
            <li>
                <a href="<?= $url; ?>video.php">
                    Video's
                </a>
            </li>
            <li>
                <a href="<?= $url; ?>forum.php">
                    Forum
                </a>
            </li>
            <li>
                <a href="<?= $url; ?>overons.php">
                    Over ons
                </a>
            </li>
        </ul>
    </div>
</header>
<div class="container-header-foto">
    <img class="hoofdfoto" src="<?= $url; ?>images/hoofdfoto-3.png" alt>
    <div class="hoofdfoto-dark-overlay"></div>
    <div class="schuin-balk-container">
        <div class="schuin-balk-links"></div>
        <div class="schuin-balk-rechts"></div>
    </div>
</div>
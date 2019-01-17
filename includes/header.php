<?php
if ( strpos( $_SERVER['REQUEST_URI'], 'forum/' ) == true ) {
	include '../config/config.php';
} elseif ( strpos( $_SERVER['REQUEST_URI'], 'video/' ) == true ) {
	include '../config/config.php';
} else {
	include 'config/config.php';
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <title>AARJO Car BV</title>
</head>
<header class="sectie-main" id="header-main">
    <div class="sectie-inner">
        <div class="logo">
            <a href="index.php">
                <img src="images/logo.png" alt>
            </a>
        </div>
		<?php
		if ( isset( $_SESSION['user_id'] ) ) {
			?>
            <div class="inloggen">
                <a href="logout.php">
                    Uitloggen
                </a>
                <p>Welkom <?= $_SESSION['firstname'] ?></p>
            </div>
			<?php
		} else {
			?>
            <div class="inloggen">
                <a href="inloggen.php">
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
                <a href="index.php">
                    Home
                </a>
            </li>
            <li>
                <a href="video.php">
                    Video's
                </a>
            </li>
            <li>
                <a href="forum.php">
                    Forum
                </a>
            </li>
            <li>
                <a href="overons.php">
                    Over ons
                </a>
            </li>
        </ul>
    </div>
</header>
<div class="container-header-foto">
    <img class="hoofdfoto" src="images/hoofdfoto-3.png" alt>
    <div class="hoofdfoto-dark-overlay"></div>
    <div class="schuin-balk-container">
        <div class="schuin-balk-links"></div>
        <div class="schuin-balk-rechts"></div>
    </div>
</div>
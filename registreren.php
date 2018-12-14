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
<header class="sectie-main" id="header-main">
    <div class="sectie-inner">
        <div class="logo">
            <a href="index.php">
                <img src="images/logo.png" alt>
            </a>
        </div>
        <div class="inloggen">
            <a href="inloggen.php">
                Inloggen
            </a>
        </div>
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
                <a href="Overons.php">
                    Over ons
                </a>
            </li>
        </ul>
    </div>
</header>
<main class="sectie-main">
    <div class="container-header-foto">
        <img class="hoofdfoto" src="images/hoofdfoto-3.png" alt>
        <div class="hoofdfoto-dark-overlay"></div>
        <div class="schuin-balk-container">
            <div class="schuin-balk-links"></div>
            <div class="schuin-balk-rechts"></div>
        </div>
    </div>
    <div class="sectie-inner">
        <form>
            <div class="inlog-formulier">
                <label><b>Gebruikersnaam</b></label>
                <input type="text" placeholder="Vul hier uw Gebruikersnaam in" name="Gebruikersnaam" required>
                <label><b>Voornaam</b></label>
                <input type="text" placeholder="Vul hier uw voornaam in" name="voornaam" required>
                <label><b>Achternaam</b></label>
                <input type="text" placeholder="Vul hier uw achternaam in" name="achternaam" required>
                <label><b>E-mailadres</b></label>
                <input type="text" placeholder="Vul hier uw E-mailadres in" name="E-mailadres" required>
                <label><b>Password</b></label>
                <input type="password" placeholder="Vul hier uw wachtwoord in" name="wachtwoord" required>
                <label>
                    Bent u al geregisteerd? Klik dan <a href="inloggen.php">hier</a>!
                </label>
                <div class="button-container">
                    <button type="button" class="inlogknop">Registreren</button>
                </div>
            </div>
        </form>
    </div>

</main>
<footer class="sectie-main">
    <div class="sectie-inner">
        <div class="footer-kolom">
            Gemaakt door - Joris Nijkamp - 20 jaar
        </div>
        <div class="footer-kolom">
            Gemaakt door - Aaron van den Berg - 20 jaar
        </div>
    </div>
</footer>
</body>
</html>
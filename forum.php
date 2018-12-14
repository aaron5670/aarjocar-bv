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
                <ul class="submenu">
                    <li>
                        <a href="submenu_paginas/motorauto.php">Motor auto</a>
                    </li>
                    <li>
                        <a href="submenu_paginas/componentenauto.php">Componenten auto</a>
                    </li>
                    <li>
                        <a href="submenu_paginas/tipsfeitjes.php">Tips & Feitjes</a>
                    </li>
                </ul>
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
        <div class="content-forum-tekst">
            <h1>AARJO Car Forum</h1>
        </div>

        <div class="table-container" role="table" aria-label="Destinations">
            <div class="flex-table header" role="rowgroup">
                <div class="flex-row first">Categorieën</div>
                <div class="flex-row">Discussies</div>
                <div class="flex-row">Berichten</div>
                <div class="flex-row">Laatste</div>
            </div>
            <div class="flex-table row" role="rowgroup">
                <div class="flex-row first">
                    <a href="forum/algemeen.php"><span class="forum-span-title"> Algemeen</span></a><br/>
                    Auto-gerelateerde zaken die niet in een andere categorie passen.
                </div>
                <div class="flex-row">23</div>
                <div class="flex-row">54</div>
                <div class="flex-row">18-11-2018 21:05</div>
            </div>
            <div class="flex-table row" role="rowgroup">
                <div class="flex-row first">
                    <a href="forum/tuning.php"><span class="forum-span-title"> Tuning</span></a><br/>
                    Opvoeren, chiptuning, spoilers, verlagen, etc.
                </div>
                <div class="flex-row">65</div>
                <div class="flex-row">104</div>
                <div class="flex-row">18-11-2018 21:05</div>
            </div>
            <div class="flex-table row" role="rowgroup">
                <div class="flex-row first">
                    <a href="forum/nieuwe-autos.php"><span class="forum-span-title"> Nieuwe auto's</span></a><br/>
                    Meningen over nieuwe auto's.
                </div>
                <div class="flex-row">33</div>
                <div class="flex-row">53</div>
                <div class="flex-row">18-11-2018 21:05</div>
            </div>
            <div class="flex-table row" role="rowgroup">
                <div class="flex-row first">
                    <a href="forum/autosport.php"><span class="forum-span-title"> Autosport</span></a><br/>
                    Formule 1, WRC, Le Mans, karten, etc.
                </div>
                <div class="flex-row">39</div>
                <div class="flex-row">77</div>
                <div class="flex-row">18-11-2018 21:05</div>
            </div>
            <div class="flex-table row" role="rowgroup">
                <div class="flex-row first">
                    <a href="forum/autotainment.php"><span class="forum-span-title"> Autotainment</span></a><br/>
                    Over audio, navigatie en alle overige soorten entertainment in de auto.
                </div>
                <div class="flex-row">13</div>
                <div class="flex-row">46</div>
                <div class="flex-row">18-11-2018 21:05</div>
            </div>
        </div>

    </div>
</main>
<footer class="sectie-main">
    <div class="sectie-inner">
        <div class="footer-kolom">
            Gemaakt door - Joris Nijkamp - 20 jaar
        </div>
        <div class="footer-kolom">
            Gemaatk door - Aaron van den Berg - 20 jaar
        </div>
    </div>
</footer>
</body>
</html>
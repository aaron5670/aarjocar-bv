<?php include 'includes/header.php' ?>
    <main class="sectie-main">
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
<?php include 'includes/footer.php' ?>
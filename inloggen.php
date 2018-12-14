<?php include 'includes/header.php' ?>
<main class="sectie-main">
    <div class="sectie-inner">
        <form>
            <div class="inlog-formulier">
                <label><b>Gebruikersnaam</b></label>
                <input type="text" placeholder="Vul hier uw Gebruikersnaam in" name="Gebruikersnaam" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="Vul hier uw wachtwoord in" name="wachtwoord" required>
                <label>
                    Bent u nog niet geregisteerd? Klik dan <a href="registreren.php">hier</a>!
                </label>
                <div class="button-container">
                    <button type="button" class="inlogknop">Inloggen</button>
                </div>
            </div>
        </form>
    </div>

</main>
<?php include 'includes/footer.php' ?>
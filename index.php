<?php include 'includes/header.php' ?>
<main class="sectie-main">
    <div class="sectie-inner">
        <div class="content-tekst">
            <?php
            require_once 'config/connect.php';
            $stmt = $pdo->query("SELECT * FROM content WHERE page_id = 1");
            $value = ($stmt->fetch());
            ?>
            <h1><?= $value['titel']; ?></h1>
            <p>
                <?= $value['tekst']; ?>
            </p>
        </div>
        <div class="content-forum-items">
            <h1>Lees hier de meest recente forum berichten!</h1>
            <?php $stmt = $pdo->query("SELECT TOP 3  * FROM posts ORDER BY gemaakt_op DESC");
            while ($value = $stmt->fetch()) { ?>
                <div class="forum-item">
                    <h2><?= $value['post_titel']; ?></h2>
                    <p>
                        <?= $value['post_omschrijving']; ?>
                    </p>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="sectie-inner">
        <div class="video-home-container">
            <?php
            $stmt = $pdo->query("SELECT TOP 3 * FROM page_iframe ORDER BY publicatiedatum DESC");
            while ($valueiframe = ($stmt->fetch())) {

                ?>
                <iframe class="video-home" height="315"
                        src="<?= $valueiframe['iframe_url']; ?>"
                        allowfullscreen></iframe>
                <?php

            } ?>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>
</body>
</html>
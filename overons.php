<?php include 'includes/header.php';
require_once 'config/connect.php'; ?>
    <main class="sectie-main">
        <div class="sectie-inner">
            <div class="informatie-bouwers">
                <?php $row = $pdo->query("SELECT * FROM page_content WHERE pageId = 2");
                $value = ($row->fetch()) ?>
                <div class="informatie-jorisaaron">
                    <h1><?= $value['titel']; ?></h1>
                    <p>
                        <?= base64_decode($value['tekst']); ?>
                    </p>
                    <img src="images/joris.jpg" alt>
                </div>
                <div class="informatie-jorisaaron">
                    <?php $row = $pdo->query("SELECT * FROM page_content WHERE pageId = 3");
                    $value = ($row->fetch()) ?>
                    <h1><?= $value['titel']; ?></h1>
                    <p>
                        <?= base64_decode($value['tekst']); ?>
                    </p>
                    <img src="images/aaron.jpg" alt>
                </div>
            </div>
        </div>

    </main>
<?php include 'includes/footer.php' ?>
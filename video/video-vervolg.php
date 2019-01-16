<?php
require_once '../config/connect.php';
include '../includes/header.php';
if (isset($_GET['id'])) {
    $_SESSION['id'] = $_GET['id'];
    $id = $_SESSION['id'];
} else {
    header('location: index.php');
}
$stmt = $pdo->query("SELECT * FROM page_iframe");
$value = $stmt->fetch(); ?>
    <div class="sectie-main">
        <div class="sectie-inner">
            <div class="video-vervolg-container">
                <h1><?= $value['titel']; ?></h1>
                <div class="video">

                    <iframe height="70%" src="<?= $value['iframe_url']; ?>"
                            allowfullscreen></iframe>
                </div>
                <div class="omschrijving">
                    <h2>Omschrijving video</h2>
                    <?= $value['omschrijving']; ?>
                </div>
                <div class="publicatiedatum">
                    <h2>Gepubliceerd op:</h2>
                    <?= $value['publicatiedatum']; ?>
                </div>
            </div>
        </div>
    </div>
<?php include '../includes/footer.php'; ?>
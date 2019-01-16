<?php include 'includes/header.php';
require_once 'config/connect.php';
?>

    <main class="sectie-main">
        <div class="sectie-inner">

            <form action="" method="post">
                <label class="filter-menu-label" for="filter">Filter hier de filmpjes</label>
                <select id="categorie" name="categorie" class="filter-menu">
                    <option value=""></option>
                    <?php $stmt = $pdo->query("SELECT * FROM categorieen"); ?>
                    <?php while ($valuefilter = ($stmt->fetch())) { ?>
                        <option value="<?= $valuefilter['categorie']; ?>"><?= $valuefilter['categorie']; ?></option>
                    <?php } ?>
                </select>
                <input class="filter-menu" type="submit" name="submit" value="filteren">
            </form>
            <div class="informatie-videos-container">
                <?php
                if (isset($_POST['submit'])) {
                    $stmt = $pdo->prepare("select * from page_iframe WEHRE categorie = ?");
                    $stmt->execute([$_GET['categorie']]);
                    while ($value = ($stmt->fetch())) {
                        ?>
                        <div class="informatie-videos">
                            <h1><?= $value['titel']; ?></h1>
                            <p>
                                <?= $value['omschrijving']; ?>
                            </p>
                            <iframe height="315" src="<?= $value['iframe_url']; ?>"
                                    allowfullscreen></iframe>
                        </div>
                        <?php
                    }
                } else {
                    $stmt = $pdo->query("SELECT * FROM page_iframe");
                    while ($value = ($stmt->fetch())) {
                        ?>
                        <div class="informatie-videos">
                            <h1><?= $value['titel']; ?></h1>
                            <p>
                                <?= $value['omschrijving']; ?>
                            </p>
                            <iframe height="315" src="<?= $value['iframe_url']; ?>"
                                    allowfullscreen></iframe>
                        </div>
                    <?php }
                } ?>
            </div>
    </main>
<?php include 'includes/footer.php' ?>
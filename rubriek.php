<?php
require_once 'config/connect.php';
include 'includes/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    //header( 'location: forum.php' );
    $id = NULL;
}
$rubriekdata = [
    'id' => $id,
];

$sql = 'SELECT * FROM rubrieken WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute($rubriekdata);
$rubriek = $stmt->fetch();
?>
    <main class="sectie-main">
        <div class="sectie-inner">
            <div class="content-forum-tekst">
                <h1><?= $rubriek['rubriek'] ?></h1>
                <p>
                    <?= $rubriek['omschrijving'] ?>
                </p>
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo '<a href="post-aanmaken.php?id=' . $rubriek['id'] . '">Post toevoegen</a>';
                }
                ?>
            </div>

            <form class="container-zoeken-opties-forum" action="rubriek.php" method="post">

                <label for="zoekwoord" class="filter-menu-label-forum">Zoeken op trefwoord</label>
                <label for="orderen" class="filter-menu-label-forum">Sorteren</label>
                <input type="text" class="filter-menu-forum" name="zoekwoord" id="zoekwoord" placeholder="Zoek hier">


                <select id="orderen" name="orderen" class="filter-menu-forum">
                    <option value="ASC">Oudste</option>
                    <option value="DESC">Nieuwste</option>
                </select>

                <div class="opvul-filter-knop">
                    <input class="filter-menu-submit" type="submit" name="submit" value="filteren">
                </div>
            </form>

            <div class="table-container" role="table" aria-label="Destinations">
                <div class="flex-table header" role="rowgroup">
                    <div class="flex-row-vervolg-forum first">Posts</div>
                    <div class="flex-row-vervolg-forum">Geposts op</div>
                </div>
                <?php
                if (isset($_POST['submit'])) {
                    $data = [
                        'zoekwoord' => '%' . $_POST['zoekwoord'] . '%',
                    ];
                    $orderen = $_POST['orderen'];

                    $sql = "SELECT * FROM posts WHERE post_titel LIKE :zoekwoord ORDER BY gemaakt_op $orderen";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute($data);
                } else {
                    $postdata = [
                        'id' => $id
                    ];

                    $sql = 'SELECT * FROM posts WHERE rubriek = :id';
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute($rubriekdata);
                }

                while ($post = $stmt->fetch()) {
                    ?>
                    <div class="flex-table row" role="rowgroup">
                        <div class="flex-row-vervolg-forum first">
                            <a href="post.php?id=<?= $post['id'] ?>">
                                <span class="forum-span-title"> <?= $post['post_titel'] ?></span></a>
                        </div>
                        <div class="flex-row-vervolg-forum"><?= $post['gemaakt_op'] ?></div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </main>
<?php include 'includes/footer.php' ?>
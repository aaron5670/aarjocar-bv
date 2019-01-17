<?php
require_once '../config/connect.php';
include '../includes/header.php';

if ( isset( $_GET['id'] ) ) {
	$id = $_GET['id'];
} else {
	header( 'location: index.php' );
}
$rubriekdata = [
	'id' => $id,
];

$sql  = 'SELECT * FROM rubrieken WHERE id = :id';
$stmt = $pdo->prepare( $sql );
$stmt->execute( $rubriekdata );
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
				if ( isset( $_SESSION['user_id'] ) ) {
					echo '<a href="post-aanmaken.php?id=' . $rubriek['id'] . '">Post toevoegen</a>';
				}
				?>
            </div>

            <div class="table-container" role="table" aria-label="Destinations">
                <div class="flex-table header" role="rowgroup">
                    <div class="flex-row-vervolg-forum first">Onderwerp</div>
                    <div class="flex-row-vervolg-forum">Bekeken</div>
                    <div class="flex-row-vervolg-forum">Berichten</div>
                    <div class="flex-row-vervolg-forum">Aangemaakt op</div>
                </div>
				<?php
				$postdata = [
					'id' => $id
				];

				$sql  = 'SELECT * FROM posts WHERE rubriek = :id';
				$stmt = $pdo->prepare( $sql );
				$stmt->execute( $rubriekdata );
				while ( $post = $stmt->fetch() ) {
					?>
                    <div class="flex-table row" role="rowgroup">
                        <div class="flex-row-vervolg-forum first">
                            <a href="post.php?id=<?= $post['id'] ?>">
                                <span class="forum-span-title"> <?= $post['post_titel'] ?></span></a>
                        </div>
                        <div class="flex-row-vervolg-forum"><?= $post['keer_bekeken'] ?></div>
                        <div class="flex-row-vervolg-forum">0</div>
                        <div class="flex-row-vervolg-forum"><?= $post['gemaakt_op'] ?></div>
                    </div>
				<?php } ?>
            </div>

        </div>
    </main>
<?php include '../includes/footer.php' ?>
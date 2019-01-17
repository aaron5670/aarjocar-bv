<?php
require_once '../config/connect.php';
include '../includes/header.php';

if ( isset( $_GET['id'] ) ) {
	$id = $_GET['id'];
} else {
	header( 'location: index.php' );
}
$data = [
	'id' => $id,
];

$sql  = 'SELECT * FROM posts INNER JOIN users ON posts.userid = users.id WHERE posts.id = :id';
$stmt = $pdo->prepare( $sql );
$stmt->execute( $data );
$post = $stmt->fetch();
?>
    <main class="sectie-main">
        <div class="sectie-inner">
            <div class="discussie-sectie discussie-sectie-eerste">
                <div class="content-forum-tekst">
                    <h1><?= $post['post_titel'] ?></h1>
                    <p>
                        <strong>Gepost door <?= $post['firstname'] . ' ' . $post['lastname'] ?></strong><br><br>
                    </p>
                </div>
                <P>
					<?= $post['post_omschrijving'] ?>
                </P>
                <div class="content-forum-tekst">
                    <p>
                        <strong>Totaal 0 reacties</strong>
                    </p>
                </div>
            </div>
            <div class="discussie-sectie">
                <div class="content-forum-tekst">
                    <p>
                        <strong>Reageer op deze discussie</strong><br><br>
                    </p>
                </div>
                <form>
                    <label for="reageren"></label>
                    <textarea name="reageren" id="reageren" class="textarea-forum"></textarea>
                    <button class="button">Plaatsen</button>
                </form>
            </div>
        </div>
    </main>
<?php include '../includes/footer.php' ?>
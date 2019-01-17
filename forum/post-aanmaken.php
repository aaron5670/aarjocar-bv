<?php
require_once '../config/connect.php';
include '../includes/header.php';

if ( isset( $_GET['id'] ) ) {
	$_SESSION['id'] = $_GET['id'];
	$id             = $_SESSION['id'];
} else {
	header( 'location: index.php' );
}

$rubriekdata = [
	'id' => $_SESSION['id'],
];
$sql  = 'SELECT * FROM rubrieken WHERE id = :id';
$stmt = $pdo->prepare( $sql );
$stmt->execute( $rubriekdata );
$rubriek = $stmt->fetch();

if ( isset( $_POST['submit'] ) ) {
	//Haalt de gegevens op van het formulier
	if ( ! empty( $_POST['posttitel'] ) ) {
		$posttitel = $_POST['posttitel'];
	} else {
		$message = 'Posttitel mag niet leeg zijn!';
	}

	if ( ! empty( $_POST['omschrijving'] ) ) {
		$omschrijving = $_POST['omschrijving'];
	} else {
		$message = 'Omschrijving mag niet leeg zijn!';
	}

	if ( ! isset( $message ) ) {
		$data = [
			'rubriek'      => $_SESSION['id'],
			'userid'         => $_SESSION['user_id'],
			'posttitel'    => $posttitel,
			'omschrijving' => $omschrijving,
			'bekeken'      => 0,
		];

		$sql  = "INSERT INTO posts (rubriek, userid, post_titel, post_omschrijving, keer_bekeken) VALUES (:rubriek, :userid, :posttitel, :omschrijving, :bekeken)";
		$stmt = $pdo->prepare( $sql );
		$stmt->execute( $data );

		//header( 'Location: index.php?succes=true' );
	}
}
?>
    <main class="sectie-main">
        <div class="sectie-inner">
            <div class="content-forum-tekst">
                <h1>Post toevoegen</h1>
                <h3>
                    Aan de rubriek <?= $rubriek['rubriek'] ?>
                </h3>
            </div>

            <div class="post-toevoegen filter-menu">
                <form action="post-aanmaken.php" method="post">
                    <label for="posttitel">Post titel</label>
                    <input type="text" id="posttitel" name="posttitel">

                    <br/>

                    <label for="omschrijving">Post omschrijving</label>
                    <textarea rows="10" id="omschrijving" name="omschrijving"></textarea>

                    <br/>

                    <input type="submit" name="submit" value="Post plaatsen">
                </form>
            </div>
        </div>
    </main>
<?php include '../includes/footer.php' ?>
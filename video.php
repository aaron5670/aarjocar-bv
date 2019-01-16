<?php
include 'includes/header.php';
require_once 'config/connect.php';
?>
    <main class="sectie-main">
        <div class="sectie-inner">

            <form action="" method="post">
                <label class="filter-menu-label" for="categorie">Categorie</label>
                <select id="categorie" name="categorie" class="filter-menu">
                    <option value=""></option>
					<?php $stmt = $pdo->query( "SELECT * FROM categorieen" ); ?>
					<?php while ( $valuefilter = ( $stmt->fetch() ) ) { ?>
                        <option value="<?= $valuefilter['categorie']; ?>"><?= $valuefilter['categorie']; ?></option>
					<?php } ?>
                </select>
                <label for="zoekwoord" class="filter-menu-label">Zoeken</label>
                <input type="text" class="filter-menu" name="zoekwoord" id="zoekwoord">
                <input class="filter-menu-label" type="submit" name="submit" value="filteren">
            </form>

            <div class="informatie-videos-container">
				<?php
				if ( isset( $_POST['submit'] ) ) {
					$data = [
						'categorie' => $_POST['categorie'],
						'zoekwoord' => '%' . $_POST['zoekwoord'] . '%'
					];

					$sql  = "SELECT * FROM page_iframe WHERE categorie = :categorie AND titel LIKE :zoekwoord";
					$stmt = $pdo->prepare( $sql );
					$stmt->execute( $data );
				} else {
					$stmt = $pdo->query( "SELECT * FROM page_iframe" );
				}
				while ( $value = ( $stmt->fetch() ) ) {
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
				?>
            </div>
    </main>
<?php include 'includes/footer.php' ?>
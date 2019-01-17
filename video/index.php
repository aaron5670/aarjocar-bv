<?php
include '../includes/header.php';
require_once '../config/connect.php';
?>
    <main class="sectie-main">
        <div class="sectie-inner">
            <form class="container-zoeken-opties" action="index.php" method="post">
                <h2><label class="filter-menu-label" for="categorie">Zoeken op Categorie</label></h2>
                <select id="categorie" name="categorie" class="filter-menu">
					<?php $stmt = $pdo->query( "SELECT * FROM categorieen" ); ?>
					<?php while ( $valuefilter = ( $stmt->fetch() ) ) { ?>
                        <option value="<?= $valuefilter['categorie']; ?>"><?= $valuefilter['categorie']; ?></option>
					<?php } ?>
                </select>

                <h2><label for="zoekwoord" class="filter-menu-label">Zoeken op trefwoord</label></h2>
                <input type="text" class="filter-menu" name="zoekwoord" id="zoekwoord" placeholder="Zoek hier">

                <h2><label for="orderen" class="filter-menu-label">Sorteren</label></h2>
                <select id="orderen" name="orderen" class="filter-menu">
                    <option value="ASC">Oudste</option>
                    <option value="DESC">Nieuwste</option>
                </select>

                <input class="filter-menu-submit" type="submit" name="submit" value="filteren">
            </form>

            <div class="informatie-videos-container">
				<?php
				if ( isset( $_POST['submit'] ) ) {
					$data    = [
						'categorie' => $_POST['categorie'],
						'zoekwoord' => '%' . $_POST['zoekwoord'] . '%',
					];
					$orderen = $_POST['orderen'];

					$sql  = "SELECT * FROM page_iframe WHERE categorie = :categorie AND titel LIKE :zoekwoord ORDER BY publicatiedatum $orderen";
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
                        <a href="video-vervolg.php?id=<?= $value['id'] ?>">
                            <img class="opmaak-img" src="../images/videoimages/<?= $value['afbeelding']; ?>"
                                 alt="<?= $value['titel']; ?>">
                        </a>
                    </div>
					<?php
				}
				?>
            </div>
        </div>
    </main>
<?php include '../includes/footer.php' ?>
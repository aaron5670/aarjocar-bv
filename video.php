<?php
include 'includes/header.php';
require_once 'config/connect.php';
?>
    <main class="sectie-main">
        <div class="sectie-inner">

            <form class="container-zoeken-opties" action="" method="post">
                <label class="filter-menu-label" for="categorie"><h2>Zoeken op Categorie</h2></label>
                <select id="categorie" name="categorie" class="filter-menu">
					<?php $stmt = $pdo->query( "SELECT * FROM categorieen" ); ?>
					<?php while ( $valuefilter = ( $stmt->fetch() ) ) { ?>
                        <option value="<?= $valuefilter['categorie']; ?>"><?= $valuefilter['categorie']; ?></option>
					<?php } ?>
                </select>
                <label for="zoekwoord" class="filter-menu-label"><h2>Zoeken op trefwoord</h2></label>
                <input type="text" class="filter-menu" name="zoekwoord" id="zoekwoord" placeholder="Zoek hier">
                <label for="orderen" class="filter-menu-label"><h2>Sorteren</h2></label>

                <select id="orderen" name="orderen" class="filter-menu">
                    <option value="ASC">Nieuwste</option>
                    <option value="DESC">Oudste</option>
                </select>

                <input class="filter-menu-submit" type="submit" name="submit" value="filteren">
            </form>

            <div class="informatie-videos-container">
				<?php
				if ( isset( $_POST['submit'] ) ) {
					$data = [
						'categorie' => $_POST['categorie'],
						'zoekwoord' => '%' . $_POST['zoekwoord'] . '%',
						//'orderen'   => $_POST['orderen']
					];

					print_r( $data );

					$sql  = "SELECT * FROM page_iframe WHERE categorie = :categorie AND titel LIKE :zoekwoord ORDER BY publicatiedatum ASC";
					$stmt = $pdo->prepare( $sql );
					$stmt->execute( $data );
				} else {
					$stmt = $pdo->query( "SELECT * FROM page_iframe WHERE categorie = 'Auto_componenten' AND titel LIKE '%%' ORDER BY publicatiedatum ASC" );
				}
				while ( $value = ( $stmt->fetch() ) ) {
					?>
                    <div class="informatie-videos">
                        <h1><?= $value['titel']; ?></h1>
                        <p>
							<?= $value['omschrijving']; ?>
                        </p>
                        <a href="video/video-vervolg.php?id=<?= $value['id'] ?>">
                            <img src="images/videoimages/<?= $value['afbeelding']; ?>" alt="<?= $value['titel']; ?>"
                                 width="100% " height="300px">
                        </a>
                    </div>
					<?php
				}
				?>
            </div>
    </main>
<?php include 'includes/footer.php' ?>
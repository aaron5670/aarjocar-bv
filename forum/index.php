<?php include '../includes/header.php';
require_once '../config/connect.php';
?>
    <main class="sectie-main">
        <div class="sectie-inner">
            <div class="content-forum-tekst">
                <h1>AARJO Car Forum</h1>
            </div>

            <div class="table-container" role="table" aria-label="Destinations">
                <div class="flex-table header" role="rowgroup">
                    <div class="flex-row first">Rubrieken</div>
                </div>
				<?php
                $stmt = $pdo->query( "SELECT * FROM rubrieken" );
				while ( $value = $stmt->fetch() ) {
					?>
                    <div class="flex-table row" role="rowgroup">
                        <div class="flex-row first">
                            <a href="rubriek.php?id=<?= $value['id'] ?>"><span
                                        class="forum-span-title"> <?= $value['rubriek']; ?></span></a><br/>
							<?= $value['omschrijving']; ?>
                        </div>
                    </div>
				<?php } ?>
            </div>
        </div>
    </main>
<?php include '../includes/footer.php' ?>
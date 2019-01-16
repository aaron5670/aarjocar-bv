<?php include 'includes/header.php';
require_once 'config/connect.php'; ?>
    <main class="sectie-main">
        <div class="sectie-inner">
            <div class="informatie-videos-container">
                <!--                --><?php //$row = $pdo->query("SELECT * FROM page_iframe");
                //                while ($value = ($row->fetch())) { ?>
                <div class="informatie-videos">
                    <h1>Hoe werkt de motor van een auto?</h1>
                    <p>
                        In deze video zul je een tutorial zien van hoe de motor van een auto werkt. Dit laten ze in
                        deze
                        video zien aan de hand van een geanimeerd filmpje
                    </p>
                    <iframe height="315" src="https://www.youtube-nocookie.com/embed/zA_19bHxEYg?start=1"
                            allowfullscreen></iframe>
                </div>
                <!--                --><?php //} ?>

            </div>

    </main>
<?php include 'includes/footer.php' ?>
<div class="sectie-main">
    <div class="sectie-inner">
        <div class="box-2">
			<?php
			// select all users


			$pdo = new PDO( "sqlsrv:Server=localhost;Database=aarjocar", "sa", "password1" );

			$stmt = $pdo->query( "SELECT * FROM users" );

			while ( $row = $stmt->fetch() ) {
				echo $row['id'] . "\n" . $row['username'] . "\n" . $row['password'] . "\n" . "<br />\n";
			}
			?>
        </div>
    </div>
</div>
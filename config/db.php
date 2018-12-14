<div class="sectie-main">
    <div class="sectie-inner">
        <div class="box-1">
			<?php include_once 'connection.php' ?>
        </div>
        <div class="box-2">
			<?php
			// select all users
			$db = new PDO( "sqlsrv:Server=localhost;Database=aarjocar", "sa", "password1" );

			$stmt = $db->query( "SELECT * FROM users" );

			while ( $row = $stmt->fetch() ) {
				echo $row['userID'] . "\n" . $row['username'] . "\n" . $row['password'] . "\n" . "<br />\n";
			}
			?>
        </div>
    </div>
</div>
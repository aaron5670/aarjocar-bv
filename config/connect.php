<?php
/**
 * Database connectie
 */
try {
	$pdo = new PDO( "sqlsrv:Server=den1.mssql7.gear.host;Database=aarjocar;ConnectionPooling=0", "aarjocar", "Tu95?Trmi-Q3" );
	$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch ( PDOException $e ) {
	echo "Er ging iets mis met de database.<br>";
	echo "De melding is {$e->getMessage()}";
}
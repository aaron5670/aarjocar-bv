<?php
//Our MSSQL user account.
define('MSSQL_USER', 'sa');

//Our MSSQL password.
define('MSSQL_PASSWORD', 'password1');

//The server that MSSQL is located on.
define('MSSQL_HOST', 'localhost');

//The name of our database.
define('MYSQL_DATABASE', 'aarjocar');

/**
 * PDO options / configuration details.
 * I'm going to set the error mode to "Exceptions".
 * I'm also going to turn off emulated prepared statements.
 */
$pdoOptions = array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_EMULATE_PREPARES => false
);

/**
 * Connect to MySQL and instantiate the PDO object.
 */
$pdo = new PDO(
	$db = new PDO( "sqlsrv:Server=localhost;Database=aarjocar", "sa", "password1" ),
	$pdoOptions //Options
);

//The PDO object can now be used to query MySQL.
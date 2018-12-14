<?php
$serverName = "localhost"; //Hostname/IP,...
$connectionOptions = array(
    "Database" => "FLETNIX",
    "Uid" => "sa",
    "PWD" => "joris123"
);

//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true)); //See why it fails
} else {
    echo "Connected!";
}
?>
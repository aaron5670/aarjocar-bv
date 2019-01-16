<?php
session_start();
require_once 'config.php';
require_once '../../config/connect.php';

$data = [
	'id' => $_GET['id']
];

if ( isset( $_GET['deleteRubriek'] ) && isset( $_GET['id'] ) ) {
	$sql  = "DELETE FROM rubrieken WHERE id = :id";
	$stmt = $pdo->prepare( $sql );
	$stmt->execute( $data );

	header( 'Location: ' . WEBSITE_URL . 'beheerpaneel/forum/index.php' );
}
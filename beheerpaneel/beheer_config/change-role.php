<?php
session_start();
require_once 'config.php';
require_once '../../config/connect.php';

if ( isset( $_GET['makeAdmin'] ) && isset( $_GET['id'] ) ) {
	$data = [
		'id' => $_GET['id']
	];

	$sql  = "UPDATE users SET user_role = 'admin' WHERE id = :id";
	$stmt = $pdo->prepare( $sql );
	$stmt->execute( $data );

	header( 'Location: ' . WEBSITE_URL . 'beheerpaneel/gebruikers.php' );
}
if ( isset( $_GET['makeUser'] ) && isset( $_GET['id'] ) ) {
	$data = [
		'id' => $_GET['id']
	];

	$sql  = "UPDATE users SET user_role = 'user' WHERE id = :id";
	$stmt = $pdo->prepare( $sql );
	$stmt->execute( $data );

	header( 'Location: ' . WEBSITE_URL . 'beheerpaneel/gebruikers.php' );
}


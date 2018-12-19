<?php
session_start();
require_once 'config.php';
require_once '../../config/connect.php';

if ( isset( $_GET['makeAdmin'] ) && isset( $_GET['id'] ) ) {
	$id = $_GET['id'];

	$pdo->query( "UPDATE users SET user_role = 'admin' WHERE id = $id" );
} elseif ( isset( $_GET['makeUser'] ) && isset( $_GET['id'] ) ) {
	$id = $_GET['id'];

	$pdo->query( "UPDATE users SET user_role = 'user' WHERE id = $id" );
} else {
	eader( 'Location: ' . WEBSITE_URL );
}
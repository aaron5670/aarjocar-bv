<?php
require_once 'config.php';

if ( isset( $_GET['makeAdmin'] ) && isset( $_GET['id'] ) ) {
	$id = $_GET['id'];

	$pdo->query( "UPDATE users SET user_role = 'admin' WHERE user_role = $id" );
} elseif ( isset( $_GET['makeUser'] ) && isset( $_GET['id'] ) ) {
	$id = $_GET['id'];

	$pdo->query( "UPDATE users SET user_role = 'user' WHERE user_role = $id" );
} else {
	header( 'Location: ' . WEBSITE_URL );
}
<?php
//Define website
define( 'WEBSITE_URL', 'http://aarjocar-bv.test/' );

//Wanneer de user geen adin rol heeft
if ( $_SESSION['user_role'] != 'admin' ) {
	header( 'location: ' . WEBSITE_URL );
}
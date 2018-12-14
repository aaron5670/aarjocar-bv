<?php
//Define website
define('WEBSITE_URL', 'http://aarjocar-bv.test/');

if (!isset($_SESSION['user_id'])) {
	header('location: ' . WEBSITE_URL);
}
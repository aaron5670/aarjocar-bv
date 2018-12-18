<?php
require_once 'config/config.php';
session_destroy();
header('Location: ' . $url . 'inloggen.php');
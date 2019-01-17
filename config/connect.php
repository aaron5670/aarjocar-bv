<?php
/**
 * Database connectie
 */
try {
    $pdo = new PDO("sqlsrv:Server=localhost;Database=aarjocar;ConnectionPooling=0", "sa", "password1");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Er ging iets mis met de database.<br>";
    echo "De melding is {$e->getMessage()}";
}
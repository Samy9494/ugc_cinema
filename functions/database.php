<?php

$host = 'localhost';
$dbname = 'ucg_cinema';
$username = 'root';
$password = '';

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    print "ERREUR DATABASE : " . $e->getMessage();
    die;
}

?>

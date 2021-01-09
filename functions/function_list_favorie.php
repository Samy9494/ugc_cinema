<?php

$username = $_SESSION['username'];

$stmt = $dbh->prepare('SELECT id FROM user WHERE username = :username');
$stmt ->bindParam(':username', $username);
$stmt->execute();
$user = $stmt->fetch();

$userID = $user['id'];

$stmt = $dbh->prepare('SELECT filmID FROM favorie WHERE userID = :userID');
$stmt ->bindParam(':userID', $userID);
$stmt->execute();
$favorie = $stmt->fetch();

$filmID = $favorie['filmID'];

$stmt = $dbh->prepare('SELECT titre,  auteur, affiche, dateSortir FROM film WHERE id = :filmID');
$stmt ->bindParam(':filmID', $filmID);
$stmt->execute();
$films = $stmt->fetchall();
?>
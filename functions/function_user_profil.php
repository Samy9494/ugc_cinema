<?php

$username = $_SESSION['username'];

$stmt = $dbh->prepare('SELECT * FROM user WHERE username = :username');
$stmt ->bindParam(':username', $username);
$stmt->execute();
$user = $stmt->fetch();
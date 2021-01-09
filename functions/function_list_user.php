<?php

$stmt = $dbh->prepare('SELECT * FROM user');
$stmt->execute();
$users = $stmt->fetchAll();
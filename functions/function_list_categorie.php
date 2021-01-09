<?php

$stmt = $dbh->prepare('SELECT * FROM categorie');
$stmt->execute();
$categories = $stmt->fetchAll();
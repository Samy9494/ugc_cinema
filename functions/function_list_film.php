<?php

$stmt = $dbh->prepare('SELECT film.id as id_film, titre, description, auteur, affiche, dateSortir, categorie.nom as nom_categorie  FROM film LEFT JOIN categorie ON film.categorieID = categorie.id');
$stmt->execute();
$films = $stmt->fetchAll();
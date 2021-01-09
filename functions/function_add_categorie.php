<?php

if (isset($_POST['categorie']) ) {

    if (validateForm($_POST['nom_categorie']) === false) {
        $data = [
            'reponse' => false,
            'message' => 'Veillez entrer une categorie !'
        ];

        return false;
    }

    $stmt = $dbh->prepare('INSERT INTO categorie (nom) VALUES (:name)');

    // htmlentities — Convertit tous les caractères éligibles en entités HTML
    $name = htmlentities($_POST['nom_categorie']);
    $stmt->bindParam(':name', $name);

    // Execution de la requete SQL
    $reponse_categorie_insert = $stmt->execute();

    if ($reponse_categorie_insert === true) {
        $data = [
            'reponse' => true,
            'message' => 'Votre categorie à bien été enregistrer'
        ];

        return true;
    } else {
        $error = $stmt->errorInfo();

        $data = [
            'reponse' => false,
            'message' => 'Erreur d\'insertion en base - ' . $error['2']
        ];

        return false;
    }
}
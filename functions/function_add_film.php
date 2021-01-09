<?php

if (isset($_POST['film']) ) {

    if (validateForm($_POST['titre']) === false) {
        $data = [
            'reponse' => false,
            'message' => 'Veillez entrer un titre !'
        ];

        return false;
    }

    if (validateForm($_POST['description']) === false) {
        $data = [
            'reponse' => false,
            'message' => 'Veillez entrer une description !'
        ];

        return false;
    }

    if (validateForm($_POST['auteur']) === false) {
        $data = [
            'reponse' => false,
            'message' => 'Veillez entrer un auteur !'
        ];

        return false;
    }

    if (validateForm($_POST['date_sortir']) === false) {
        $data = [
            'reponse' => false,
            'message' => 'Veillez entrer une date de sortir !'
        ];

        return false;
    }

    if (validateForm($_POST['categorie']) === false) {
        $data = [
            'reponse' => false,
            'message' => 'Veillez entrer une categorie !'
        ];

        return false;
    }

    $image = '';

    if (isset($_FILES['affiche']) && $_FILES['affiche']['error'] == 0) {
        $typeFiles = [
            "jpg" => "image/jpg",
            "png" => "image/png",
            "jpeg" => "image/jpeg",
            "gif" => "image/gif",
        ];

        $fileName = $_FILES['affiche']['name'];
        $fileType = $_FILES['affiche']['type'];
        $fileSize = $_FILES['affiche']['size'];

        // verifie l'extension
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);

        if (!array_key_exists($ext, $typeFiles)){
            $data = [
                'reponse' => false,
                'message' => 'Votre format de fichier est incorrect !'
            ];

            return false;
        }

        //Limite a 10M
        $maxsize = 10 * 1024 * 1024;
        if ($fileSize > $maxsize) {
            $data = [
                'reponse' => false,
                'message' => 'La taille de votre fichier est superieur a la taille autorisée !'
            ];

            return false;
        }

        if (in_array($fileType, $typeFiles)) {
            $image = uniqid('', 0) . '.' . $ext;
            move_uploaded_file($_FILES['affiche']['tmp_name'], $destination_path . $image);
        }
    }

    $stmt = $dbh->prepare('INSERT INTO film (titre, description, auteur, affiche, dateSortir, categorieID) VALUES (:titre, :description, :auteur, :affiche, :date_sortir, :categorieID)');

    // htmlentities — Convertit tous les caractères éligibles en entités HTML
    $titre = htmlentities($_POST['titre']);
    $description = htmlentities($_POST['description']);
    $auteur = htmlentities($_POST['auteur']);
    $affiche = $image;
    $dateSortir = $_POST['date_sortir'];
    $categorieID = $_POST['categorie'];

    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':auteur', $auteur);
    $stmt->bindParam(':affiche', $affiche);
    $stmt->bindParam(':date_sortir', $dateSortir);
    $stmt->bindParam(':categorieID', $categorieID);

    // Execution de la requete SQL
    $reponse_categorie_insert = $stmt->execute();

    if ($reponse_categorie_insert === true) {
        $data = [
            'reponse' => true,
            'message' => 'Votre film à bien été enregistrer'
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
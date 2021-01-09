<?php

if (isset($_POST['register']) ) {

    if ( validateForm($_POST['genre']) === false ) {
        $data = [
          'reponse' => false,
          'message' => 'Veillez entrer un genre !'
        ];

        return false;
    }

    if ( $_POST['genre'] !== 'H' &&  $_POST['genre'] !== 'F') {
        $data = [
            'reponse' => false,
            'message' => 'Veillez entrer un format compatible pour le genre !'
        ];

        return false;
    }

    if ( validateForm($_POST['email']) === false ) {
        $data = [
            'reponse' => false,
            'message' => 'Veillez entrer un email !'
        ];

        return false;
    }

    $email = $_POST['email'];
    $stmt = $dbh->prepare('SELECT * FROM user WHERE email = :parameter_email');
    $stmt->bindParam(':parameter_email', $email);
    $stmt->execute();

    if($stmt->fetch() === true) {
        $data = [
            'reponse' => false,
            'message' => 'Cet adresse email existe déjà !'
        ];
    }

    if ( validateForm($_POST['dateNaissance']) === false ) {
        $data = [
            'reponse' => false,
            'message' => 'Veillez entrer une date de naissance !'
        ];

        return false;
    }

    if ( validateForm($_POST['password']) === false ) {
        $data = [
            'reponse' => false,
            'message' => 'Veillez entrer un mot de passe!'
        ];

        return false;
    }

    if ( validateForm($_POST['passwordConfirmed']) === false ) {
        $data = [
            'reponse' => false,
            'message' => 'Veillez entrer un mot de passe de confirmation!'
        ];

        return false;
    }

    if (strlen($_POST['password']) < 6) {
        $data = [
            'reponse' => false,
            'message' => 'Votre mot de passe doit contenir minimum 6 valeurs'
        ];

        return false;
    }

    if ($_POST['password'] !== $_POST['passwordConfirmed'] ) {
        $data = [
            'reponse' => false,
            'message' => 'Votre mot de passe doit etre identique au mot de passe de confirmation'
        ];

        return false;
    }


    $stmt = $dbh->prepare('INSERT INTO user (username, password, email, genre, role, dateNaissance, cgu) VALUES (:username, :password, :email, :genre, :role, :dateNaissance, :cgu)');

    // htmlentities — Convertit tous les caractères éligibles en entités HTML
    $email = htmlentities($_POST['email']);
    $genre = $_POST['genre'];
    $password= password_hash($_POST['password'], PASSWORD_DEFAULT);
    $dateNaissance = $_POST['dateNaissance'];
    $role = "ROLE_USER";
    $cgu = (boolean) $_POST['cgu'];

    $stmt->bindParam(':username', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':dateNaissance', $dateNaissance);
    $stmt->bindParam(':cgu', $cgu);

    // Execution de la requete SQL
    $reponse_register_insert = $stmt->execute();

    if ($reponse_register_insert === true) {
        $data = [
            'reponse' => true,
            'message' => 'Votre compte à bienété enregistrer'
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
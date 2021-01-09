<?php
if (isset($_POST['login']) ) {

    if (validateForm($_POST['username']) === false) {
        $data = [
            'reponse' => false,
            'message' => 'Veillez entrer un username !'
        ];

        return false;
    }

    if (validateForm($_POST['password']) === false) {
        $data = [
            'reponse' => false,
            'message' => 'Veillez entrer un mot de passe !'
        ];

        return false;
    }

    $username = $_POST['username'];
    $stmt = $dbh->prepare('SELECT * FROM user WHERE username = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $login_response = $stmt->fetch();

    if ($login_response === false) {
        $data = [
            'reponse' => false,
            'message' => 'Votre username est incorrect !'
        ];

        return false;
    }

    if ( password_verify($_POST['password'], $login_response['password']) !== true) {
        $data = [
            'reponse' => false,
            'message' => 'Votre mot de passe est incorrect !'
        ];

        return false;
    }

    // Message success
    $data = [
        'reponse' => true,
        'message' => 'Connexion valide'
    ];

    // Assigner les valeurs de l'utilisateur connecté dans une session
    $_SESSION['id'] = $login_response['id'];
    $_SESSION['username'] = $login_response['username'];
    $_SESSION['role'] = $login_response['role'];

    if ($login_response['role'] == 'ROLE_USER') {
        // redirection si connexion etablir
        header('Location: apps/user/dashboard.php');
    }

    if ($login_response['role'] == 'ROLE_ADMIN') {
        // redirection si connexion etablir
        header('Location: apps/admin/dashboard.php');
    }
}
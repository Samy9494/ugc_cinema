<?php include_once 'parameters.php'; ?>
<?php include_once 'database.php'; ?>
<?php

$username = $_SESSION['username'];

$stmt = $dbh->prepare('UPDATE user SET email= :email, genre= :genre, dateNaissance= :dateNaissance WHERE username= :username');

// htmlentities — Convertit tous les caractères éligibles en entités HTML
$email = htmlentities($_POST['email']);
$genre = $_POST['genre'];
$dateNaissance = $_POST['dateNaissance'];

$stmt->bindParam(':username', $username);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':genre', $genre);
$stmt->bindParam(':dateNaissance', $dateNaissance);

// Execution de la requete SQL
$reponse_profil_updated = $stmt->execute();

if ($reponse_profil_updated === true) {
    $data = [
        'reponse' => true,
        'message' => 'Votre profil à bienété enregistrer'
    ];

    return true;
} else {
    $error = $stmt->errorInfo();

    $data = [
        'reponse' => false,
        'message' => 'Erreur d\'enregistrement en base - ' . $error['2']
    ];

    return false;
}
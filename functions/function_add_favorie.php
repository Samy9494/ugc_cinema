<?php include_once 'parameters.php'; ?>
<?php include_once 'database.php'; ?>
<?php

$username = $_SESSION['username'];

$stmt = $dbh->prepare('SELECT id FROM user WHERE username = :username');
$stmt ->bindParam(':username', $username);
$stmt->execute();
$user = $stmt->fetch();

$userID = $user['id'];

$filmID = $_GET['filmID'];

$stmt = $dbh->prepare('SELECT id FROM favorie WHERE userID = :userID AND filmID = :filmID');
$stmt->bindParam(':filmID', $filmID);
$stmt->bindParam(':userID', $userID);
$stmt->execute();
$favorie = $stmt->fetch();

if ($favorie !== false) {
    exit();
}

$stmt = $dbh->prepare('INSERT INTO favorie (filmID, userID) VALUES (:filmID, :userID)');

// htmlentities — Convertit tous les caractères éligibles en entités HTML

$stmt->bindParam(':filmID', $filmID);
$stmt->bindParam(':userID', $userID);

// Execution de la requete SQL
$reponse_favorie_insert = $stmt->execute();

if ($reponse_favorie_insert === true) {
    $data = [
        'reponse' => true,
        'message' => 'Votre film à bien été ajouter aux favorie'
    ];

    return true;
} else {
    $error = $stmt->errorInfo();

    $data = [
        'reponse' => false,
        'message' => 'Erreur d\'ajout en favorie - ' . $error['2']
    ];

    return false;
}

?>
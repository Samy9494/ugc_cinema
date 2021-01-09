<?php
session_start(); // Demarrage de la session

define('GLOBAL_PREFIX', '/ugc_cinema-main/ugc_cinema-main');
if (!isset($_SESSION['id'])) {
	$_SESSION['id'] = null;
	$_SESSION['username'] = null;
	$_SESSION['role'] = null;
}

// pour les messages d'erreurs
$data = [
    'reponse' => null,
    'message' => ''
];

$destination_path = '../../assets/images/films/';

// fonction pour verifier les valeurs envoyer en POST
function validateForm($value) {
    if (!isset($value)) {
        return false;
    }

    if (empty($value)) {
        return false;
    }

    return true;
}
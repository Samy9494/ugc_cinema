<?php
session_start();
$_SESSION['id'] = null;
$_SESSION['username'] = null;
$_SESSION['role'] = null;

header('Location: ../index.php');

?>
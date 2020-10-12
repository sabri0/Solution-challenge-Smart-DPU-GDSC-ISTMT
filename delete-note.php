<?php
session_start();
if( !array_key_exists('id', $_GET) OR !ctype_digit($_GET['id']) ) {
  header("location: patient.php?id_patient=".$_SESSION['IDpat']);
  exit();
}

// Inclusion des dépendances
include 'app/connect.php';

// Préparation de la requête
$query = $pdo->prepare(
  '
    DELETE from note
    WHERE id_note = ?
  '
);

// Exécution de la requête de suppression
$query->execute( array($_GET['id']) );

// Redirection vers le dashboard de l'admin
header("location: patient.php?id_patient=".$_SESSION['IDpat']);
exit();

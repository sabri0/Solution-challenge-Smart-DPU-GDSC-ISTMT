<?php
session_start();


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
$query->execute( [$_GET['id']] );

// Redirection vers le dashboard de l'admin
header("location: patient.php?id_patient=".$_SESSION['IDpat']);
exit();

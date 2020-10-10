<?php

include 'app/connect.php';

/*
  Récupération de 10 articles du blog classés par ordre antéchronologique.
  Soit, récupération des 10 derniers
*/
$query = $pdo -> prepare(
'
SELECT * FROM patient
');

$query->execute();
$patients = $query->fetchAll(); 
$query->closeCursor();

// Affichage
$title = 'Accueil';
$template = 'index';
include 'layout.phtml';

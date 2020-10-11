<?php
session_start();
include 'app/connect.php';
if (isset($_POST['enregistrer'])) {
   $nom = htmlspecialchars($_POST['nom']);
   $prenom = htmlspecialchars($_POST['pnom']);
   $address =htmlspecialchars($_POST['adress']);
   $numtel =htmlspecialchars($_POST['numtel']);
   $datenaiss = htmlspecialchars($_POST['datenaiss']) ;
   $diagnostique = htmlspecialchars($_POST['diagnostique']);
  $correspondance = htmlspecialchars($_POST['correspondance']);


 if (!empty($_POST['nom']) AND !empty($_POST['pnom'])AND !empty(['adress']) AND !empty($_POST['numtel']) AND !empty($_POST['datenaiss'])AND !empty($_POST['correspondance']) AND !empty($_POST['diagnostique'])) {
    
	   $insertpat = $pdo->prepare('UPDATE patient SET  prenom= :prenom, nom=:nom, datenai=:datenai, address=:address, numtel=:numtel, diagnostique=:diagnostique,correspondance=:correspondance WHERE IDpat=:ID');
       $insertpat->execute(array(
	  "ID" => $_SESSION['IDpat'], 
	  "prenom" => $prenom, 
	  "nom"=> $nom, 
	  "datenai" => $datenaiss,
	  "address" => $address,
	  "numtel" => $numtel, 
    "diagnostique" => $diagnostique,
    "correspondance" => $correspondance));
	 


header("location: patient.php?id_patient=".$_SESSION['IDpat']);
 
 }
}

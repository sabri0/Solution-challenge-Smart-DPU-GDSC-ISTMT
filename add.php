<?php
session_start();
include 'app/connect.php';
$query = $pdo -> prepare(
  '
  SELECT IDpat FROM patient
  ');
  
  $query->execute();
  $id = $query->fetchAll(); 
  $query->closeCursor();
if (isset($_POST['enregistrer'])) {
  do{
    $cin = uniqid();
  }while(in_array($cin, $id));
    
  
  
   $nom = htmlspecialchars($_POST['nom']);
   $prenom = htmlspecialchars($_POST['pnom']);
   
   $numtel =htmlspecialchars($_POST['numtel']);
   $datenaiss = htmlspecialchars($_POST['datenaiss']) ;
 
  
if (!empty($_POST['correspondance'])) {
  $correspondance = htmlspecialchars($_POST['correspondance']);
}else{
  $correspondance="Pas de correspondance";
}
if (!empty($_POST['diagnostique'])) {
  $diagnostique = htmlspecialchars($_POST['diagnostique']);
}else{
  $diagnostique="Pas de diagnostique";
}
if (!empty($_POST['adress'])) {
  $address =htmlspecialchars($_POST['adress']);
}else{
  $adress="Pas d'address";
}

 if (!empty($_POST['nom']) AND !empty($_POST['pnom']) AND !empty($_POST['numtel']) AND !empty($_POST['datenaiss'])) {
    
	   $insertpat = $pdo->prepare('INSERT INTO patient (IDpat, IDmed, prenom, nom, datenai, address, numtel, diagnostique,correspondance) VALUES (:ID,:IDmed ,:prenom, :nom, :datenai,:address,:numtel,:diagnostique,:correspondance)');
       $insertpat->execute(array(
	  "ID" => $cin, 
	  "IDmed" => $_SESSION['id'], 
	  "prenom" => $prenom, 
	  "nom"=> $nom, 
	  "datenai" => $datenaiss,
	  "address" => $address,
	  "numtel" => $numtel, 
    "diagnostique" => $diagnostique,
    "correspondance" => $correspondance));
	  $_SESSION['IDpat']=$cin;
	  $m=$_SESSION['id'];
	  mkdir("data/patients/image/".$cin, 0777, true);
	  mkdir("data/patients/document/".$cin, 0777, true);
	  mkdir("data/patients/zip/".$cin, 0777, true);
	  mkdir("data/patients/video/".$cin, 0777, true);
	 


header("location: patient.php?id_patient=".$_SESSION['IDpat']);
 
 }else{
  $erreur = "Vérifier les entrer requis";
}
}



$title = 'Ajouter Patient';
$template = 'add';
include 'layout.phtml';

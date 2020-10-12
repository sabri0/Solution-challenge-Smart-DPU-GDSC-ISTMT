<?php
session_start();
include 'app/connect.php';

if (isset($_POST['setNote'])) {
    
    $Note = htmlspecialchars($_POST['note']);
   
	   $insertNote = $pdo->prepare("INSERT INTO `note` ( `ID_patient`, `Note`, `Date`) VALUES ( :id, :note, NOW())");
       $insertNote->execute(array(
	  "id" => $_SESSION['IDpat'], 
	  "note" => $Note));
	


header("location: patient.php?id_patient=".$_SESSION['IDpat']);
}

<?php
session_start();
include 'app/connect.php';

$query = $pdo -> prepare(
  '
  SELECT id_note FROM note
  ');
  
  $query->execute();
  $id = $query->fetchAll(); 
  $query->closeCursor();
  do{
    $noteId = uniqid();
  }while(in_array($noteId, $id));
	   $insertNote = $pdo->prepare("INSERT INTO `note` ( `id_note`,`ID_patient`, `Date`) VALUES ( :noteId,:id, NOW())");
     $pdo->beginTransaction();
       $insertNote->execute(array(
        "noteId" =>  $noteId,      
	  "id" => $_SESSION['IDpat'], 
	  ));
    $pdo->commit();


header("location: consultation.php?noteId=".$noteId.'&&id_patient='.$_SESSION['IDpat']);


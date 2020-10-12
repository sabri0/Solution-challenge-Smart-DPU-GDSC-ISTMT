<?php
include 'app/connect.php';
session_start();
$_SESSION['IDpat']=$_GET['id_patient'];
      $reponse = $pdo->prepare("SELECT * FROM patient WHERE IDpat=?") ; 
      $reponse->execute(array($_GET['id_patient']));
  $patient = $reponse->fetch();
  $id=$patient["IDpat"];
  $m=$_SESSION['id'];
  $updirim= "data/patients/image/$id/";
  $updirdoc= "data/patients/document/$id/";
  $updirzip= "data/patients/zip/$id/";
  $updirvid= "data/patients/video/$id/";
  
  $reponseNote = $pdo->prepare("SELECT * FROM note WHERE ID_patient=?") ; 
     $reponseNote->execute(array($_GET['id_patient']));
  $notes = $reponseNote->fetchAll();
  
  if(isset($_POST['upim'])){
    
    $file = $_FILES["file"];
    move_uploaded_file($file["tmp_name"],"$updirim".$file["name"]);

  
  }
  if(isset($_POST['updoc'])){
    
    $filed = $_FILES["file"];
    move_uploaded_file($filed["tmp_name"],"$updirdoc".$filed["name"]);
  }
  if(isset($_POST['upzip'])){
    
    $filed = $_FILES["file"];
    move_uploaded_file($filed["tmp_name"],"$updirzip".$filed["name"]);
  }
  if(isset($_POST['upvid'])){
    
    $filed = $_FILES["file"];
    move_uploaded_file($filed["tmp_name"],"$updirvid".$filed["name"]);
  }
  $title = 'Dossier Patient';
  $template = 'patient';
  include 'layout.phtml';
  
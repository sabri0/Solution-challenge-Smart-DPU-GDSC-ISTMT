<?php
include 'app/connect.php';
session_start();

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
    require_once('class_dicom.php');
  
  $file = (isset($argv[1]) ? $argv[1] : "$updirim".$file["name"]);
  
  if(!$file) {
    print "USAGE: ./dcm_to_jpg.php <FILE>\n";
    exit;
  }
  
  if(!file_exists($file)) {
    print "$file: does not exist\n";
    exit;
  }
  
  $job_start = time();
  
  $d = new dicom_convert;
  $d->file = $file;
  $d->dcm_to_jpg();
  
  }
  if(isset($_POST['updoc'])){
    
    $filed = $_FILES["filed"];
    move_uploaded_file($filed["tmp_name"],"$updirdoc".$filed["name"]);
  }
  if(isset($_POST['upzip'])){
    
    $filed = $_FILES["filed"];
    move_uploaded_file($filed["tmp_name"],"$updirzip".$filed["name"]);
  }
  if(isset($_POST['upvid'])){
    
    $filed = $_FILES["filed"];
    move_uploaded_file($filed["tmp_name"],"$updirvid".$filed["name"]);
  }
  $title = 'Dossier Patient';
  $template = 'patient';
  include 'layout.phtml';
  
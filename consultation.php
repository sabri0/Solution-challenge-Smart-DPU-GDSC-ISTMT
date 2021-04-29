<?php
include 'app/connect.php';
session_start();
$_SESSION['IDpat']=$_GET['id_patient'];
$title = 'Consultation';
$template = 'consultation';
include 'layout.phtml';

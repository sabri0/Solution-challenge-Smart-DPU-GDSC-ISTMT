<?php
include 'app/connect.php';
session_start();
$query = $pdo -> prepare(
    '
    SELECT * FROM note WHERE id_note=?
    ');
    
    $query->execute([$_GET['noteId']]);
    $note = $query->fetch();
   
$title = 'Update Consultation';
$template = 'update_consultation';
include 'layout.phtml';

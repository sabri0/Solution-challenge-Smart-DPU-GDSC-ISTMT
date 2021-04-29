<?php
	include 'app/connect.php';
  session_start();
	
	
		$content = $_POST['content'];
		$note_id = $_POST['note_id'];
    $insertpat = $pdo->prepare('UPDATE `note` SET `Note` = :content, `Date` = NOW() WHERE `note`.`id_note` = :idNote');
    $insertpat->execute(array(
      "idNote" => $note_id, 
      "content" => 	$content, ));
      header("location: patient.php?id_patient=".$_SESSION['IDpat']);
?>

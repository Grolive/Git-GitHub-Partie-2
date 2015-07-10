<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=chat','root','', array(PDO::ATTR_ERRMODE => PDO :: ERRMODE_EXCEPTION));
	$reponse = $bdd -> prepare ('INSERT INTO `Chat_OCR`(`Date_Message`, `Login`, `Message`) VALUES (NOW(),?,?)');
	$reponse->execute(array($_POST['Login'],$_POST['Message']));
	$_SESSION['Log'] = $_POST['Login'];
	header('location:index.php');
?>

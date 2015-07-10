<?php
session_start();
$_SESSION['Log'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="refresh" content="15">   <!Refresh toute les 15 second !>
		<meta charset="utf-8" />
		<title>Mon Chat</title>
		<?php 
				$conexion = new PDO('mysql:host=localhost;dbname=chat','root','', array(PDO::ATTR_ERRMODE => PDO :: ERRMODE_EXCEPTION));/* Connexion a MyPHP */
		?>
	</head>
		<form action=" Insert.php" method="POST">
		
			<?php
				
				echo '<p><label> Login : <input type="text" value='.htmlspecialchars($_SESSION['Log']).' name="Login" /></label></p> 
				<p><label> Message <input type="text" name="Message" /></label></p>
				<p><label> Submit : <input type="submit" /></label></p>';
						
			?>
			
		</form>
	<body>
		<p>
			<?php				
				$reponse = $conexion -> query ('SELECT * FROM `Chat_OCR` WHERE 1'); /* liste des message du serveur */
					while ($donnees = $reponse -> fetch())
						{
							$Date_Form = date_create($donnees['Date_Message']);
							echo '<p>'. date_format($Date_Form ,'H:i:s  D jS M Y') .' - ' . htmlspecialchars($donnees['Login']).'  -  '. htmlspecialchars($donnees['Message']).'</p>';
						}
			?>
		</p>
	</body>
</html>

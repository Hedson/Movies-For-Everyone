	<?php include('sesja.php'); ?>
<!DOCTYPE HTML>
<html lang="pl">

<head>

	<?php include('main/naglowek.php'); ?>
	
	<style>
	
	.content
		{
			font-size: 34px;
			color: white;	
		}
		
		.tlo
		{
			
		}
		
		td
		{
			font-size: 30px;
			color:white;
			text-decoration: none;
		}
		td
		{
			font-size: 30px;
			color:white;
			text-decoration: none;
		}
		a
		{
			text-decoration:none;
			color:white;
		}
		
	</style>
	
	<script type="text/javascript" src="timer.js"></script>

</head>

<body onload="odliczanie();">
	
	<?php include('main/menu.php'); ?>



		<div class="content">
		
		
			
			<div class="content">
		
			
			
				<table width="900" align="center" border="1" bordercolor="#d5d5d5" cellpadding="0" cellspacing="0">     
<tr>
			
			<?php 
			
			echo "METODA GET:<br>";
				$zmienna = $_GET['zmienna'];
				echo "Zmienna: ".$zmienna;

				echo "<br><br><br><br>";
				
			
$userNow = $_SESSION['user'];	//aktualny user
$userNowId = $_SESSION['id'];	//aktualny user id

ini_set("display_errors", 0);
require_once 'dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password);
mysqli_query($polaczenie, "SET CHARSET utf8");
mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
mysqli_select_db($polaczenie, $database);





//<td width="100" align="center"><a href="filmUsunUlubiona.php?zmienna=$id">{$id} KATEGORIA ZOSTALA DODANA DO BAZY</a></td>
//</tr><tr>
//END;


$zapytanietxt = "INSERT INTO uzytkownicykategorie (IdUzytkownik, IdKategoria)
VALUES ($userNowId,$zmienna)
";

//$zapytanietxt = "SELECT * FORM ";


$rezultat = mysqli_query($polaczenie, $zapytanietxt);
			
	
	header("Location: ustawienia.php"); 

				?>


</tr></table>
							
		
		
		
		
		</div>
		
		



	<?php include('main/stopka.php'); ?>



</body>


</html>
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


$zapytanietxt = "SELECT distinct uk.id
FROM uzytkownicykategorie uk
where uk.IdUzytkownik='$userNowId' AND uk.IdKategoria=$zmienna";

//$zapytanietxt = "SELECT * FORM ";


$rezultat = mysqli_query($polaczenie, $zapytanietxt);
$ile = mysqli_num_rows($rezultat);

if ($ile>=1) 
{
echo<<<END
<td width="100" align="center" bgcolor="333333">Ulubione kategorie, <br> kliknij aby usunąć daną ketegorię:</td>

</tr><tr>
END;
}
	for ($i = 1; $i <= $ile; $i++) 
	{
		
		$row = mysqli_fetch_assoc($rezultat);
		$id = $row['id'];
		$title = $row['nazwa'];
	
echo<<<END


<td width="100" align="center"><a href="filmUsunUlubiona.php?zmienna=$id">{$id} KATEGORIA ZOSTALA USUNIETA Z BAZY</a></td>
</tr><tr>
END;


$zapytanietxt = "DELETE FROM uzytkownicykategorie WHERE id = $id";

//$zapytanietxt = "SELECT * FORM ";


$rezultat = mysqli_query($polaczenie, $zapytanietxt);
			
	}
	
header("Location: ustawienia.php"); 
				?>


</tr></table>
							
		
		
		
		
		</div>
		
		



	<?php include('main/stopka.php'); ?>



</body>


</html>
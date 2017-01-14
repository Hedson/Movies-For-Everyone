	
	
	<?php include('sesja.php'); ?>
<!DOCTYPE HTML>
<html lang="pl">

<head>

	<?php include('main/naglowek.php'); ?>
	
	<script type="text/javascript" src="timer.js"></script>
	
	
	<style>
	
		.content
		{
			font-size: 34px;
			color: white;	
			width:1100px;
			padding:100px;
		}
		
	</style>

</head>

<body onload="odliczanie();">
	
	<?php include('main/menu.php'); ?>



	
	
	
<div class="content">
		
			
			
				<table width="900" align="center" border="1" bordercolor="#d5d5d5" cellpadding="0" cellspacing="0">     
<tr>
<?php 
$userNow = $_SESSION['user'];	//aktualny user
$userNowId = $_SESSION['id'];	//aktualny user
ini_set("display_errors", 0);
require_once 'dbconnect.php';
$polaczenie = mysqli_connect($host, $user, $password);
mysqli_query($polaczenie, "SET CHARSET utf8");
mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
mysqli_select_db($polaczenie, $database);


$zapytanietxt = "SELECT distinct u.user
FROM uzytkownicy u INNER JOIN uzytkownicykategorie uk
ON u.id=uk.IdUzytkownik
where idKategoria IN(
SELECT distinct uk.IdKategoria 
FROM uzytkownicy u INNER JOIN uzytkownicykategorie uk ON u.id=uk.IdUzytkownik 
where u.id = '$userNowId'
) 
AND u.user != '$userNow'";


/*$zapytanietxt = "SELECT distinct u.user
FROM uzytkownicy u, uzytkownicykategorie uk
WHERE (u.id=uk.IdUzytkownik
AND uk.IdKategoria=1) OR (u.id=uk.IdUzytkownik AND uk.IdKategoria=4) 
OR (u.id=uk.IdUzytkownik AND uk.IdKategoria=3) ";
				   
				 /*"SELECT distinct uk1.IdKategoria
                   from uzytkownicy u1, uzytkownicykategorie uk1
                   where u1.id='$userNowId'";*/
				   

$rezultat = mysqli_query($polaczenie, $zapytanietxt);
$ile = mysqli_num_rows($rezultat);

if ($ile>=1) 
{
echo<<<END
<td width="100" align="center" bgcolor="333333">Lista polecanych użytkowników:</td>

</tr><tr>
END;
}
	for ($i = 1; $i <= $ile; $i++) 
	{
		
		$row = mysqli_fetch_assoc($rezultat);
		$id = $row['id'];
		$user = $row['user'];


		
echo<<<END

<td width="100" align="center">$user</td>
</tr><tr>
END;
			
	}
	

				?>


				
				
				
				
</tr></table>



</body>


</html>
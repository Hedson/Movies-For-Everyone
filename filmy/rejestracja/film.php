	<?php include('sesja.php'); ?>
<!DOCTYPE HTML>
<html lang="pl">

<head>

	<?php include('main/naglowek.php'); ?>
	
	<style>
	
		.content
		{
			font-size: 20px;
			color: white;	
		}
		
		.tlo
		{
			
		}
		
		t1
		{
			font-size: 40px;
		}
		p1
		{
			font-size:28px;
		}
		p
		{
			margin-left:20px;
		}
		
		
	</style>
	
	<script type="text/javascript" src="timer.js"></script>

</head>

<body onload="odliczanie();">
	
	<?php include('main/menu.php'); ?>



		<div class="content">
		
		
			
		
		
			
			
				
			
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

$zapytanietxt = "SELECT * FROM filmy WHERE id = $zmienna";

$rezultat = mysqli_query($polaczenie, $zapytanietxt);
$ile = mysqli_num_rows($rezultat);

if ($ile>=1) 
{
echo<<<END


</tr><tr>
END;
}
	for ($i = 1; $i <= $ile; $i++) 
	{
		
		$row = mysqli_fetch_assoc($rezultat);
		$id = $row['id'];
		$title = $row['title'];
		$year = $row['year'];
		//$opis = $row['opis'];
		$title2 = $row['title2'];
		$kopis = $row['kopis'];
		$dopis = $row['dopis'];
		$zwiastun = $row['zwiastun'];
		$rezyseria = $row['rezyseria'];
		$scenariusz = $row['scenariusz'];
		$produkcja = $row['produkcja'];
		$premiera = $row['premiera'];
		$boxoffice = $row['boxoffice'];
		$rok = $row['rok'];
		$miesiac = $row['miesiac'];
		$dzien = $row['dzien'];
		
		$link = '<a href="kategoria.php?zmienna=$id">{$title}</a>';
		
		
		
		
		if($premiera<date())
		// ODLICZANIE DO PREMIERY(DNI):
		echo "<t1>";
		
		$remained = ceil((strtotime($premiera) - time()) / (60 * 60 * 24));
					
		echo ($remained > 0 ? '<t1>PREMIERA FILMU:<br>  Do '.$premiera.' pozostało '.$remained.' dni </t1>' : ' Film został wydany  ') ;
		
		echo "<br><br><br>";		
		
		echo "</t1>";

		
		
		
		
echo<<<END
<t1>{$title}({$year})</t1>
<br>

<p>{$kopis}</p>

<p1>Opis filmu:</p1>
<br>
<p>{$dopis}</p>

<p1>Zwiastun:</p1>
<br>
<p>{$zwiastun}</p>

<p>
	reżyseria:	{$rezyseria}<br>
	scenariusz: {$scenariusz}<br>
	produkcja:	{$produkcja}<br>
	premiera:	{$premiera}<br>
	boxoffice:	{$boxoffice}<br>
</p>


</tr><tr>
END;
			
			

}
	

?>



							
		
		
		
		
		</div>
		
		



	<?php include('main/stopka.php'); ?>



</body>


</html>
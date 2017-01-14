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
		
		li
		{

			width:333px;
		}
		li a
		{
			color: #ffffff;
			text-decoration: none;
			display: block;

		}
		li:hover
		{
			background-color: #232323;
		}
	</style>
	
	<script type="text/javascript" src="timer.js"></script>

</head>

<body onload="odliczanie();">
	
	<?php include('main/menu.php'); ?>



		<div class="content">
		
		<li> <a href="kategoria.php?zmienna=1">Dramat</a></li>
		<li> <a href="kategoria.php?zmienna=2">Komedia</a></li>
		<li> <a href="kategoria.php?zmienna=4">Biograficzny</a></li>
		<li> <a href="kategoria.php?zmienna=5">Gangsterski</a></li>
		<li> <a href="kategoria.php?zmienna=6">Akcja</a></li>
		<li> <a href="kategoria.php?zmienna=7">Animacja</a></li>
		<li> <a href="kategoria.php?zmienna=8">Sci-Fi</a></li>
		<li> <a href="kategoria.php?zmienna=9">Thriller</a></li>
		<li> <a href="kategoria.php?zmienna=10">Fantasy</a></li>
		<li> <a href="kategoria.php?zmienna=11">Familijny</a></li>
		<li> <a href="kategoria.php?zmienna=12">Przygodowy</a></li>
		<li> <a href="kategoria.php?zmienna=13">Wojenny</a></li>
		<li> <a href="kategoria.php?zmienna=14">Psychologiczny</a></li>



			
		
		</div>
		
		



	<?php include('main/stopka.php'); ?>



</body>


</html>
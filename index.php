<?php 

require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Royal-kids.com.pl</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/lightbox.css" rel="stylesheet">
    <link href="css/main.css?v=<?=rand();?>" rel="stylesheet">

	
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Pacifico" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Enriqueta" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lemonada" rel="stylesheet">







    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
			
			<?php ModuleLoader::load("header"); ?>
			<?php ModuleLoader::load("nasze-produkty"); ?>
			<?php ModuleLoader::load("onas"); ?>
			<?php ModuleLoader::load("wspolpraca"); ?>
			<?php ModuleLoader::load("galeria"); ?>
			

			
			
			<?php ModuleLoader::load("trojtext"); ?>
			<?php ModuleLoader::load("contact-form"); ?>
			<?php ModuleLoader::load("footer"); ?>
		
			

	<!--
			Nazwa firmy: ROYAL KIDS 
			telefon do kontaktu 796-004-094 
			adres: Tynica 2 26-706 Tczów 
			Przyjmowanie zamówien telefonicznie zrób na stronie mape dojazdu i podaj adres mailowy firmowy  
			Aktualna oferta firmy : kolekcja jesienno-zimowa dostepna od sierpnia zakladka 
			O Nas: ROYAL KIDS producent odziezy dla chlopców i dziewczynek w wieku 2-12 lat. Nasze ubrania szyte sa w Polsce z wysokogatunkowych, polskich dzianin z certyfikatem Oeko-Tex Standard 100. Dokladamy wszelkich staran w doborze dzianin, kolorów, kroju, aby dzieci czuly sie w naszych ubraniach wyjatkowo jak przystalo na Królewskie Dzieci. Wizja naszej firmy jest ksztaltowanie trendów w modzie dzieciecej.
		-->
		
		
	
	<button onclick="topFunction()" id="myBtn" title="Do góry"><span class="glyphicon glyphicon-arrow-up"></span></button>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/lightbox.js"></script>
    <script src="js/main.js"></script>
	
  </body>
</html>
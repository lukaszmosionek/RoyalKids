<?php 

session_start();
require 'config.php';

if( $_GET['q'] == 'logout' ){
	session_destroy();
	header("Location: admin.php");
}
if( !isset($_SESSION['admin']) ){ Lib::adminlogin(); }
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
    <link href="css/main.css?v=<?=rand();?>" rel="stylesheet">


<?php
	




if( !isset($_SESSION['admin']) ){
		echo '<div class="container-fluid">';
		echo '<div class="row adminlogin">';
		echo '<h1>Zaloguj sie do panelu admina</h1>';
		echo '<div class="col-xs-12 col-sm-4 col-sm-offset-4 ">';
		
		echo '<form  method="post">
			<input type="text" name="login" placeholder="Login">
			<input type="password" name="pass" placeholder="Hasło">
			<input type="submit" name="submitAdminLogin" class="btn btn-default"			value="Zaloguj">
			
		</form >';
		
		
		echo '</div>';
		echo '</div>';
		echo '</div>';
}else{
	
	
	Lib::saveAdmin();
	echo '<div class="container-fluid">';
		echo '<div class="row adminlogin">';
		echo '<div style="text-align:right;"><a class="btn btn-primary" href="admin.php?q=logout">Wyloguj</a></div>';
		echo '<h1>Witaj w panelu admina</h1>';
		
		echo '<div class="col-xs-12  ">';
		
		
		echo '<form  method="post" enctype="multipart/form-data">';
			echo '<textarea name="onas" placeholder="O nas">'.Lib::get('onas').'</textarea>';
			echo '<textarea name="text1" placeholder="Tekst1">'.Lib::get('text1').'</textarea>';
			echo '<textarea name="text2" placeholder="Tekst2">'.Lib::get('text2').'</textarea>';
			echo '<textarea name="text3" placeholder="Testt3">'.Lib::get('text3').'</textarea>';
			//echo '<pre>'.htmlspecialchars_decode(Lib::get('mapagoogle')).'</pre>';
			echo'<input type="text" name="mapagoogle" placeholder="Kod mapy google" value=\''.(htmlspecialchars_decode(Lib::get('mapagoogle'))).'\'>';
			echo'<input type="text" name="entext" placeholder="Tekst zachęcający" value="'.Lib::get('entext').'">';
			echo'<input type="text" name="mail" placeholder="Adres email" value="'.Lib::get('mail').'">';
			echo'<input type="text" name="adres" placeholder="Adres" value="'.Lib::get('adres').'">';
			echo'<input type="text" name="telefon" placeholder="Telefon" value="'.Lib::get('telefon').'">';
			//echo '<input type="file"  name="files[]" multiple>';
			
			echo '<label class="btn btn-default btn-file">
						 Wybierz zdjęcia<input type="file" name="fileToUpload[]" multiple style="display: none;">
				</label>';

			echo '<input type="submit" name="submit" class="btn btn-warning"			value="Zapisz">';
		echo '</form >';
		
		
		
		
		
		echo '</div>';
				if( count(filelist('galery'))>0 ){
					foreach( filelist('galery') as $file){
							echo '<div class=" singlephoto col-xs-12 col-sm-4 ">
										<div class="glyphicon glyphicon-minus" data-photoId="'.$file.'" title="usuń" onclick="deletePhoto(\''.$file.'\');"></div>
										<img width="300px"  src="galery/'.$file.'">
								</div>';	
					}
				}
		echo '</div>';
		echo '</div>';
	
	
	
	
	
}





?>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/function.js"></script>
    <script src="js/main.js"></script>
	
  </body>
</html>
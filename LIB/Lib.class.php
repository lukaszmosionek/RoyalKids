<?php

class Lib {
	static public function sendmail(){
			if( isset($_POST['submit']) ){
				$imie = $_POST['imie'];
				$mail = $_POST['mail'];
				$subject = $_POST['subject'];
				$message = $_POST['text'];
				
				
				$to      = 'kontakt@royal-kids.com.pl';
				$headers = 'From: '.$mail . "\r\n" .
					'Reply-To: '.$to . "\r\n" .
					'X-Mailer: PHP/' . phpversion();

				
				
				if( empty($imie) || empty($mail) || empty($subject) || empty($message) ){
					echo '<div class="alert alert-danger">Uzupełnij wszystkie pola!</div>';	
				}elseif ( !filter_var($mail, FILTER_VALIDATE_EMAIL) ) {
					echo '<div class="alert alert-danger">Błedny adres e-mail!</div>';	
				}else{
					
					if( mail($to, $subject, $message, $headers) ){
						echo '<div class="alert alert-success">Wysłano!</div>';	
					}else{
						echo '<div class="alert alert-danger">Błąd podczas wysyłania E-maila. Próbuj wysłać ręcznie pod adres '.$to.'</div>';	
					}
					
					
				}
				

				
				
			}
	}
	
	
	static public function adminlogin(){
		$loginOK = 'renata';
		$passOK = '123';
		
		if( isset($_POST['submitAdminLogin']) ){
				$login = $_POST['login'];
				$pass = $_POST['pass'];
				
			if( ($login == $loginOK) && ($pass == $passOK) ){
				
			
				$_SESSION['admin'] = 'logOK';
				header("Location:admin.php");
				echo '<div class="alert alert-success">Wysłano!</div>';				
			}else{
				echo '<div class="alert alert-danger">Błędne hasło!</div>';
			}
				
		
		}
		
		
	}
	
	static public function saveAdmin(){
		if( isset($_POST['submit']) ){
			
				$onas = $_POST['onas'];
				$text1 = $_POST['text1'];
				$text2 = $_POST['text2'];
				$text3 = $_POST['text3'];
				$mapagoogle = htmlspecialchars($_POST['mapagoogle']);
				$mail = $_POST['mail'];
				$entext = $_POST['entext'];
				$adres = $_POST['adres'];
				$telefon = $_POST['telefon'];
				$files = self::fileUpload();
				if($_FILES['fileToUpload']['name'][0]){
					foreach( $files as $file ){
						resize_image('galery/'.$file, 'galery/min/'.$file, 200, 200, 1);
					}
				}
				
				DatabaseManager::SQL("UPDATE test SET  onas='$onas', text1='$text1', entext='$entext', text2='$text2', text3='$text3', adres='$adres', mapagoogle='$mapagoogle', mail='$mail', telefon='$telefon' WHERE id=0 ");
		}
	}
	static public function get($get){
		$a = DatabaseManager::selectBySQL("SELECT $get FROM  test WHERE id=0 ");
		return $a[0][$get];
	}
	static public function fileUpload(){
					$target_dir = "galery/";
		
					if($_FILES['fileToUpload']['name'][0]){
					$total = count($_FILES['fileToUpload']['name']);
			
					// Loop through each file
					for($i=0; $i<$total; $i++) {
							$onefile = basename($_FILES["fileToUpload"]["name"][$i]);
							$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
							$uploadOk = 1;
							
							//checks
							$already_exists = 1;
							$file_size = 1; $size = 15*MB;
							$file_format = 1; $formats = array("jpg", "png", "jpeg", "gif");
							
							$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
							// Check if image file is a actual image or fake image
							if(isset($_POST["submit"])) {
								$check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
								if($check !== false) {
									$ok[] = '<div class="alert alert-success">Plik jest obrazem - " . $check["mime"] . ".".</div>';
									//echo '<div class="alert alert-success">Plik jest obrazem - " . $check["mime"] . ".".</div>';
									$uploadOk = 1;
								} else {
									$err[] = '<div class="alert alert-danger">Plik nie jest obrazem.</div>';
									//echo '<div class="alert alert-danger">Plik nie jest obrazem.</div>';
									$uploadOk = 0;
								}
							}
							// Check if file already exists
							if (file_exists($target_file) && $already_exists) {
								$err[] = '<div class="alert alert-danger">Taki plik już istnieje.</div>';
								//echo '<div class="alert alert-danger">Taki plik już istnieje.</div>';
								$uploadOk = 0;
							}
							// Check file size
							if ($_FILES["fileToUpload"]["size"][$i] > $size && $file_size) {
								$err[] = '<div class="alert alert-danger">Plik za dużo waży.</div>';
								//echo '<div class="alert alert-danger">Plik za dużo waży.</div>';
								$uploadOk = 0;
							}
							// Allow certain file formats
							/*if( in_array($imageFileType, $formats) ) {
								$err[] = '<div class="alert alert-danger">Tylko rozszerzenia JPG, JPEG, PNG & GIF są dozwolone</div>';
								//echo '<div class="alert alert-danger">Tylko rozszerzenia JPG, JPEG, PNG & GIF są dozwolone</div>';
								$uploadOk = 0;
							}*/
							// Check if $uploadOk is set to 0 by an error
							if ($uploadOk == 0) {
								$err[] =  '<div class="alert alert-danger">Plik nie został przesłany</div>';
								//echo '<div class="alert alert-danger">Plik nie został przesłany</div>';

							// if everything is ok, try to upload file
							} else {
								if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
									$ok[] =  '<div class="alert alert-success">Plik '. basename( $_FILES["fileToUpload"]["name"][$i]). ' został wysłany..</div>';
									//echo '<div class="alert alert-success">Plik '. basename( $_FILES["fileToUpload"]["name"][$i]). ' został wysłany..</div>';
								} else {
									$err[] =  '<div class="alert alert-danger">Wystąpił błąd podczas wysyłania pliku..</div>';
									//echo '<div class="alert alert-danger">Wystąpił błąd podczas wysyłania pliku..</div>';
								}
							}
							
							$target_files[] = $onefile; 
					}
					print_r($err);
					
					return $target_files;
					}
		}
	
}




?>
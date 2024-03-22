<?php


if( isset($_POST['deletePhoto']) && isset($_POST['id']) ){
	$id = $_POST['id'];
	
	echo unlink('../galery/'.$id) ;
	unlink('../galery/min/'.$id) ;
		
	
}







?>
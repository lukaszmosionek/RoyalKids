function deletePhoto(id){
	
	

		$.post( "js/ajax.php", { deletePhoto: 1, id: id })
		  .done(function( data ) {
			  
			  
			  if(data){
				$("div[data-photoId='"+id+"']").parent().hide('slow');
			  }else{
				  alert('Wystapił błąd podczas usuwania!');
			  }
			  
			  
			//alert( "Data Loaded: " + data );
			
				
			
		  });
	
}
<?php class ModuleLoader {
    
static public function load($MODULE) {
	switch($MODULE) {

			
case "header"://-------------------------------------------------------------------------------------------------
echo <<<PL
<div class="container top">
	<div class="row first">
		  <div class="col-xs-12"><a href="/"><img class="img-responsive" src="img/logo400px.png"></a></div>
		 <!-- <div class="col-xs-12 col-xs-offset-3 col-sm-3 col-sm-offset-0     phone">Skontaktuj sie z nami:<br><span>796-004-094</span></div>-->
	</div>
	
	
	<div class="row menu">
		
					<ul class="nav navbar-nav">
						  <li class="active menu"><a href="/">Home</a></li>
						  <li><a class="menu" href="#nasze-produkty">Nasze produkty</a></li>
						  <li><a class="menu" href="#o-nas">O nas</a></li>
						  <li><a class="menu" href="#mapa-dojazdu">Mapa dojazdu</a></li>
						  <li><a class="menu" href="#formularz-kontaktowy">Formularz kontaktowy</a></li>
					</ul>
		
	
	</div>
</div>
PL;
break;
			
case "nasze-produkty"://-------------------------------------------------------------------------------------------------		
echo '
<div class="row">
	<h1 id="nasze-produkty">Nasze produkty</h1>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		';

		for($i=1; $i<=count(filelist('galery')); $i++){
			echo '<li data-target="#myCarousel" '.(($i==1)?'class="active"':'').' data-slide-to="'.$i.'"></li>';
		}
		echo'
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
	';

			$i=0;
			foreach( filelist('galery') as $file){
				echo '<div class="item '.(($i==0)?'active':'').' ">
				  <img src="galery/'.$file.'" alt="">
				</div>';
				$i++;
			}


	echo'

	</div>

	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	</a>
	</div>
</div>
';
break;


case "onas"://-------------------------------------------------------------------------------------------------		
echo '<div class="row">	
			<h1 id="o-nas">O nas</h1>
			<p class="onas">'.Lib::get('onas').'</p>
		</div>';
break;
case "galeria"://-------------------------------------------------------------------------------------------------		
echo '<div class="row gallery">	
			<h1 id="o-nas">Galeria</h1>
			';
			/*$i=0;
			foreach( filelist('galery') as $file){
				
						echo '<div class="col-xs-6 col-sm-3 ">';
						echo '<a href="galery/'.$file.'" data-lightbox="roadtrip"><img class="img-responsive" src="galery/min/'.$file.'"></a>';
						echo '</div>';
				
			}*/
			echo';
			
			
		</div>';
break;
case "wspolpraca"://-------------------------------------------------------------------------------------------------		
echo '	<div class="container cooparate">
			<div class="row ">
				<h1>ZAPRASZAMY DO WSPÓLPRACY</h1>
				<div class="text">'.Lib::get('entext').'</div>
			</div>
		</div>';
break;
case "trojtext"://-------------------------------------------------------------------------------------------------		
echo '<div class="container">
			<div class="row icon-mid">
					<div class="col-xs-12 col-sm-4 "><span class="glyphicon glyphicon-ok-circle"></span><br><br><div class="text">'.Lib::get('text1').'</div></div>
					<div class="col-xs-12 col-sm-4 "><span class="glyphicon glyphicon-bookmark"></span><br><br><div class="text">'.Lib::get('text2').'</div></div>
					<div class="col-xs-12 col-sm-4 "><span class="glyphicon glyphicon-star"></span><br><br><div class="text">'.Lib::get('text3').'</div></div>

			</div>	
		</div>	';
break;
case "dojazd"://-------------------------------------------------------------------------------------------------		
echo '		<div class="row">	
			<h1 id="mapa-dojazdu">Mapa dojazdu</h1>
			'.htmlspecialchars_decode(Lib::get('mapagoogle')).'
			
		</div>	';
break;
case "contact-form"://-------------------------------------------------------------------------------------------------		
echo '		<div class="container contact-zone">		
				<div class="row ">	
				
				
					<h1 id="formularz-kontaktowy">Formularz kontaktowy</h1>
					
					<?php Lib::sendmail(); ?>	
				
					<div class="col-xs-12 col-sm-6 contact-text">
							Masz pytanie?<br>
							

							Skorzystaj z formularza kontaktowego lub pod adresem '.Lib::get('mail').'
					</div>
					<div class="col-xs-12 col-sm-6 ">
						<form method="post" action="index.php#formularz-kontaktowy">
							
							<div class="col-xs-12"><input type="text" name="imie" value="'.val('imie').'" placeholder="Twoje Imie"></div>
							<div class="col-xs-12 col-md-6"><input type="text"  name="mail" value="'.val('mail').'" placeholder="Twój E-Mail"></div>
							<div class="col-xs-12 col-md-6"><input type="text"  name="subject" value="'.val('subject').'" placeholder="Temat"></div>
							<div class="col-xs-12"><textarea placeholder="Tresc..." name="text" >'.val('text').'</textarea></div>
							
							<div class="col-xs-12 col-md-6"><button type="submit" name="submit" class="btn btn-default">Wyslij</button></div>
						
						</form>
						
						
					</div>
						
				</div>
				
		</div>';
break;
case "footer"://-------------------------------------------------------------------------------------------------		
echo '			<div class="container footer">	
			<div class="row ">
				<div class="col-xs-12 col-sm-4 "><span class="glyphicon glyphicon-map-marker"></span><br><br><span class="text">'.Lib::get('adres').'</span></div>
				<div class="col-xs-12 col-sm-4 "><span class="glyphicon glyphicon-envelope"></span><br><br><span class="text">'.Lib::get('mail').'</span></div>
				<div class="col-xs-12 col-sm-4 "><span class="glyphicon glyphicon-earphone"></span><br><br><span class="text">'.Lib::get('telefon').'</span></div>

			</div>
		</div>';
break;
}}}?>
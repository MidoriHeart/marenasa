<?php
/* @var $this SiteController */
 	$baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/inicio/inicio.css');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/core.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/core_plugin.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/control.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/autoscroll.js');
    $cs->registerScriptFile($baseUrl.'/js/carruselindex.js');

$this->pageTitle=Yii::app()->name;
?>
<div class="container1">
 	
		<div class="container11">
			<label class="titulo1">TITULO SIMULADO</label>
			<label class="subitutlo1">Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget 
				felis porttitor volutpat. </label>
			<div class= "botonVer"> Ver más</div>	
		</div>

	<div id="main-carousel">
		<ul>
			<li>
				<div class ="image1-carousel"></div>	
			</li>
			<li>
				<div class ="image1-carousel"></div>	
			</li>
		</lu>
	</div>
	<a href="#" class="flechaIzq"></a>
	<a href="#" class="flechaDer"></a>
</div>



<div class="container2">
	<div class="pContainer">
		     <div class ="oferta">
		     		<div class="letreror">-50%</div>
		     		<div class="ofertal">
		     			<label class ="subtitulo21">OFERTA ESPECIAL</label>
		     			<label class="subtitulo22">lorem Ipsum</label>
		     		</div>
		     		<div class="imagenOferta"></div>
		     		<div class="botonVerde">Ver más...</div>
		     </div>		 
		     	<label class="letrerosl2">Productos Estrella</label>
		 <div class="carousel-wrapper">
			<div id="second-carousel">
				 <ul>
					<li>
						<div class ="sproducto"><div class="images1"></div></div>
					</li>
					<li>
						<div class ="sproducto"><div class="images2"></div></div>
					</li>
					<li>
						<div class ="sproducto"><div class="images3"></div></div>
					</li>
						<li>
						<div class ="sproducto"><div class="images1"></div></div>
					</li>
					<li>
						<div class ="sproducto"><div class="images2"></div></div>
					</li>
					<li>
						<div class ="sproducto"><div class="images3"></div></div>
					</li>
					
				</ul>		
			</div>	
					<a href="#" class="flechaISl2"></a>
					<a href="#" class="flechaDSl2"></a>
		</div> 	
 	</div>
 </div>

<div class="container3">
	<div class="pContainer">
		<div class="contenerdor-tercero">

				<div class="categoriasl">
					<div class="imagenCat"></div>
					<div class="categoriasd">
							<label class="letreroCat">Categoria 3</label>
							<div class="botonVerdeC">Ver más</div>
					</div>
				</div>
				<div class="categoriasl">		
					<div class="imagenCat1"></div>
					<div class="categoriasd">
							<label class="letreroCat">Categoria 3</label>
							<div class="botonVerdeC">Ver más</div>
					</div>	
				</div>
				<div class="categoriasl">
					<div class="imagenCat2"></div>
					<div class="categoriasd">
							<label class="letreroCat">Categoria 3</label>
							<div class="botonVerdeC">Ver más</div>
					</div>
				</div>
				<div class="categoriasl">
					<div class="imagenCat3"></div>
					<div class="categoriasd">
							<label class="letreroCat">Categoria 3</label>
							<div class="botonVerdeC">Ver más</div>
					</div>
				</div>
				<div class="categoriasl">
					<div class="imagenCat"></div>
					<div class="categoriasd">
							<label class="letreroCat">Categoria 3</label>
							<div class="botonVerdeC">Ver más</div>
					</div>
				</div>
				<div class="categoriasl">		
					<div class="imagenCat1"></div>
					<div class="categoriasd">
							<label class="letreroCat">Categoria 3</label>
							<div class="botonVerdeC">Ver más</div>
					</div>	
				</div>
				<div class="categoriasl">	
					<div class="imagenCat2"></div>
					<div class="categoriasd">	
						<label class="letreroCat">Categoria 3</label>
						<div class="botonVerdeC">Ver más</div>
					</div>	
				</div>
				<div class="categoriasl">
					<div class="imagenCat3"></div>
					<div class="categoriasd">
						<label class="letreroCat">Categoria 4</label>
						<div class="botonVerdeC">Ver más</div>
					</div>
				</div>
		</div>	
	</div>
 	<div class="containerA3">
		<label class="letrarofCat">MÁS CATEGORÍAS</labeL>
		<div class="flechaCat"></div>
	</div>
</div>

<div class="container4">
	<div class="content-wrapper">
		<div class="pContainer">
			<div class ="titulares4">
				<label class="titulo41">Nosotros</label>
				<label class="titulo42">Subtitulo</label>
				<div class="linea41"></div>
				<label class="titulo43 ">Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec sollicitudin molestie malesuada. Vestibulum ac diam sit </label>
				<label class="titulo44">Leer más</label>
			</div>
			<div class ="titulares4">
				<label class="titulo41">Nosotros</label>
				<label class="titulo42">Subtitulo</label>
				<div class="linea41"></div>
				<label class="titulo43 ">Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec sollicitudin molestie malesuada. Vestibulum ac diam sit  </label>
				<label class="titulo44">Leer más</label>
			</div>
			<div class ="titulares4">
				<label class="titulo41">Nosotros</label>
				<label class="titulo42">Subtitulo</label>
				<div class="linea41">
			</div>
				<label class="titulo43 ">Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec sollicitudin molestie malesuada. Vestibulum ac diam sit</label>
				<label class="titulo44">Leer más</label></div>
			<div class ="titulares4">
	    		<label class="titulo41">Nosotros</label>
				<label class="titulo42">Subtitulo</label>
				<div class="image411"></div>
				<label class="titulo44">Leer más</label>
			</div>
			</div>
	</div>
</div>



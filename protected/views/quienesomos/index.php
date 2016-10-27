<?php
/* @var $this HistoriaController */

$baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/historia/historia.css');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/core.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/core_plugin.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/control.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/autoscroll.js');
     $cs->registerScriptFile($baseUrl.'/js/carruselHistoria.js');
?>

<div class="container-historia1">
		<div class="titulos1">Quienes somos?</div>
		<div class="subtitulos1">Nulla quis lorem ut libero malesuada 
			feugiat. Nulla quis lorem ut libero </div>
</div>
<div class="container-historia2">
	<div class="content-wrapper">
		<div class="container-texto">
			Donec rutrum congue leo eget malesuada. Mauris blandit aliquet elit,
		    eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum porta.
		    Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Mauris 
		    blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur aliquet quam 
		    id dui posuere blandit. Donec rutrum congue leo eget malesuada. Proin eget 
		    tortor risus. Quisque velit nisi, pretium ut lacinia in, elementum id enim.
		     Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
		 </div>
		<div class="figura-hist"></div>
	</div>
</div>
<div class="container-historia3">
	<div class="content-wrapper">
  <div class="f-carousel">
				<a href="#" class="flechaDerecha"></a>
					 <div id="carousell">
					 	<ul>
							<li>
								<div class="img imag1"></div>
							</li>
							<li>	
								<div class="img imag2"></div>
							</li>
							<li>	
								<div class="img imag3"></div>
							</li>
							<li>
								<div class="img imag1"></div>
							</li>
							<li>	
								<div class="img imag2"></div>
							</li>
							<li>	
								<div class="img imag3"></div>
							</li>
						</ul>
					</div>
				<a href="#" class="flechaIzquierda"></a>
</di>
	</div>
</div>
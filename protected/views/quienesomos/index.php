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
		<div class="titulos1"><?php echo $somos[0]->titulo;?></div>
		<div class="subtitulos1"><?php echo $somos[0]->subtitulo;?></div>
</div>
<div class="container-historia2">
	<div class="content-wrapper">
		<div class="container-texto">
             <?php echo $somos[0]->descripcion;?>
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
								<div class="img imag1">
									
								</div>
							</li>
						</ul>
					</div>
				<a href="#" class="flechaIzquierda"></a>
</di>
	</div>
</div>
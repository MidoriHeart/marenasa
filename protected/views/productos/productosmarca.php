<?php
/* @var $this HistoriaController */

$baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/productos/productos.css');
      $cs->registerCssFile($baseUrl.'/css/productos/productos-responsivos.css');
	$cs->registerScriptFile($baseUrl.'/js/plugins/nice-select/jquery.js');
	$cs->registerScriptFile($baseUrl.'/js/productos-marcas.js');
	$cs->registerScriptFile($baseUrl.'/js/plugins/nice-select/jquery.nice-select.js');
	$cs->registerCssFile($baseUrl.'/css/plugins/nice-select/nice-select.css');
	    $imagen = MarenasaHeaders::model()->findByPk(5)['imagen'];
    $headerImage = "background-image: url('$baseUrl/uploads/marenasaheaders/imagen/$imagen')"
?>
<div class="contenedor1-p" style="<?php echo $headerImage;?>">
	<div class="Titulo1-p">Productos</div>
</div>
<div class="contenedor3-p">
	<div class = "content-wrapper">
		<div class= "container-cc">	
	   		<?php foreach($marcaso as $data):?>
				<div class="buscador-producto">
					<div class="titulo-pm">      
						<?php echo $data['marca']?>
					</div>
					<div class="imagen-marca" style="background-image: url('<?php echo $baseUrl.'/uploads/marenasaproductomarcas/logo/'.$data['logo'];?>');">
					</div>	
					<div class="descripcion">
						<?php echo $data['descripcion']?>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</div>
</div>
<?php
/* @var $this ServiciosController */
	$baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerScriptFile($baseUrl.'/js/plugins/removeDiacritics/removeDiacritics.js');
    $cs->registerScriptFile($baseUrl.'/js/servicios/pedidos.js');
    $cs->registerCssFile($baseUrl.'/css/servicios/pediddosenlinea.css');
    $cs->registerCssFile($baseUrl.'/css/servicios/pedidosResponsivo.css');
?>
<div class="content-wrapper">
    <div class="white-bg">
        <div class="blue-ribbon"></div>
        <div class="white-container">
        	 <div class="cart-container">
        	 	<div class="titulo1">Boletin informativo</div>
                 <div class="tira">
        	 	<div class="info10">Fecha</div>
        	 	<div class="info11">Nombre</div>
        	 	<div class="info12">Descargar</div>
                 </div>
        	 	  <?php foreach($boletin as $data): ?>
        	 	   <div class="tira">
		        	 	<div class="paquete1"><?php echo $data->fecha;?></div>
		        	 	<div class="paquete2"><?php echo $data->nombre;?></div>
		        	 	<a class="paquete3" href="<?php echo $baseUrl.'/uploads/marenasaboletin/archivo/'.$data['archivo'];?>" download target="_blank"></a>
		        	</div>
		          <?php endforeach;?>
        	 </div>
           
        </div>	
    </div>	
</div>
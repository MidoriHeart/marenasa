<?php
/* @var $this HistoriaController */

$baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/productos/productos.css');
?>
<div class="contenedor1-p">
	<div class="Titulo1-p">Productos</div>
</div>
<div class="contenedor2-p">
	<div class="ddl-producto"></div> <div class="canasta-p"></div>
</div>
<div class="contenedor3-p">
	<div class="producto"></div>
</div>
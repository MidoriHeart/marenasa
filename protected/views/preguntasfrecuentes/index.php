<?php
$baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/frecuentes/preguntasfrecuentes.css');
?>
<div class="content-wrapper">
	<div class="container-left-pf">
	
	</div>
	<div class="container-rigut-pf">	
		<div class="container-imagen"></div>
		<div class="container-info"></div>
	</div>
</div>
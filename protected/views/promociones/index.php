<?php
/* @var $this MarenasaOfertasController */
/* @var $dataProvider CActiveDataProvider */
    $this->breadcrumbs=array(
            'Promociones',
    );
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/promociones/index.css');
?>
<div class="principal">
    <h1>Promociones</h1>
    <?php print_r($promociones);?>
</div>

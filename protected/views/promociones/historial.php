<?php
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerScriptFile($baseUrl.'/js/plugins/nice-select/jquery.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/nice-select/jquery.nice-select.js');
    $cs->registerCssFile($baseUrl.'/css/plugins/nice-select/nice-select.css');
    $cs->registerCssFile($baseUrl.'/css/promociones/historial.css');
    $cs->registerCssFile($baseUrl.'/css/promociones/historialResponsivo.css');
    $cs->registerScriptFile($baseUrl.'/js/promociones/historial.js');
    $ligaImagen = $baseUrl.'/uploads/marenasapromociones/imagen/';
    $total  = count($promociones);
    $date = date('Y-m-d');
?>
<h1><span>Historial de promociones</span></h1>
<div class="principal">
<!--    <div class="buscador-historial">
        <div>Selecciona un mes:</div>
        <div class="dropdownFecha">
            <select class="buscarFecha">
                <?php // MarenasaPromociones::model()->getMeses();?>
            </select>
        </div>
    </div>-->
    <div class="contenido">
        <div class="contenidoMovil">
            <?php $i = 0;?>
            <?php foreach($promociones as $data):?>
                <?php if($data->fecha_final < $date):?>
                    <?php $style = "background-image: url('$ligaImagen/$data->imagen')"?>
                    
                    <div class="promocion" style="<?php echo $style;?>" data-fechaI="<?php echo $data->fecha_final;?>" data-fechaF="<?php echo $data->fecha_inicio;?>"></div>
                <?php endif;?>
            <?php endforeach;?>
        </div>
    </div>
</div>
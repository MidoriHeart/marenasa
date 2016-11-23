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
    $ligaImagen = $baseUrl.'/uploads/marenasaproductos/imagen/';
    $total  = count($promociones);
?>
<h1><span>Historial de promociones</span></h1>
<div class="principal">
    <div class="buscador-historial">
        <div>Selecciona un mes:</div>
        <div class="dropdownFecha">
            <select class="buscarFecha">
                <?php MarenasaPromociones::model()->getMeses();?>
            </select>
        </div>
    </div>
    <div class="contenido">
        <div class="contenidoMovil">
            <?php $i = 0;?>
            <?php foreach($promociones as $data):?>
                <?php $imagen = MarenasaPromociones::model()->getProductoImagen($data->id_producto);?>
                <div class="promocion" data-fechaI="<?php echo $data->fecha_final;?>" data-fechaF="<?php echo $data->fecha_inicio;?>">
                    <div class="promoHeader">
                        <div class="rightHeader">
                            <div>OFERTA ESPECIAL</div>
                            <div><?php echo MarenasaPromociones::model()->getProducto($data->id_producto);?></div>
                        </div>
                        <div class="leftHeader">-<?php echo $data->porcentaje;?>%</div>
                    </div>
                    <div class="promoImagen" style="background-image: url('<?php echo $ligaImagen.$imagen;?>')">
                        <a href="">Ver m&aacute;s...</a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
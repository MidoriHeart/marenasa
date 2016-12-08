<?php
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/productos/subcategorias.css');
    $cs->registerCssFile($baseUrl.'/css/productos/subcategorias-responsivo.css');
    $style = "$baseUrl/uploads/marenasasubcategoria/imagen/";
?>
<div class="principal">
    <div class="imagenArriba">
        <div class="tituloImagen">Subcategorias</div>
    </div>
    <div class="subcategorias-wraper">
    <?php if(count($subcategorias) > 0):?>
        <?php foreach ($subcategorias as $data):?>
        <div class="subcategoria">
            <div class="imagen" style="background-image: url('<?php echo $style.$data->imagen;?>')"></div>
            <div class="nombreN"><?php echo $data->nombre;?></div>
            <div class="descripcion"><?php echo $data->descripcion;?></div>
        </div>
        <?php endforeach;?>
    <?php endif;?>
    </div>
</div>
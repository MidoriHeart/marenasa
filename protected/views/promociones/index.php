<?php
/* @var $this MarenasaOfertasController */
/* @var $dataProvider CActiveDataProvider */
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/promociones/index.css');
    $cs->registerCssFile($baseUrl.'/css/promociones/indexResponsivo.css');
    $cs->registerScriptFile($baseUrl.'/js/promociones/index.js');
    $ligaImagen = $baseUrl.'/uploads/marenasaproductos/imagen/';
    $imagenL = $baseUrl.'/uploads/marenasapromociones/imagen/';
    $total  = count($promociones);
    $date = date('Y-m-d');
?>
<h1><span>Promociones</span></h1>
<div class="principal">
    <div>
        <div class="carrusel">
            <div class="flechaI"></div>
            <div class="contenido">
                <div class="contenidoMovil">
                    <div>
                        <?php $i = 0;?>
                        <?php foreach($promociones as $data):?>
                            <?php if($data->fecha_final >= $date):?>
                                <?php // $imagen = MarenasaPromociones::model()->getProductoImagen($data->id_producto);?>
                                <div class="promocion" style="background-image: url('<?php echo $imagenL.$data['imagen'];?>')"></div>
                                <?php 
                                    $i++;
                                    if($i % 2 == 0)
                                        echo '</div><div>';
                                ?>
                            <?php endif;?>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <div class="flechaD"></div>
        </div>
    </div>
</div>

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
    $total  = count($promociones);
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
                            <?php if($data->porcentaje < 50):?>
                            <?php $imagen = MarenasaPromociones::model()->getProductoImagen($data->id_producto);?>
                            <div class="promocion">
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
    <?php if($total > $i):?>
        <div>
            <div class="tituloUltra">¡No te pierdas estas ofertas!</div>
            <div class="ultraPromo">
                <?php foreach ($promociones as $data):?>
                    <?php if($data->porcentaje >= 50):?>
                        <?php $imagen = MarenasaPromociones::model()->getProductoImagen($data->id_producto);?>
                        <div class="promocion">
                            <div class="promoHeader">
                                <div class="rightHeader">
                                    <div>OFERTA ULTRA ESPECIAL</div>
                                    <div><?php echo MarenasaPromociones::model()->getProducto($data->id_producto);?></div>
                                </div>
                                <div class="leftHeader">-<?php echo $data->porcentaje;?>%</div>
                            </div>
                            <div class="promoImagen" style="background-image: url('<?php echo $ligaImagen.$imagen;?>')">
                                <a href="">Ver m&aacute;s...</a>
                            </div>
                        </div>
                    <?php endif;?>
                <?php endforeach;?>
            </div>
        </div>
    <?php endif;?>
</div>

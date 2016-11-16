<?php
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerScriptFile($baseUrl.'/js/plugins/nice-select/jquery.js');
    $cs->registerScriptFile($baseUrl.'/js/productos/buscador.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/nice-select/jquery.nice-select.js');
    $cs->registerCssFile($baseUrl.'/css/plugins/nice-select/nice-select.css');
//    $cs->registerCssFile($baseUrl.'/css/productos/productos.css');
    $cs->registerCssFile($baseUrl.'/css/productos/buscador.css');
    $urlImagen = $baseUrl.'/uploads/marenasaproductos/imagen/';
?>
<div class="arriba">
    <div class="imagenArriba">
        <div class="imagenTexto">BUSCADOR</div>
    </div>
    <div class="menuOpciones">
        <div>
            <div class="titulo">Categor&iacute;a:</div>
            <?php  echo CHtml::dropDownList('buscarCategoria' , 'hola', $categorias, array('empty'=>'Todas', 'class'=>'buscar')); ?>
        </div>
        <div>
            <div class="titulo">Marca:</div>
            <?php  echo CHtml::dropDownList('buscarMarca' , 'hola', $marcas, array('empty'=>'Todas', 'class'=>'buscar')); ?>
        </div>
    </div>
</div>
<div class="principal">
    <div class="productosWraper">
        <?php foreach($productos as $data):?>
            <div class="producto" data-mar="<?php echo $data->id_marca;?>" data-cat="<?php echo $data->id_categoria;?>">
                <div class="productoWraper">
                    <div class="topProducto">
                        <div class="titulo"><?php echo $data->articulo;?></div>
                        <div class="imagen" style="background-image: url('<?php echo $urlImagen.$data->imagen;?>')"></div>
                    </div>
                    <div class="bottomProducto">
                        <div><?php echo $data->descripcion;?></div>
                        <div><?php echo $data->dimensiones;?></div>
                        <div>$<?php echo $data->precio;?></div>
                        <div>+</div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>
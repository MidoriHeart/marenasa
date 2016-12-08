<?php
/* @var $this HistoriaController */
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/productos/productos.css');
    $cs->registerCssFile($baseUrl.'/css/productos/productos-responsivos.css');
    $cs->registerScriptFile($baseUrl.'/js/plugins/nice-select/jquery.js');
    $cs->registerScriptFile($baseUrl.'/js/productos-ddl.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/nice-select/jquery.nice-select.js');
    $cs->registerCssFile($baseUrl.'/css/plugins/nice-select/nice-select.css');
    $imagen = MarenasaHeaders::model()->findByPk(2)->imagen;
    $headerImage = "background-image: url('$baseUrl/uploads/marenasaheaders/imagen/$imagen')";
?>
<div class="contenedor1-p" style="<?php echo $headerImage;?>">
    <div class="Titulo1-p">Productos</div>
</div>
<!--<div class="contenedor2-p">
    <div class="contenedor2-1p">
        <div class="titulo-ddl">Marca:</div>
        <div class="ddl-producto">
            <select class = "ddl-style"> 
                <option value='0' data-display="Select">Todas</option>
                <?php // foreach($marca as $data):?>
                    <option value="<?php // echo $data->id;?>"><?php // echo $data->marca;?></option>
                <?php // endforeach;?>
                <?php reset($marca); ?>
            </select>
        </div>
    </div>
    <div class="contenedor2-2p">
        <div class="canasta-p"></div>
    </div>	 
</div>-->
<div class="contenedor3-p">
    <div class = "content-wrapper">
        <?php foreach($marca as $data):?>
            <div class="buscador-producto">
                <div class="imagen-marca" style="background-image: url('<?php echo $baseUrl.'/uploads/marenasaproductocategorias/imagen/'.$data['imagen'];?>');"></div>	
                <div class="titulo-pm">
                    <a href="<?php echo $baseUrl.'/index.php/productos/subcategorias?id='.$data['id'];?>">
                    <?php echo $data['categoria']?>
                    </a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>
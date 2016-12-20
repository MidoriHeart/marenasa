<?php
/* @var $this SiteController */
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/inicio/inicio.css');
    $cs->registerCssFile($baseUrl.'/css/inicio/inicio-responsivo.css');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/core.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/core_plugin.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/control.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/autoscroll.js');
    $cs->registerScriptFile($baseUrl.'/js/carruselindex.js');
    $carrusel = MarenasaInicioCarrusel::model()->findAll();
    $this->pageTitle=Yii::app()->name;
    $urlImagenProducto = $baseUrl.'/uploads/marenasaproductos/imagen/';
    $urlImagenCategoria = $baseUrl.'/uploads/marenasaproductocategorias/imagen/';
    $nombreProducto = MarenasaProductos::model()->getNombre($ofertaEspecial['id_producto']);
    $imagenProducto = 'background-image: url('.$baseUrl.'/uploads/marenasaproductos/imagen/'.MarenasaProductos::model()->getImagen($ofertaEspecial['id_producto']).')';
?>
<div class="container1">
   <!--  <div class="container11">
        <label class="titulo1"><?php //echo $titulo[0]->titulo ;?></label>
        <label class="subitutlo1"><?php // echo $titulo[0]->subtitulo ;?> </label>
        <div class= "botonVer hide"> Ver más</div>	
    </div>  -->
    <div id="main-carousel">
        <ul>
            <?php foreach($carrusel as $data):?>
                <li>
                    <div class="image1-carousel" style="background-image: url('<?php echo $baseUrl.'/uploads/marenasainiciocarrusel/imagen/'.$data['imagen'];?>');">
                </li>
            <?php endforeach;?>
        </lu>
    </div>
    <a href="#" class="flechaIzq"></a>
    <a href="#" class="flechaDer"></a>
</div>
<div class="container2">
    <div class="ppContainer">
        <div class="contenedorIzquierdo"> 
            <div class="letrerosl2">PRODUCTOS</div>
            <div class="carousel-wrapper">
                <a href="#" class="flechaISl2"></a>
                <div id="second-carousel">
                    <ul>
                        <?php foreach($productosEstrella as $data):?>
                            <li>
                                <div class ="sproducto">
                                    <div style="background-image: url('<?php echo $urlImagenProducto.$data['imagen'];?>')"></div>
                                </div>
                            </li>
                        <?php endforeach;?>
                   </ul>		
                </div>	
                <a href="#" class="flechaDSl2"></a>
            </div>	
        </div> 
        <div class="contenedorDerecha">
            <div class ="oferta">
                <div class="ofertaUp">
                    <div class="ofertal">
                        <label class ="subtitulo21">OFERTAS</label>
                        <label class="subtitulo22"><?php echo $nombreProducto;?></label>
                    </div>
                    <!-- <div class="letreror">-50%</div> -->
                </div>
                <div class="ofertaDown">
                    <div class="imagenOferta" style="background-image: url('<?php echo $baseUrl.'/uploads/marenasapromociones/imagen/'.$ofertaEspecial['imagen']?>"></div>
                    <a class="botonVerde" href="<?php echo $baseUrl;?>/index.php/promociones/index">Ver más...</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container3">
    <div class="ppContainer2">
        <div class="categoriasTitulo">CATEGOR&Iacute;AS</div>
        <div class="contenerdor-tercero">
            <?php foreach($categorias as $data):?>
                <div class="categoriasl">
                    <div class="imagenCat" style="background-image: url('<?php echo $urlImagenCategoria.$data['imagen'];?>')"></div>
                    <div class="categoriasd">
                        <label class="letreroCat"><?php echo $data->categoria; ?></label>
                        <a class="botonVerdeC" href="<?php echo $baseUrl;?>/index.php/productos/index">Ver más</a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>	
    </div>
    <?php if(count($categorias) > 4):?>
    <div class="containerA3">
        <label class="letrarofCat">MÁS CATEGORÍAS</labeL>
        <div class="flechaCat"></div>
    </div>
    <?php endif;?>
</div>
<div class="container4">
    <div class="content-wrapper">
        <div class="ppContainer2">
        <?php if(count($ofertasMenores) > 0) : ?>
            <?php foreach($ofertasMenores as $data):?>
                <div class ="titulares4">
                    <label class="titulo41">OFERTAS</label>
                    <label class="titulo42"><?php echo MarenasaProductos::model()->getNombre($data['id_producto']);?></label>
                    <div class="image411" style="background-image: url('<?php echo $baseUrl.'/uploads/marenasapromociones/imagen/'.$data['imagen']?>')"></div>
                    <a class="titulo44" href="<?php echo $baseUrl;?>/index.php/promociones/index">Ver más</a>
                </div>
            <?php endforeach;?>
        <?php endif; ?>
        </div>
    </div>
</div>
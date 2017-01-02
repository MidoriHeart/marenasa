<?php
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/frecuentes/preguntasfrecuentes.css');
    $cs->registerCssFile($baseUrl.'/css/frecuentes/preguntasfrecuentes-responsivo.css');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/core.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/core_plugin.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/control.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/autoscroll.js');
    $cs->registerScriptFile($baseUrl.'/js/preguntasfrecuentes.js');
    $cs->registerScriptFile($baseUrl.'/js/preguntasfrecuentes11.js');
        $imagen = MarenasaHeaders::model()->findByPk(6)['imagen'];
    $headerImage = "background-image: url('$baseUrl/uploads/marenasaheaders/imagen/$imagen')"
?>
<div class="principal">
    <div class="content-wrapper">
        <div class ="grande">
            <div class="izquierdo">
                <div class="categorias-wraper>">
                    <div class="titulo1">Preguntas Frecuentes</div>
                    <?php $first = false; ?>		
                    <?php foreach($categorias as $data):?> 
                        <?php 
                            if($first == false)
                            {
                                $class = "categoria-wraper activo";
                                $first = true;
                            }
                            else
                                $class = "categoria-wraper";
                        ?>
                        <div class="<?php echo $class;?>">
                            <div class="tipo-letra-cat"> 
                                <?php echo $data['categoria'];?>
                            </div>
                            <?php $pregunta  = false;?>
                            <div class="preguntas-wraper">
                                <ul>
                                    <?php 
                                        $criteria = new CDbCriteria();
                                        $criteria->condition = "id_marenasa = '{$data['id']}'";
                                        $preguntas= MarenasaPreguntas::model()->findAll($criteria); 
                                    ?>
                                    <?php foreach($preguntas as $datos):?>
                                            <?php if($pregunta == false):?>
                                                <li>
                                                    <div  class="pregunta selected"  data-id='<?php echo $datos->id;?>'> 
                                                        <?php echo $datos['pregunta'];?>
                                                    </div>
                                                </li>
                                                <?php $pregunta = true;?>
                                            <?php else:?>
                                                <li>
                                                    <div class ="pregunta" data-id='<?php echo $datos->id;?>'> 
                                                        <?php echo $datos['pregunta'];?>
                                                    </div>
                                                </li>
                                            <?php endif;?>
                                    <?php endforeach;?>
                                    </ul>
                            </div>
                        </div>
                        <div class="linea"></div>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="derecha">
                <div class="container-imagen">
                    <div class="newImage" style="<?php echo $headerImage;?>" >
                        <div class="titulo-transparente">
                            <div class="titulocat">Preguntas Frecuentes</div>
                        </div>
                    </div>
                    <div class="container-info">
                        <?php $opcion = false;?>
                        <?php foreach($preguntas_freq as $data):?>
                            <?php 
                                if($opcion == false)
                                {
                                    $class = "container-Preguntas activo";
                                    $opcion = true;
                                }
                                else
                                    $class = "container-Preguntas";
                            ?>
                            <div class="<?php echo $class;?>" data-id='<?php echo $data->id;?>'>
                                <div class="cont-categoria">
                                    <?php $categoria = MarenasaPreguntasCategoria::model()->findByPk($data->id_marenasa);?>
                                    <?php echo $categoria->categoria;?>
                                </div>
                                <div class="cont-pregunta-respuesta">
                                    <div class="preguntas">
                                        <?php echo $data->pregunta; ?>
                                    </div>
                                    <div class="respuestas">
                                        <?php echo $data->respuesta; ?>
                                    </div>
                                    <div class="imagen-preguntas-frecuentes" style="background-image: url('<?php echo $baseUrl.'/uploads/marenasapreguntas/imagen/'.$data['imagen'];?>');">
                                </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="chico">
            <div class="container-imagen">
                <div class="newImage">
                    <div class="titulo-transparente">
                        <div class="titulocat">Preguntas Frecuentes</div>
                    </div>
                </div>
            </div>
            <div class = "arriba">
                <div class="carrusel-frecuentes">
                    <a href="#" class="flechaDerecha"></a>
                    <div id="carousell">
                        <ul>
                            <?php $first = false; ?>
                            <?php foreach($categorias as $data):?> 
                                <li>
                                    <?php if($first == false):?>
                                        <div class="categoria-wraper activo" data-categoria="<?php echo $data->id; ?>">
                                        <?php $first = true;?>
                                    <?php else: ?>
                                        <div class="categoria-wraper" data-categoria="<?php echo $data->id; ?>">
                                    <?php endif;?>
                                        <div class="tipo-letra-cat"> 
                                            <?php echo $data['categoria'];?>
                                        </div>
                                    <?php $pregunta  = false;?>
                                </li>
                            <?php endforeach;?>	
                            <?php reset($categorias);?>
                        </ul>
                    </div>
                    <a href="#" class="flechaIzquierda"></a>
                </div>
            </div>
            <div class = "abajo">
                <?php $pregunta  = false;?>
                <div class="preguntas-wraper">
                    <ul>
                        <?php foreach($categorias as $data): ?>
                            <?php 
                                $criteria = new CDbCriteria();
                                $criteria->condition = "id_marenasa = '{$data['id']}'";
                                $preguntas= MarenasaPreguntas::model()->findAll($criteria); 
                            ?>
                            <?php foreach($preguntas as $datos):?>
                                <?php if($pregunta == false):?>
                                    <li>
                                        <div  class="pregunta selected"  data-catid="<?php echo $data->id; ?>" data-id='<?php echo $datos->id;?>'> 
                                            <?php echo $datos['pregunta'];?>
                                        </div>
                                        <div class="linea"></div>
                                    </li>
                                    <?php $pregunta = true;?>
                                <?php else:?>
                                    <li>
                                        <div class ="pregunta" data-catid="<?php echo $data->id; ?>" data-id='<?php echo $datos->id;?>'> 
                                        <?php echo $datos['pregunta'];?>
                                        </div>
                                        <div class="linea"></div>
                                    </li>
                                <?php endif;?>
                            <?php endforeach;?>
                        <?php endforeach;?>
                    </ul>
                </div>
                <div class="container-info">
                    <?php $opcion = false;?>
                    <?php foreach($preguntas_freq as $data):?>
                        <?php 
                            if($opcion == false)
                            {
                                $opcion = true;
                                $class = "container-Preguntas activo";
                            }
                            else
                                $class = "container-Preguntas";
                        ?>
                        <div class="<?php echo $class;?>" data-id='<?php echo $data->id;?>'>
                            <div class="cont-pregunta-respuesta">
                                <div class="preguntas">
                                    <?php echo $data->pregunta; ?>
                                </div>
                                <div class="respuestas">
                                    <?php echo $data->respuesta; ?>
                                </div>
                                <div class="imagen-preguntas-frecuentes" style="background-image: url('<?php echo $baseUrl.'/uploads/marenasapreguntas/imagen/'.$data['imagen'];?>');">
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
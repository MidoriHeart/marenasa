<?php
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/misionvision/misionvision.css');
    $cs->registerCssFile($baseUrl.'/css/misionvision/misionvision-responsivo.css');
    $imagen = MarenasaHeaders::model()->findByPk(3)->imagen;
    $headerImage = "background-image: url('$baseUrl/uploads/marenasaheaders/imagen/$imagen')";
?>
<div class="superior-mv" style="<?php echo $headerImage;?>">
    <!-- <div class="tituloprimero-mv">Misión y Visión</div> -->
</div>
<div class="inferior-mv">
    <div class="content-wrapper">
        <div class="arriba-mv">
            <div class="mision-des">	
                <div class="titulo-mv">Misión</div>
                    <?php foreach($mision as $data):?>
                        <?php echo $data['mision'];?>
                    <?php endforeach;?>			
            </div>
            <div class="img-montania"></div>
        </div>
        <div class="abajo-mv">	
            <div class="vision-des">
            <div class="titulo-mv">Visión</div> 
                <?php foreach($vision as $data):?>
                    <?php echo $data['vision'];?>  
                <?php endforeach;?>
            </div>	
            <div class="img-foco"></div>				
        </div>
    </div>
</div>
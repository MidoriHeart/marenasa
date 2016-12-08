<?php
$baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/contacto/contacto.css');
    $cs->registerCssFile($baseUrl.'/css/contacto/responsivo.css');
    $cs->registerScriptFile($baseUrl.'/js/email.js');
    $imagen = MarenasaHeaders::model()->findByPk(2)->imagen;
    $headerImage = "background-image: url('$baseUrl/uploads/marenasaheaders/imagen/$imagen')";
?>
	<div class= "superior-cnt" style="<?php echo $headerImage;?>">
	<div class="titulo-cnt">Contacto</div>
	</div>

	<div class ="inferior-cnt">
		<div class = "contenido-wrapper">

			<div class= "izquierda-cnt">
				<div class="descripcion-cnt">
					<?php echo $contacto[0]->descripcion ;?>.</div>
				<div class="informacion-cnt">
					<div>Numero de contacto: <?php echo $contacto[0]->numero ;?></div>
					<div>Otro número: <?php echo $contacto[0]->otronumero ;?></div>
					<div>Fax: <?php echo $contacto[0]->fax ;?></div>
					<div>Email: <?php echo $contacto[0]->email ;?></div>	
				</div>
			</div>	
			<div  class="derecha-cnt">

			      <div class="correo">
                <form method="POST" name="Contacto" id="correoMarenasa" action="<?php echo $baseUrl ;?>/contacto/sendCorreo">
                    <div class="rowWraper">
                        <div class="ltitulo1">Escr&iacute;benos</div>
                        <div class="row">
                            <div class="inputField">
                                <input class="nombre" type="text" name="nombre" placeholder="Nombre" autocomplete="off">
                            </div>
                        </div>
                        <div class="row1">
                            <div class="inputField">
                                <input class="email" type="text" name="email"  placeholder="Correo electrónico"autocomplete="off">
                            </div>
                        </div>
                        <div class="row2">
                            <div class="inputField">
                                <textarea class="asunto" name="tasunto" placeholder="Mensaje"  autocomplete="off"></textarea>   
                            </div>                
                        </div>
                        <div class="row3">
                            <input class="boton" type="submit" value="Enviar" >
                        </div>
                    </div> 
                </form>
            </div>
				</div>
			</div>
		</div>	
	</div>	
<?php
$baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/contacto/contacto.css');
    $cs->registerCssFile($baseUrl.'/css/contacto/responsivo.css');
    $cs->registerCssFile($baseUrl.'/css/sucursales/sucursales.css');
    $cs->registerCssFile($baseUrl.'/css/sucursales/sucursales-responsivo.css');
    $cs->registerScriptFile($baseUrl.'/js/email.js');
    $imagen = MarenasaHeaders::model()->findByPk(4)->imagen;
    $headerImage = "background-image: url('$baseUrl/uploads/marenasaheaders/imagen/$imagen')";
        $cs->registerCssFile($baseUrl.'/css/sucursales/sucursales.css');
    $cs->registerCssFile($baseUrl.'/css/sucursales/sucursales-responsivo.css');
?>
	<div class= "superior-cnt" style="<?php echo $headerImage;?>">
	</div>

	<div class ="inferior-cnt">
	<div class = "contenido-wrapper">
		<div class= "izquierda-cnt">
			<div class="descripcion-cnt">
				<?php echo $contacto[0]->descripcion ;?>.
            </div>
			<div class="informacion-cnt">
				<div>Numero de contacto: <?php echo $contacto[0]->numero ;?></div>
				<div>Otro número: <?php echo $contacto[0]->otronumero ;?></div>
				<div>Fax: <?php echo $contacto[0]->fax ;?></div>
				<div>Email: <?php echo $contacto[0]->email ;?></div>	
			</div>
		</div>	
		<div  class="derecha-cnt">
    		<div class="correocontacto">
               <form method="POST" name="Contacto" id="correocontactoMarenasa" action="<?php echo $baseUrl;?>/index.php/contacto/sendContactoCorreo">
                    <div class="rowWraper">
                        <div class="ltitulo1">Escr&iacute;benos</div>
                        <div class="row">
                            <div class="inputField">
                                <input class="nombre" type="text" name="nombre" placeholder="Nombre" autocomplete="off">
                            </div>
                        </div>
                        <div class="row1">
                            <div class="inputField">
                                <input class="email" type="text" name="email"  placeholder="Correo electrónico" autocomplete="off">
                            </div>
                        </div>
                        <div class="row4">
                            <div class="inputField">
                                <input class="noDcliente" type="text" name="noDcliente" placeholder="No. de Cliente (opcional)" autocomplete="off">
                            </div>
                        </div>
                        <div class="row5">
                            <div class="inputField">
                                <input class="telefono" type="text" name="telefono"  placeholder="Teléfono" autocomplete="off">
                            </div>
                        </div>
                        

                        <div class="row2">
                            <div class="inputField">
                                <textarea class="asunto" name="asunto" placeholder="Mensaje"  autocomplete="off"></textarea>   
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
<div class= "banner-scl">
    <div class="titulo1-scl">Sucursales</div>
</div>
<div class="contenedor-scl">
            <div class="content-wrapper">
                <?php foreach($sucursales as $data):?>
                    <div class="container-sucursales">
                        <div class ="imagen-scl" style="background-image: url('<?php echo $baseUrl.'/uploads/marenasasucursales/imagen/'.$data['imagen'];?>');"> </div>
                        <div class="informacion-scl">
                            <div class="titulo2-scl"><?php echo $data['nombre'];?> </div>
                            <div class="text-scl"><?php echo $data['direccion'];?> </div>
                            <div class="text-scl"><?php echo $data['horarios'];?> </div>
                            <div class="text-scl"><?php echo $data['telefono1'];?> </div>
                            <div class="text-scl"><?php echo $data['telefono2'];?> </div>
                            <div class="text-scl"><?php echo $data['email'];?> </div>
                        </div>
                    </div>
                <?php endforeach;?>
        </div>
    </div>

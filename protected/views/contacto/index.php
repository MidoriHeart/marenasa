<?php
$baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/contacto/contacto.css');
    $cs->registerCssFile($baseUrl.'/css/contacto/responsivo.css');
?>
	<div class= "superior-cnt">
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
	            <form method="POST" name="Contacto">
	                <div class="rowWraper">
	                	<div class="ltitulo11">Escr&iacute;benos</div>
	                	<div class ="lmensaje">Deja tu mensaje!</div>
	                    <div class="row">
	                        <div class="inputField">
	                            <input type="text" name="nombre" autocomplete="off" placeholder="Nombre">
	                        </div>
	                    </div>
	                    <div class="row1">
	                        <div class="inputField">
	                            <input type="text" name="telefono" autocomplete="off" placeholder="Email">
	                        </div>
	                    </div>
	                    <div class="row2">
	                    	<div class="inputField">
                                     <textarea type="text" name="tasunto" autocomplete="off" placeholder="Mensaje..."></textarea>  
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
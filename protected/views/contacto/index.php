<?php
$baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/contacto/contacto.css');
?>
	<div class= "superior-cnt">
	<div class="titulo-cnt">Contacto</div>
	</div>

	<div class ="inferior-cnt">
		<div class = "content-wrapper">
			<div class= "izquierda-cnt">
				<div class="descripcion-cnt">
					Sed porttitor lectus nibh. Donec rutrum congue leo eget malesuada. Nulla quis lorem ut libero malesuada feugiat. 
					Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor
					 eget felis porttitor volutpat. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec rutrum
					  congue leo eget malesuada. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Sed porttitor lectus nibh.</div>
				<div class="informacion-cnt">
					<div>Numero de contacto: 545 4544</div>
					<div>Otro búmero: 354 6677</div>
					<div>Fax: 545 6677</div>
					<div>Email: marenasa!marenasa.com</div>	
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
	                       		 <input type="text" name="tasunto" autocomplete="off" placeholder="Mensaje...">    
	                       	 </div>                
	               		</div>
	               		 <div class="row3">
	                        <input class="boton" type="submit" value="enviar" >
	             	   </div>
				 </div> 
	            </form>
	        </div>

			</div>
		</div>	
	</div>	
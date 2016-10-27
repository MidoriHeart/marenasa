<?php
$baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/frecuentes/preguntasfrecuentes.css');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/core.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/core_plugin.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/control.js');
    $cs->registerScriptFile($baseUrl.'/js/plugins/jCarousel/src/autoscroll.js');
     $cs->registerScriptFile($baseUrl.'/js/preguntasfrecuentes.js');
?>
		<div class="content-wrapper">
			<div class="izquierdo">
				<div class="categorias-wraper>">	
					<div class="titulo1">Preguntas Frecuentes</div>
						<?php foreach($categotia as $data)?> 
							<div class="categoria-wraper activo" >
								<?php if($contar[$data['id']] == 0):?><?php ?>
								<div class="tipo-letra-cat"> <?php echo $data['categoria'];?></div>
								<div class="preguntas-wraper">
									<ul>
										<li>pregunta 1</li>
										<li>pregunta 2</li>
										<li>pregunta 3</li>
										<li>pregunta 4</li>
										<li>pregunta 5</li>
									</ul>
								</div>
							</div>
							<div class="linea"></div>
							<?php endforeach?>	
							<!--<div class="categoria-wraper">
								<div class="tipo-letra-cat">Categoria 2</div>
								<div class="preguntas-wraper">
									<ul>
										<li>pregunta 1</li>
										<li>pregunta 2</li>
										<li>pregunta 3</li>
										<li>pregunta 4</li>
										<li>pregunta 5</li>
									</ul>
								</div>
							</div>	
							<div class="linea"></div>
							<div class="categoria-wraper">	
								<div class="tipo-letra-cat">Categoria 3</div>
								<div class="preguntas-wraper">
									<ul>
										<li>pregunta 1</li>
										<li>pregunta 2</li>
										<li>pregunta 3</li>
										<li>pregunta 4</li>
										<li>pregunta 5</li>
									</ul>
								</div>
							</div>	
							<div class="linea"></div>
							<div class="categoria-wraper">
								<div class="tipo-letra-cat">Categoria 4</div>
								<div class="preguntas-wraper">
									<ul>
										<li>pregunta 1</li>
										<li>pregunta 2</li>
										<li>pregunta 3</li>
										<li>pregunta 4</li>
										<li>pregunta 5</li>
									</ul>
								</div>
							</div>	
							<div class="linea"></div>
							<div class="categoria-wraper">
								<div class="tipo-letra-cat">Categoria 5</div>
									<div class="preguntas-wraper">
										<ul>
											<li>pregunta 1</li>
											<li>pregunta 2</li>
											<li>pregunta 3</li>
											<li>pregunta 4</li>
											<li>pregunta 5</li>
										</ul>
									</div>
								</div>	-->		
							</div>
				</div>
			<div class="derecha">	
				<div class="container-imagen">
						<div class="newImage">
							<div class="titulo-transparente"><div class="titulocat">Preguntas Frecuentes</div></div>
						</div>
						
				</div>
				<div class="container-info">
					<div class="container-Preguntas">
						<div class="cont-categoria">Categorias</div>
						<div class="cont-pregunta-respuesta">
							<div class="preguntas">Pregunta</div>
							<div class="respuestas">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere 
													cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper 
													sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor 
													at sem. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.
													Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur non
													nulla sit amet nisl tempus convallis quis ac lectus. Vivamus magna justo,
													lacinia eget consectetur sed, convallis at tellus. Proin eget tortor risus.
													Nulla porttitor accumsan tincidunt. Nulla quis lorem ut libero malesuada 
													feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
						</div>
					</div>
				</div>
			</div>
		</div>

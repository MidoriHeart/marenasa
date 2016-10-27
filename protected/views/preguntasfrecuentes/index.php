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
					<?php $first = false; ?>
						<?php foreach($categorias as $data):?> 
						    <?php if($first == false):?>
								<div class="categoria-wraper activo" >
									<?php $first = true;?>
								<?php else: ?>
								<div class="categoria-wraper" >
								<?php endif;?>
								 <?php // if($contar[$data['id']] == 0):?><?php //endif;?>
								<div class="tipo-letra-cat"> <?php echo $data['categoria'];?></div>
								<?php $pregunta  = false;?>
									<div class="preguntas-wraper">
										<ul>
										<?php foreach($pregunta as $data):?>
										 		<?php if($pregunta == false):?>
														<li>	
															<div class="selected"> 
																<?php echo $data['pregunta'];?>
															</div>
														</li>
													<?php $pregunta = true;?>
												<?php else:?>
												    <li><?php echo $data['pregunta'];?></li>
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

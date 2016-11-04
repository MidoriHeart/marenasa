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
								<div class="tipo-letra-cat"  > <?php echo $data['categoria'];?></div>
								<?php $pregunta  = false;?>
									<div class="preguntas-wraper">
										<ul>
											<?php 
												$criteria = new CDbCriteria();
												$criteria->condition = "id_marenasa = '{$data['id']}'";
												$preguntas= MarenasaPreguntas::model()->findAll($criteria); ?>
										<?php foreach($preguntas as $datos):?>
										 	
										 		<?php if($pregunta == false):?>
														<li>	
															<div  class="pregunta selected"  data-id='<?php echo $datos->id;?>'> 
																<?php echo $datos['pregunta'];?>
															</div>
														</li>
													<?php $pregunta = true;?>
												<?php else:?>
												    <li><div class ="pregunta" data-id='<?php echo $datos->id;?>'> 
												    	<?php echo $datos['pregunta'];?></div></li>
												<?php endif;?>
 										 <?php endforeach;?>
										</ul>
									</div>
							</div>
							<div class="linea"></div>
						<?php endforeach;?>	
							</div>
				</div>
			</div>
			<div class="derecha">	
				<div class="container-imagen">
						<div class="newImage">
							<div class="titulo-transparente">
								<div class="titulocat">Preguntas Frecuentes</div>
							</div>
						</div>
				</div>
				<div class="container-info">
					<?php $opcion = false;?>
					<?php foreach($preguntas_freq as $data):?>
							<?php if($opcion == false):?>
						<div class="container-Preguntas activo" data-id='<?php echo $data->id;?>'>	
							<?php $opcion = true;?>
						<?php else: ?>
							<div class="container-Preguntas" data-id='<?php echo $data->id;?>'>
							<?php endif; ?>	
							<div class="cont-categoria">
								<?php 
									$categoria = MarenasaPreguntasCategoria::model()->findByPk($data->id_marenasa);?>
								<?php echo $categoria->categoria;?>
							</div> 
								<div class="cont-pregunta-respuesta">
									<div class="preguntas">
										<?php echo $data->pregunta; ?>
									</div>
									<div class="respuestas">
										<?php echo $data->respuesta; ?>
									
									</div>
								</div> 
					</div>
					<?endforeach;?>
				</div>
			</div>
	</div>

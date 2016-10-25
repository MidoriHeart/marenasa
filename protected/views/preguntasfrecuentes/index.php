<?php
$baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/frecuentes/preguntasfrecuentes.css');
?>
<div class="content-wrapper">
	<div class="container-left-pf">
	
	</div>
	<div class="container-rigut-pf">	
		<div class="container-imagen"></div>
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
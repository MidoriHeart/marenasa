<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div class="logoMarenasa"></div>
		<label class="lheader">¡S&iacute;guenos!</label>
		<div id="logo"></div>
		<div class="facebook"></div>
		<div class="twitter"></div>
		<div class="blogspot"></div>
		<div class="buscador"></div><div class="lupa"></div>
	</div><!-- header -->

	<div id="mainmenu">
		<div class= "content-wrapper">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index')),
				array('label'=>'Quienes Somos', 'url'=>array('/quienesomos')),
				array('label'=>'Preguntas Frecuentes', 'url'=>array('/preguntasfrecuentes'))
			/*	array('label'=>'Nosotros', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Productos', 'url'=>array('/site/contact')),
				array('label'=>'Promociones', 'url'=>array('/site/contact')),
				array('label'=>'Servicios', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
     			array('label'=>'Sucursales', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Contactos', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),	*/		),
		)); ?>
	</div>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<div class= "content-wrapper">

			<div class="informacion">
				<div class ="info1">
					<div class="ltitulo1">Nosotros</div>
					<div class="subtitulo1">¿Quienes somos?</div>
					<div class="subtitulo1">Misión y Visión</div>
					<div class="ltitulo1">Productos</div>
					<div class="subtitulo1">Por categoria</div>
					<div class="subtitulo1">Por marca</div>
					<div class="subtitulo1">Buscador</div>
					<div class="ltitulo1">Promociones</div>
				</div>
				<div class ="info2">
					<div class="ltitulo1">Servicios</div>
					<div class="subtitulo1">Pedidos en l&iacute;nea</div>
					<div class="ltitulo1">Sucursales</div>
					<div class="ltitulo1">Contacto</div>
				</div>
			</div>

<?php if($this->id!='contacto'):?>
		    <div class="correo">
	            <form method="POST" name="Contacto">
	                <div class="rowWraper">
	                	<div class="ltitulo1">Escr&iacute;benos</div>
	                    <div class="row">
	                        <div class="inputField">
	                            <input type="text" name="nombre" autocomplete="off">
	                        </div>
	                    </div>
	                    <div class="row1">
	                        <div class="inputField">
	                            <input type="text" name="telefono" autocomplete="off">
	                        </div>
	                    </div>
	                    <div class="row2">
	                    	<div class="inputField">
	                       		 <input type="text" name="tasunto" autocomplete="off">    
	                       	 </div>                
	               		</div>
	               		 <div class="row3">
	                        <input class="boton" type="submit" value="enviar" >
	             	   </div>
				 </div> 
	            </form>
	        </div>
	       <?php endif;?> 
		</div><!-- footer -->
	</div>

</div><!-- page -->

</body>
</html>

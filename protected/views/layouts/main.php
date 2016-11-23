
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<?php /* @var $this Controller */
	$baseUrl = Yii::app()->baseUrl;
	$cs = Yii::app()->getClientScript();
	$cs->registerCoreScript('jquery');
	$cs->registerScriptFile($baseUrl.'/js/plugins/sidr/jquery.sidr.min.js');
	$cs->registerScriptFile($baseUrl.'/js/sidr-controller.js');
	$cs->registerCssFile($baseUrl.'/css/plugins/sidr/jquery.sidr.light.css');
	$cs->registerCssFile($baseUrl.'/css/main.css');
	$cs->registerCssFile($baseUrl.'/css/main-responsivo.css');
	$cs->registerCssFile($baseUrl.'/css/form.css');
?>
	<!-- blueprint CSS framework -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php // echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection"> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php // echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print"> -->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main-responsivo.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"> -->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div class= "content-wrapper">
			<div class="logoMarenasa"></div>
			<div class="social-wrapper">
				<label class="lheader">¡S&iacute;guenos!</label>
				<div class="facebook"></div>
				<div class="twitter"></div>
				<div class="blogspot"></div>
			</div>
		</div><!-- wrapper -->
	</div><!-- header -->

	<div id="mainmenu">
		<div class= "content-wrapper">

<div class="botonmenu"></div>
    <div class="sidr">
        <div class="menuSidr">
            <div class="menu1"> 

            <?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Inicio', 'url'=>array('/site/index')),
						array('label'=>'Nosotros', 
							'items'=> array(
								array( 'label'=> '¿Quiénes somos?', 'url'=>array('/quienesomos')),
								array( 'label'=> 'Misión y visión', 'url'=>array('/misionvision') )
							),
						),
						array('label'=>'Productos', 
							'items'=> array(
								array( 'label' => 'Por categoría', 'url' => array('/productos')),
								array( 'label' => 'Por marca', 'url' => array('/productos/productoscategoria')),
								array( 'label' => 'Buscador', 'url' => array('/productos/buscador')),
							),
						),
						array( 'label' => 'Promociones', 
							'items' => array(
								array( 'label' => 'Próximas', 'url'=>array('/promociones/index')),
								array( 'label' => 'Historial', 'url'=>array('/promociones/historial')),
							),
						),
						array( 'label' => 'Servicios', 
							'items' => array(
								array( 'label' => 'Pedidos en línea', 'url'=>array('/servicios')),
								array( 'label' => 'Preguntas frecuentes', 'url'=>array('/preguntasfrecuentes')),
							),
						),
						array('label'=>'Sucursales', 'url'=>array('/sucursales')),
						array('label'=>'Contacto', 'url'=>array('/contacto')),
						),
				)); 
			?>          
            </div>

               
        </div>
    </div>



		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index')),
				array('label'=>'Nosotros', 
					'items'=> array(
						array( 'label'=> '¿Quiénes somos?', 'url'=>array('/quienesomos')),
						array( 'label'=> 'Misión y visión', 'url'=>array('/misionvision') )
					),
				),
				array('label'=>'Productos', 
					'items'=> array(
						array( 'label' => 'Por categoría', 'url' => array('/productos')),
						array( 'label' => 'Por marca', 'url' => array('/productos/productoscategoria')),
						array( 'label' => 'Buscador', 'url' => array('/productos/buscador')),
					),
				),
				array( 'label' => 'Promociones', 
					'items' => array(
						array( 'label' => 'Próximas', 'url'=>array('/promociones/index')),
						array( 'label' => 'Historial', 'url'=>array('/promociones/historial')),
					),
				),
				array( 'label' => 'Servicios', 
					'items' => array(
						array( 'label' => 'Pedidos en línea', 'url'=>array('/servicios/index')),
						array( 'label' => 'Preguntas frecuentes', 'url'=>array('/preguntasfrecuentes')),
					),
				),
				array('label'=>'Sucursales', 'url'=>array('/sucursales')),
				array('label'=>'Contacto', 'url'=>array('/contacto')),
				),
			/*	array('label'=>'Nosotros', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Productos', 'url'=>array('/site/contact')),
				array('label'=>'Promociones', 'url'=>array('/site/contact')),
				array('label'=>'Servicios', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
     			array('label'=>'Sucursales', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Contactos', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),	*/		
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
 			<?php if($this->id!='contacto'):?>
                <div class="correo">
                <form method="POST" name="Contacto">
                    <div class="rowWraper">
                        <div class="ltitulo1">Escr&iacute;benos</div>
                        <div class="row">
                            <div class="inputField">
                                <input type="text" name="nombre" placeholder="Nombre" autocomplete="off">
                            </div>
                        </div>
                        <div class="row1">
                            <div class="inputField">
                                <input type="text" name="telefono"  placeholder="Tel&eacute;fono"autocomplete="off">
                            </div>
                        </div>
                        <div class="row2">
                            <div class="inputField">
                                <textarea name="tasunto" placeholder="Mensaje"  autocomplete="off"></textarea>   
                            </div>                
                        </div>
                        <div class="row3">
                            <input class="boton" type="submit" value="enviar" >
                        </div>
                    </div> 
                </form>
            </div>
           <?php endif;?>                 <div class="informacion">
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
            </div><!-- footer -->
	</div>

</div><!-- page -->

</body>
</html>

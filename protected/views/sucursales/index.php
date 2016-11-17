<?php
$baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/sucursales/sucursales.css');
?>
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

<?php
/* @var $this HistoriaController */

$baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/productos/productos.css');
	$cs->registerScriptFile($baseUrl.'/js/plugins/nice-select/jquery.js');
	$cs->registerScriptFile($baseUrl.'/js/productos-marcas.js');
	$cs->registerScriptFile($baseUrl.'/js/plugins/nice-select/jquery.nice-select.js');
	$cs->registerCssFile($baseUrl.'/css/plugins/nice-select/nice-select.css');
?>
<div class="contenedor1-p">
	<div class="Titulo1-p">Productos</div>
</div>
<div class="contenedor2-p">
	<div class="contenedor2-1p">
		<div class="titulo-ddl">Categorias:</div>
		<div class="ddl-producto">
			<select class = "ddl-style"> 
				  <option value='0' data-display="Select">Todas</option>
					  <?php foreach($categoria as $data):?>
					 	 <option value="<?php echo $data->id;?>"><?php echo $data->categoria;?></option>
					<?php endforeach;?>
					<?php reset($categoria); ?>

		    </select>
			</select>	
		</div>
	</div>
	<div class="contenedor2-2p">
		 <div class="canasta-p"></div>

	</div>	 
</div>
<div class="contenedor3-p">
	<div class = "content-wrapper">
		<div class= "container-cc">	
	   		<?php foreach($categoria as $data):?>
				<div class="buscador-producto">
					<div class="titulo-pm">      
						<?php echo $data['categoria']?>
					</div>
					<div class="imagen-marca" style="background-image: url('<?php echo $baseUrl.'/uploads/marenasaproductocategorias/imagen/'.$data['imagen'];?>');">
					</div>	
				</div>
			<?php endforeach;?>
		</div>
	</div>
</div>
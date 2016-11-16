<?php
/* @var $this ServiciosController */
	$baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/servicios/pediddosenlinea.css');
?>
<div class="content-wrapper">
	<div class="white-bg">
		<div class="blue-ribbon"></div>
		<div class="cart-container">
			<div class="title-container">
				<div class="icon-chest"></div>
				<div class="title">Pedido en línea</div> 
			</div>
			<div class="search-container">
				<div>
					<input type="text" name="text" id="searchtext" />
					<div class="search-button"></div>
				</div>
				<div class="search-content">
					<div class="search">
						<?php foreach($productos as $data): ?>
						<div class="product-row">
							<div class="nombre-producto" data-id="<?php echo $data->id; ?>" data-price="<?php echo $data->precio; ?>"> <?php echo $data->articulo; ?> </div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="order-content">
				<div class="titles-content">
					<div class="order-title first">Nombre</div>
					<div class="order-title">Cantidad</div>
					<div class="order-title">Precio</div>
					<div class="order-title">Subtotal</div>
				</div>
				<div class="order">
					<div class="product-row">
						<div class="product-name"> Producto 1</div>
						<div class="cantidad"> <input type="text" name="cantidad" id="cantidad" /> <span class="bold">X</span></div>
						<div class="precio" data-precio="89.00">89.00</div>
						<div class="subtotal" data-subtotal="899.00">899.00</div>
					</div>
				</div>
				<div class="total-container">
					<div class="total-title">Total</div>
					<div class="total-price" data-total="3339.88">3339.88</div>
				</div>
			</div>
		</div>
		<div class="user-container">
			<div class="user-title">Datos del cliente:</div>
			<div class="user-form">
				<div class="user-row">
					<label for="nombre" >Nombre: </label>
					<input id="nombre" name="nombre" placeholder="Nombre"/>
				</div>
				<div class="user-row">
					<label for="correo" >E-mail: </label>
					<input id="correo" name="correo" placeholder="usuario@ejemplo.com"/>
				</div>
				<div class="user-row">
					<label for="tel" >Nombre: </label>
					<input id="tel" name="tel" placeholder="311-1234567"/>
				</div>
			</div>
			<div class="send-button">Hacer pedido</div>
		</div>
	</div>	
</div>
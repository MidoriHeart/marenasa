$(document).ready(function() {
		var productos = $('.search-content .search').children().clone();
	$('.search-button').on('click', function(){
		var text = $('#searchtext').val();
		if(text.length > 2) {
			var txt = text.toLowerCase();
			var filteredByText = productos.clone();
			filteredByText = filteredByText.filter(function() 
            {
                if($(this).html()!='')
                {
                    return removeDiacritics($(this).children().filter( 'div.nombre-producto').html().toLowerCase()).indexOf(txt) > -1;
                }
                else
                    return '';
			});
			if (filteredByText.length>=1) {
				$('.search-results').empty();
				$('.search-results').append(filteredByText);
				$('.search-results').removeClass('none');
				clickOnResults();
			}
		}
		else {
			console.log(txt.length);
		}
	});

	$('#searchtext').keydown( function(e) {
		if(e.keyCode == 13) {
			var txt = $('#searchtext').val();
			if(txt.length > 2) {
				var filteredByText = productos.clone();
				filteredByText = filteredByText.filter(function() 
	            {
	                if($(this).html()!='')
	                {
	                    return removeDiacritics($(this).children().filter( 'div.nombre-producto').html().toLowerCase()).indexOf(txt) > -1;
	                }
	                else
	                    return '';
				});
				if (filteredByText.length>=1) {
					$('.search-results').empty();
					$('.search-results').append(filteredByText);
					$('.search-results').removeClass('none');
					clickOnResults();
				}
			}
			else {
				console.log(txt.length);
			}
		}
	});

	function clickOnResults() {
		$('.search-results .product-row').off('click').on('click', function(){
			var id     = $(this).children('.nombre-producto').data('id');
			var existe = false;
			$('.order .product-row .product-name').each(function() {
				if($(this).data('id') == id) {
					existe = true;
				}
			});
			if(existe == false){
				var precio = $(this).children('.nombre-producto').data('price');
				var nombre = $(this).children('.nombre-producto').html();
				// alert('Nombre: '+nombre+', precio: '+precio+', id:'+id);
				var html = '<div class="product-row">'+
									'<div class="product-name"  data-id="'+id+'">'+nombre+'</div>'+
									'<div class="cantidad"> <input type="number" name="cantidad" class="cantidad" value="1"> <span class="bold">X</span></div>'+
									'<div class="precio" data-precio="'+precio+'">$ '+precio+'</div>'+
									'<div class="subtotal" data-subtotal="'+precio+'">'+precio+'</div>'+
								'</div>';
				$('.order').append(html);
				$('.search-results').empty();
				$('#searchtext').val('');
				$('.search-results').addClass('none');
				setMath();
			}
			else {
				$('.search-results').empty();
				$('#searchtext').val('');
				$('.search-results').addClass('none');
			}
		});
	}
	function setMath () {
		$('input.cantidad').each(function() {
			var cant = $(this).val();
			var precio = $(this).parent().siblings('.precio').data('precio');
			var subtot = precio*cant;
			var subtotal = addZeros(subtot);
			$(this).parent().siblings('.subtotal').empty();
			$(this).parent().siblings('.subtotal').html(subtotal);
			$(this).parent().siblings('.subtotal').data('subtotal', subtot);
			console.log('cantidad: '+cant+', precio: '+precio+',subtotal: '+subtot); 
		});
		sumTotal();
		setChangeCant();
	}
	function setChangeCant() {
		$('input.cantidad').off('change').on('change',function() {
			var cant = $(this).val();
			var precio = $(this).parent().siblings('.precio').data('precio');
			var subtot = precio*cant;
			var subtotal = addZeros(subtot);
			$(this).parent().siblings('.subtotal').empty();
			$(this).parent().siblings('.subtotal').html(subtotal);
			$(this).parent().siblings('.subtotal').data('subtotal', subtot);
			sumTotal();
		});	
	} 
	function sumTotal() {
		var total = 0;
		$('.subtotal').each(function(){
			total = total + $(this).data('subtotal')
		});	
		$('.total-price').data('total', total);
		$('.total-price').empty();
		var total_zeros = addZeros(total);
		$('.total-price').html(total_zeros);
	}
	function addZeros(cant) {
		var cantidad = cant.toString();
		var dot = cantidad.lastIndexOf('.');
		var ret = '$ ';
		if(dot > -1) {
			ret = ret+cantidad+'0';
		}
		else {
			ret = ret+cantidad+'.00'
		}
		return ret;
	}
	$('.send-button').on('click', function(){
		var send_info = $('.order').children().clone();
		var url = $('#url').val();
		var new_url = url+'/index.php/servicios/sendCorreo';
		console.log(new_url);
		if($('#nombre').val() != "" && $('#correo').val() != "" && $('#tel').val() != "" ) {
			if($('.total-price').data('total') > 0){
				var info ="";
				send_info.each(function () {
					info = info+''+$(this).children('.product-name').data('id')+'-'+
							  $(this).children('.product-name').html()+'-'+
							  $(this).children('.cantidad').children('input.cantidad').val()+'-'+
							  $(this).children('.precio').data('precio')+'-'+
							  $(this).children('.subtotal').data('subtotal')+"__";
				});
				info = info+'::TOTAl_'+$('.total-price').data('total');
				$.ajax({
					type : 'get',
					url  : new_url,
					dataType : 'json',
					data : {
						info   : info,
						nombre : $('#nombre').val(),
						correo : $('#correo').val(),
						tel    : $('#tel').val(),
					},
					success: function(data) {
						if(data.result == 0) {
							alert('Ocurrió un problema, porfavor, póngase en contacto con el técnico.');
						}
						else {
							 alert('Su pedido se ha enviado correctamente, a la brevedad nos pondremos en contacto con usted. \n Gracias por su preferencia.');
							 $('.order').empty();
							 $('#nombre').val('');
							 $('#tel').val('');
							 $('#correo').val('');
							 $('.total-price').data('total','0');
							 $('.total-price').html('$ 0.00');
						}
					},
					error : function(a, b, c) {
						console.log(a, b, c);
						alert('Ocurrió un problema, porfavor, póngase en contacto con el técnico.');
					}
				});
			}
			else {
				alert('Por favor, elija al menos un producto para poder ponernos en contacto con usted.')
			}
		}
		else {
			alert('porfavor, llene todos los datos de contacto correctamente, de lo contrario, no nos será posible contactarnos con usted.');
		}



	});
	setChangeCant();
	setMath();
});
$(document).ready(function() {

  var categorias = $('.container-cc').children().clone();  
  console.log(categorias);
  $('.ddl-style').niceSelect();
  $('.ddl-style').on('change', function(){
    var id = $(this).val();
  	if(id!=0)
  	{
  		var loc = window.location.href;// variable para encontrar el url de la pagina actual
        var index = loc.lastIndexOf('productoscategoria');

        var url = loc.substring(0, index);
        url = url+'getProductosMarca'
        /*if(index == -1)
            url = '/index.php/Prodcutos/getProductos';
        else
            url = '/Productos/getProductos';*/
        $.ajax(
        {
            type: 'GET',
            url: url,
            dataType: 'JSON', 
            data:
            {
				id:id,
            },
            success: function(data)
            {
                console.log(data);
                if(data.result==0) {
                    $('.container-cc').empty();
                    $('.container-cc').append('<div class="no-results">Por el momento esta categoria no tiene productos. </br> Disculpe las molestias.</div>');
                }
                else{
                    var arreglo = data.productos;
                    console.log(arreglo);
                     $('.container-cc').empty();
                     for(var i = 0; i< arreglo.length; i++){ 
                         $('.container-cc').append('<div class="buscador-producto">'+
                                                        '<div class="titulo-pm">'+arreglo[i].articulo+'</div>'+
                                                        '<div class="imagen-marca" style="background-image: url(/marenasa/uploads/marenasaproductos/imagen/'+arreglo[i].imagen+');"></div> '+
                                                    '</div>');
                  } 
                }

   
            },
            error: function(a, b, c)
            {
                console.log(a,b,c);
            }
        });
  	}
    else {
        var new_cateogrias = categorias.clone();
        $('.container-cc').empty();
        $('.container-cc').append( new_cateogrias );
    }
  });
});

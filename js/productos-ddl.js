$(document).ready(function() {
  $('.ddl-style').niceSelect();

  $('.ddl-style').on('change', function(){
  	if($(this).val()!=0)
  	{
  		var loc = window.location.href;// variable para encontrar el url de la pagina actual
        var index = loc.indexOf('index.php');
        var url = '';
        if(index == -1)
            url = 'index.php/Prodcutos/getProductos';
        else
            url = '/Productos/getProductos';
        $.ajax(
        {
            type: 'GET',
            url: url,
            dataType: 'JSON', 
            data:
            {
				id:id
            },
            success: function(data)
            {
                console.log(data);
                var html ='';
                if(data)
                {
                    html = '<div class="mensaje">\n\
                                    <div class="tacha">X</div>\n\
                                    <div class="texto" style="padding-top: 59px;">¡Correo agregado con éxito!</div>\n\
                                </div>';
                }
                else
                {
                    html = '<div class="mensaje">\n\
                                    <div class="tacha">X</div>\n\
                                    <div class="texto">Este correo ya esta registrado,<br>favor de intentarlo con otro correo.</div>\n\
                                </div>';
                }
                    $.colorbox(
                    {
                        html: html,
//                        opacity: 0
                        onComplete: function()
                        {
                            $.colorbox.resize();
                            $('.tacha').click(function()
                            {
                               $.colorbox.close(); 
                            });
                        }
                    });
            },
            error: function(a, b, c)
            {
            }
        });
  	}
  });
});
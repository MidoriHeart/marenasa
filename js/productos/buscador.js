$(document).ready(function() 
{
    $('.buscar').niceSelect();
    var mar = 0;
    var total = 1;
    var cat = 0;
    var id = 0;
    var nombre = '';
    $('#buscarCategoria').on('change', function()
    {
        cat = parseInt($(this).val());
        if(cat !== cat)
            cat = 0;
        console.log(cat);
        $('.producto').addClass('hide');
        if(cat > 0)
        {
            if(mar > 0)
            {
                $('.producto').each(function()
                {
                    var id = parseInt($(this).attr('data-cat'));
                    var id2 = parseInt($(this).attr('data-mar'));
                    if(id == cat && id2 == mar)
                        $(this).removeClass('hide');
                });
            }
            else
            {
                $('.producto').each(function()
                {
                    var id = parseInt($(this).attr('data-cat'));
                    if(id == cat)
                        $(this).removeClass('hide');
                });
            }
        }
        else
        {
            if(mar > 0)
            {
                $('.producto').each(function()
                {
                    var id = parseInt($(this).attr('data-mar'));
                    if(id == mar)
                        $(this).removeClass('hide');
                });
            }
            else
                $('.producto').removeClass('hide');
        }
    });
    $('#buscarMarca').on('change', function()
    {
        mar = parseInt($(this).val());
        if(mar !== mar)
            mar = 0;
        $('.producto').addClass('hide');
        if(mar > 0)
        {
            if(cat > 0)
            {
                $('.producto').each(function()
                {
                    var id = parseInt($(this).attr('data-cat'));
                    var id2 = parseInt($(this).attr('data-mar'));
                    if(id == cat && id2 == mar)
                        $(this).removeClass('hide');
                });
            }
            else
            {
                $('.producto').each(function()
                {
                    var id = parseInt($(this).attr('data-mar'));
                    if(id == mar)
                        $(this).removeClass('hide');
                });
            }
        }
        else
        {
            if(cat > 0)
            {
                $('.producto').each(function()
                {
                    var id = parseInt($(this).attr('data-cat'));
                    if(id == cat)
                        $(this).removeClass('hide');
                });
            }
            else
                $('.producto').removeClass('hide');
        }
    });
    $('[data-info]').click(function()
    {
        id = $(this).attr('data-info');
        nombre = $(this).parent().siblings('.topProducto').children('.titulo').text();
        $('.productosWraper').addClass('hide');
        $('[data-infoI="'+id+'"]').removeClass('hide');
    });
    $('[data-agregar]').click(function()
    {
        var html = '';
        html = '\
        <div class="pedido">\n\
            <input type="text" name="pedido['+total+'][nombre]" class="nombreProducto" value="'+nombre+'">\n\
            <input type="number" name="pedido['+total+'][cantidad]" min="1" max="1000" value="1">\n\
            <div class="borrar">x</div>\n\
        </div>';
        $('.pedidosWraper').append(html);
        borrar();
        total++;
    });
    $('.botonCerrar').click(function()
    {
        $('[data-infoI]').addClass('hide');
        $('.productosWraper').removeClass('hide');
    });
    $('.canasta').click(function()
    {
        $('.pedidosLista').toggleClass('ocultarLista');
    });
    function borrar()
    {
        $('.borrar').click(function()
        {
            $(this).parent().remove();
        });
    }
});
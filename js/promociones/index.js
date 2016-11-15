$(document).ready(function()
{
    var move = 0;
    var total = 0;
    var limite = 3;
    var pos = 0;
    $('.contenidoMovil').children().each(function()
    {
       total ++; 
    });
    $('.flechaI').click(function()
    {
        if(pos > 0)
        {
            move = ($('.contenidoMovil .promocion').width() + 26) * -1;
            pos--;
            var mover = move * pos;
            $('.contenidoMovil').css('left',mover+'px');
        }
    });
    $('.flechaD').click(function()
    {
        limite = ($('.contenido').width() / $('.contenidoMovil .promocion').width());
        if(limite + pos < total )
        {
            move = ($('.contenidoMovil .promocion').width() + 26) * -1;
            pos++;
            var mover = move * pos;
            $('.contenidoMovil').css('left',mover+'px');
        }
    });
});
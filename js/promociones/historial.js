$(document).ready(function()
{
    $('.buscarFecha').niceSelect();
    $('.buscarFecha').on('change', function()
    {
        var fecha = $(this).val();
        if(fecha == 'Seleccionar')
            $('.promocion').removeClass('hide');
        else
        {
            fecha = new Date(fecha);
            fecha = fecha.valueOf()/ 100000;
            $('.promocion').each(function()
            {
                
                var fi = new Date($(this).attr('data-fechaI'));
                fi = fi.valueOf()/ 100000;
                var ff = new Date($(this).attr('data-fechaF'));
                ff = ff.valueOf() / 100000;
                console.log('fecha input: '+fecha);
                console.log('fecha inicial: '+fi);
                console.log('fecha final: '+ff);
                if(fecha >= fi && fecha <= ff)
                    $(this).removeClass('hide');
                else
                    $(this).addClass('hide');
            });
        }
    });
});
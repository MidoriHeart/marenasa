$(document).ready(function() 
{
    $('.buscar').niceSelect();
    var mar = 0;
    var cat = 0;
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
});
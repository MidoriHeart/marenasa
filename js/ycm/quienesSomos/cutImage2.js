$(document).ready(function() 
{
    var validateClose = false;
    var jcrop_api, boundx, boundy;
    var selected=$('#selected_image2').clone();
    //configura fancybox
    $("#clrbx2").colorbox(
    {
        inline:true,
        href:"#jcrop2",
        overlayClose: false,
        onCleanup: function()
        {
            if(!validateClose)
                $('#cboxClose').trigger('click');
        },
        onComplete:function()
        {
            //tamaño inicial seleccionado de la imagen
            jcrop_api.setSelect([0,0,205,195]);
            //variable que almacena el tamaño que tendra fancybox
            var w_width = $(window).width()-($(window).width()*0.15)-255;
            if($('#selected_image2').width()<w_width )
                w_width = $('#selected_image2').width();
            $("#cboxLoadedContent").css({'width': (w_width+255)+"px"});
            $("#cboxWrapper").css({'width': (w_width+265)+"px"});
            $('#cboxClose').on('click',function()
            {
                $.colorbox.close();
                $('#img_inferior').val('');
//                $('#Noticias_img').val('');
                validateClose =false;
            });
            $.colorbox.resize();
        },
        onClosed:function(){
            var x = $('#x2');
            var y = $('#y2');
            var w = $('#w2');
            var h = $('#h2');

            var imagen = $("#selected_image2").clone().removeAttr('id').css({'visibility':"visible","display":"block"});
            var nw = (205*imagen.width())/ parseFloat(w.val());
            var nh = (195*imagen.height())/ parseFloat(h.val());  
            var nx = (parseFloat(x.val())*nw)/imagen.width();
            nx*=-1;
            var ny = (parseFloat(y.val())*nh)/imagen.height();
            ny*=-1;
            imagen.css({'margin-left': nx+ 'px', 'margin-top': ny+ 'px','width':nw+'px', 'height':nh+'px'});
            $("#img-result").html(imagen);
            jcrop_api.destroy();
        }
    }
    );
   
    $('.jcropImage2').on('click',function(){$(this).val('');});
    $('.jcropImage2').on('change',function(){
        //var selected_hide=$('#selected_image2').clone();
        //aqui codigo de cancel imagen
//        var imagen = $("#selected_image2").clone();
        readURL(this);
    });
    $('#btn_enviar').on('click',function(e){e.preventDefault();
        alert('enviando...');
    });
    $('#aceptar').on('click',function(e){
        e.preventDefault();
        if($('#datosImagen_w').val()=='0' && $('#datosImagen_h').val()=='0'){
            alert('Debes seleccionar un valor');

        }
        else       
            $.colorbox.close();
    });
    
    function updatePreview(c)
    {
        if (parseInt(c.w) > 0)
        {
            var rx = 205 / c.w;
            var ry = 195 / c.h;

            $('#preview2').css({
                width: Math.round(rx * boundx) + 'px',
                height: Math.round(ry * boundy) + 'px',
                marginLeft: '-' + Math.round(rx * c.x) + 'px',
                marginTop: '-' + Math.round(ry * c.y) + 'px'
            });
        }
        //guardarCoordenadas
        $('#x2').val(c.x);
        $('#y2').val(c.y);
        $('#w2').val(c.w);
        $('#h2').val(c.h);
    };

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var f=input.files[0];
            $('#selected_image2').remove();
            $('#image_container2').append(selected.clone());
            reader.onload =function(e) {
                // Render thumbnail.
                if(f.size>(25*1024*1024)){
                    alert("El tamaño de la imagen es demasiado grande máximo permitido 250Kb");
                    $('#Organismo_imagen').val('');
                    return false;
                }
                $('#selected_image2')
                    .attr('src', e.target.result);
                $('#preview2')
                    .attr('src', e.target.result);
                $('#selected_image2').Jcrop({
                    boxWidth: $(window).width()-($(window).width()*0.15)-255, 
                    boxHeight: $(window).height()-($(window).height()*0.20),
                    onChange: updatePreview,
                    onSelect: updatePreview,
                    aspectRatio: 41/39
                },function(){
                    // Use the API to get the real image size
                    var bounds = this.getBounds();
                    boundx = bounds[0];
                    boundy = bounds[1];
                    // Store the API in the jcrop_api variable
                    jcrop_api = this;
                });
                $('#clrbx2').click();
            };
            reader.readAsDataURL(f);
        }
    }
 $('#getCrop2').on("click", function()
    {
        var divwidth = 205;
        var divheight = 195;
        $("#divwidth2").attr("value", divwidth);
        $("#divheight2").attr("value", divheight);
        validateClose = true;
        $(".clrbx2").colorbox($.colorbox.close());
        
    });
});
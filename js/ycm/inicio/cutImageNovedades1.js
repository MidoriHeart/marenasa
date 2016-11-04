/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(function($) {
    var validateClose = false;
    var jcrop_api, boundx, boundy;
    var selected=$('#selected_image1').clone();
    //configura fancybox
    $("#clrbx1").colorbox(
    {
        inline:true,
        href:"#jcrop1",
        overlayClose: false,
        onCleanup: function(){
            if(!validateClose){
                $('#cboxClose1').trigger('click');
            }
        },
        onComplete:function(){
            //tamaño inicial seleccionado de la imagen
            jcrop_api.setSelect([0,0,367,150]);
            //variable que almacena el tamaño que tendra fancybox
            var w_width = $(window).width()-($(window).width()*0.15)-255;
            
            if($('#selected_image1').width()<w_width ){
                w_width=$('#selected_image1').width();
            }
            $("#cboxLoadedContent").css({'width': (w_width+255)+"px"});
            $("#cboxWrapper").css({'width': (w_width+265)+"px"});
            
            $('#cboxClose1').on('click',function(){
                $.colorbox.close();
                $('#image_container').val('');
                $('#Noticias_img').val('');
                validateClose =false;
            });$.colorbox.resize();
        },
        onClosed:function(){
            var x = $('#x');
            var y = $('#y');
            var w = $('#w');
            var h = $('#h');

            var imagen = $("#selected_image1").clone().removeAttr('id').css({'visibility':"visible","display":"block"});
            var nw = (96*imagen.width())/ parseFloat(w.val());
            var nh = (96*imagen.height())/ parseFloat(h.val());  
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
   
    $('.jcropImage1').on('click',function(){$(this).val('');});
    $('.jcropImage1').on('change',function(){
        //var selected_hide=$('#selected_image').clone();
        //aqui codigo de cancel imagen
        
        var imagen = $("#selected_image3").clone();
        
        
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
            var rx = 367 / c.w;
            var ry = 150 / c.h;

            $('#preview1').css({
                width: Math.round(rx * boundx) + 'px',
                height: Math.round(ry * boundy) + 'px',
                marginLeft: '-' + Math.round(rx * c.x) + 'px',
                marginTop: '-' + Math.round(ry * c.y) + 'px'
            });
        }
        //guardarCoordenadas
        $('#x1').val(c.x);
        $('#y1').val(c.y);
        $('#w1').val(c.w);
        $('#h1').val(c.h);
    };

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var f=input.files[0];
            $('#selected_image1').remove();
            $('#image_container1').append(selected.clone());
            reader.onload =function(e) {
                // Render thumbnail.
                if(f.size>(25*1024*1024)){
                    alert("El tamaño de la imagen es demasiado grande máximo permitido 250Kb");
                    $('#Organismo_imagen').val('');
                    return false;
                }
                $('#selected_image1')
                    .attr('src', e.target.result);
                $('#preview1')
                    .attr('src', e.target.result);
                $('#selected_image1').Jcrop({
                    boxWidth: $(window).width()-($(window).width()*0.15)-255, 
                    boxHeight: $(window).height()-($(window).height()*0.20),
                    onChange: updatePreview,
                    onSelect: updatePreview,
                    aspectRatio: 367/150
                },function(){
                    // Use the API to get the real image size
                    var bounds = this.getBounds();
                    boundx = bounds[0];
                    boundy = bounds[1];
                    // Store the API in the jcrop_api variable
                    jcrop_api = this;
                });
                $('#clrbx1').click();
                $.colorbox.resize();
            };
            reader.readAsDataURL(f);
        }
    }
 $('#getCrop1').on("click", function()
    {
        var divwidth = 367;
        var divheight = 150;
        $("#divwidth1").attr("value", divwidth);
        $("#divheight1").attr("value", divheight);
        validateClose = true;
        $(".clrbx1").colorbox($.colorbox.close());
        
    });
});
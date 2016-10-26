 $('.flechaCat').on("click",function(){
    
    if($(this).hasClass('newflecha')){
            $('.contenerdor-tercero').css('height','335px');
            $(".flechaCat").removeClass('newflecha');
        }
    else{
            $('.contenerdor-tercero').css('height','auto');
            $('.flechaCat').addClass('newflecha');
        }
    });
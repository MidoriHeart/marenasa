$(document).ready(function() {
    var ch  = $('#main-carousel ul').children().length;
    var wul = ch*100;
    var wli = 100/ch;
    $('#main-carousel ul').css('width', wul+'%');
    $('#main-carousel ul li').css('width', wli+'%');
    $('#main-carousel').jcarousel({
        wrap: 'circular',
        easing:   'linear'
        }).jcarouselAutoscroll({
            interval: 3000,
            target: '+=1',
            // autostart: true
        });
    $('.flechaIzq').jcarouselControl({target: '-=1'});
    $('.flechaDer').jcarouselControl({target: '+=1'});

    var ch  = $('#second-carousel ul').children().length;
    var wul = ch*55;
    var wli = 55/ch;
    $('#second-carousel ul').css('width', wul+'%');
    $('#second-carousel ul li').css('width', wli+'%');
    $('#second-carousel').jcarousel({
        wrap: 'circular'
    });
    $('.flechaISl2').jcarouselControl({target: '-=3'});
    $('.flechaDSl2').jcarouselControl({target: '+=3'});

 
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


});
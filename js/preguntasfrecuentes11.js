$(document).ready(function(){

    var change = 0;
    var percentage = 50;
    console.log($(window).width());
    if($(window).width() <= 768 && $(window).width() >480 ) {
        percentage = 70;
        change = 1;
    }
    if($(window).width() < 480 ) {
        percentage = 100;
        change = 2;
    }
    var ch  = $('#carousell ul').children().length;
    var wul = ch*percentage;
    var wli =percentage/ch;
    $('#carousell ul').css('width', wul+'%');
    $('#carousell ul li').css('width', wli+'%');
    $('#carousell').jcarousel({
        wrap: 'circular'
    });
    $('.flechaIzquierda').jcarouselControl({target: '-=1'});
    $('.flechaDerecha').jcarouselControl({target: '+=1'});
    console.log($(window).width());
     $(window).resize( function() {
        var size = $(window).width();
        console.log($(window).width());
        if( size > 768 && change != 0 ) {
            var ch  = $('#carousell ul').children().length;
            var wul = ch*50;
            var wli =50/ch;
            $('#carousell ul').css('width', wul+'%');
            $('#carousell ul li ').css('width', wli+'%');
             $('#carousell ul li .categoria-wraper').css('width', wli+'%');
            change = 0; 
        }
        else  {  
            if( size > 480 && size <= 768 && change != 1 ) {
                var ch  = $('#carousell ul').children().length;
                var wul = ch*30;
                var wli = 30/ch;
                $('#carousell ul').css('width', wul+'%');
                $('#carousell ul li').css('width', wli+'%');
                $('#carousell ul li .categoria-wraper').css('width', wli+'%');
                change = 1;            
            }
            else {
                if( size <=  480 && change != 2 ) {
                    var ch  = $('#carousell ul').children().length;
                    var wul = ch*100;
                    var wli =100/ch;
                    $('#carousell ul').css('width', wul+'%');
                    $('#carousell ul li').css('width', wli+'%');
                     $('#carousell ul li .categoria-wraper').css('width', wli+'%');
                    change = 2; 
                }
            }
        }
     });

});

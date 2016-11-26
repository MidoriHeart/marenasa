$(document).ready(function(){

    var change = 0;
    var percentage = 58;
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
            var wul = ch*58;
            var wli =58/ch;
            $('#carousell ul').css('width', wul+'%');
            $('#carousell ul li').css('width', wli+'%');
            change = 0; 
        }
        else  {  
            if( size > 480 && size <= 768 && change != 1 ) {
                var ch  = $('#carousell ul').children().length;
                var wul = ch*70;
                var wli =70/ch;
                $('#carousell ul').css('width', wul+'%');
                $('#carousell ul li').css('width', wli+'%');
                change = 1;            
            }
            else {
                if( size <=  480 && change != 2 ) {
                    var ch  = $('#carousell ul').children().length;
                    var wul = ch*100;
                    var wli =100/ch;
                    $('#carousell ul').css('width', wul+'%');
                    $('#carousell ul li').css('width', wli+'%');
                    change = 2; 
                }
            }
        }
     });

});

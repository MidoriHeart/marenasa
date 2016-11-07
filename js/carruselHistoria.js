$(document).ready(function() {
    var ch  = $('#carousell ul').children().length;
    var wul = ch*58;
    var wli =58/ch;
    $('#carousell ul').css('width', wul+'%');
    $('#carousell ul li').css('width', wli+'%');
    $('#carousell').jcarousel({
        wrap: 'circular'
    });
    $('.flechaIzquierda').jcarouselControl({target: '-=3'});
    $('.flechaDerecha').jcarouselControl({target: '+=3'});

 });
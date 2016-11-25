$(document).ready(function(){
	$('.faq-responsive').sidr({
        name:'faq-sidr',
        source: '.faq-menu1',
        displace:false,
        rename: false,
        onOpen: function(){
            $("#page.container:not(#faq-sidr)").on("click",function() {
                $.sidr('close', 'faq-sidr');
            });
        }
    });
	 $('.sidr-class-pregunta').on("click", function(){
		var id = $(this).data('id');
		console.log(id);
		$('.sidr-class-pregunta').removeClass("sidr-class-selected");
		$(this).addClass("sidr-class-selected");
		$('.sidr-class-container-Preguntas').removeClass("sidr-class-activo");
		$(".sidr-class-container-Preguntas[data-id="+id+"]").addClass("sidr-class-activo");

		 });

	$('.categoria-wraper').on("click",function(){
		$('.categoria-wraper').removeClass('activo');
		$(this).addClass('activo');

	});
 
 $('.pregunta').on("click", function(){
	var id = $(this).data('id');
	console.log(id);
	$('.pregunta').removeClass("selected");
	$(this).addClass("selected");
	$('.container-Preguntas').removeClass("activo");
	$(".container-Preguntas[data-id="+id+"]").addClass("activo");

 });

$('.sidr-class-categoria-wraper').on("click",function(){
		$('.sidr-class-categoria-wraper').removeClass('sidr-class-activo');
		$(this).addClass('sidr-class-activo');

	});





});
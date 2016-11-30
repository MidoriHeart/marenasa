$(document).ready(function(){
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
			$(".container-Preguntas[data-categoria="+id+"]").addClass("activo");
			$('.abajo .preguntas-wraper').removeClass('activo');
 			$(this).addClass('activo');

		 });


 		$('.arriba .categoria-wraper').click(function(){
 			var categoria = $(this).data('categoria');
 			$('.abajo .pregunta').parent().removeClass('active');
 			$('.abajo .pregunta').each(function(){
 				var cat_preg = $(this).attr('data-catid');
 				if(cat_preg == categoria)
 				{
 					$(this).parent().addClass('active');
 				}
 			});

 		});
});
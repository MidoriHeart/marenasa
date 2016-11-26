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

		 });

});
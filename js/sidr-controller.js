$(document).ready(function(){
	$('.botonmenu').sidr({
		name:'menu-sidr',
        source: '.menu1',
        displace:true,
        onOpen: function(){
            $("#page.container:not(#menu-sidr)").on("click",function() {
                $.sidr('close', 'menu-sidr');
            });
            
        }
	});
    $('.faq-responsive').sidr({
        name:'faq-sidr',
        source: '.faq-menu1',
        displace:false,
        onOpen: function(){
            $("#page.container:not(#faq-sidr)").on("click",function() {
                $.sidr('close', 'faq-sidr');
            });
        }
    });
});
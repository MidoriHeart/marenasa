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
});
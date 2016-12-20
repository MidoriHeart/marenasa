 $(document).ready(function(){

 $("#correoMarenasa").submit(function(event) {

      /* stop form from submitting normally */
      event.preventDefault();

      /* get the action attribute from the <form action=""> element */
      var $form = $( this ),
          url = $form.attr( 'action' );

      /* Send the data using post with element id name and name2*/
      var posting = $.post( url, { nombre: $('.nombre').val(), correo: $('.email').val(), asunto: $('.asunto').val() } );

      /* Alerts the results */
      posting.done(function( data ) {
        alert('Tu correo se ha enviado exitosamente, a la brevedad nos pondremos en contacto con usted.');
        $('.nombre').val("");
        $('.email').val("");
        $('.asunto').val("");
        console_log(data);
      });
    });

  $("#correocontactoMarenasa").submit(function(event) {

      /* stop form from submitting normally */
      event.preventDefault();

      /* get the action attribute from the <form action=""> element */
      var $form = $( this ),
          url = $form.attr( 'action' );

      /* Send the data using post with element id name and name2*/
      var posting = $.post( url, { nombre: $('.nombre').val(),correo: $('.email').val(), asunto: $('.asunto').val(), noDcliente: $('.noDcliente').val(), telefono: $('.telefono').val()  } );

      /* Alerts the results */
      posting.done(function( data ) {
                console.log(data);
        if(data.result == 1){
          alert('Tu correo se ha enviado exitosamente, a la brevedad nos pondremos en contacto con usted.');
          $('.nombre').val("");
          $('.email').val("");
          $('.asunto').val("");
          $('.noDcliente').val("");
          $('.telefono').val("");
        }
        else {
         alert('Ocurrió un error, por favor, pongase en contacto con el administrador del sistema.'); 
        }
      });
    });
  });
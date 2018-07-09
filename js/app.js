/************************************************FORMULARIO******************************************/
function configurar(){ 


  var valor_parqueo=document.getElementById('valor_parqueo').value;
  var cantidadE_parqueo=document.getElementById('cantidadE_parqueo').value;
  var cantidadC_parqueo=document.getElementById('cantidadC_parqueo').value;
  
 
      //Inicia validacion
      //
     if (isNaN(valor_parqueo) || valor_parqueo==="")
      {
      $("#mensaje_configuracion").addClass('alert alert-danger alert-dismissable text-center mensaje_alerta_configuracion');
      $('#mensaje_configuracion').text('Ingrese un valor correcto');
      document.getElementById('valor_parqueo').focus();
      return false;
      }

      if (isNaN(cantidadE_parqueo) || cantidadE_parqueo==="")
      {
      $("#mensaje_configuracion").addClass('alert alert-danger alert-dismissable text-center mensaje_alerta_configuracion');
      $('#mensaje_configuracion').text('Ingrese una cantidad de espacios');
      document.getElementById('cantidadE_parqueo').focus();
      return false;
      }

      if (isNaN(cantidadC_parqueo) || cantidadC_parqueo==="")
      {
      $("#mensaje_configuracion").addClass('alert alert-danger alert-dismissable text-center mensaje_alerta_configuracion');
      $('#mensaje_configuracion').text('Ingrese una cantidad de filas');
      document.getElementById('cantidadC_parqueo').focus();
      return false;
      }

      if (cantidadC_parqueo > 26)
      {
      $("#mensaje_configuracion").addClass('alert alert-danger alert-dismissable text-center mensaje_alerta_configuracion');
      $('#mensaje_configuracion').text('Solo se permite un maximo de 26 columnas');
      document.getElementById('cantidadC_parqueo').focus();
      return false;
      }

    /*  if (cantidadC_parqueo > cantidadE_parqueo)
      {
      $("#mensaje_configuracion").addClass('alert alert-danger alert-dismissable text-center mensaje_alerta_configuracion');
      $('#mensaje_configuracion').text('Las Columnas no pueden ser mayores a los espacios');
      document.getElementById('cantidadC_parqueo').focus();
      return false;
      }*/

    

  var parametros = new FormData($("#configurar_data")[0]);
      $.ajax({
          data: parametros,
          url:"../ajax/configurar_data.php",
          type:"POST",
          contentType:false,
          processData:false,
          beforeSend: function() {
                $("#mensaje_configuracion").removeClass('alert alert-danger alert-dismissable text-center mensaje_alerta_configuracion');
       			    $("#mensaje_configuracion").addClass('alert alert-warning alert-dismissable text-center mensaje_alerta_configuracion');
                $('#mensaje_configuracion').text('Registrando Configuración Espere');
   			 },         
          success: function(data){ 
          	$("#mensaje_configuracion").removeClass('alert alert-warning alert-dismissable text-center mensaje_alerta_configuracion');
            $("#mensaje_configuracion").addClass('alert alert-success alert-dismissable text-center mensaje_alerta_configuracion');
            $('#mensaje_configuracion').text('Configuración Registrada Muchas Gracias');
            setTimeout(function () {
            window.location.href = '../paginas_principales/configuracion.php';
          }, 1000);             
          },error: function () {
          	$("#mensaje_configuracion").removeClass('alert alert-success alert-dismissable text-center mensaje_alerta_configuracion');
            $("#mensaje_configuracion").addClass('alert alert-danger alert-dismissable text-center mensaje_alerta_configuracion');
            $('#mensaje_configuracion').text('Ha Ocurrido un Error');

      }
      });
}


/************************************************FORMULARIO******************************************/


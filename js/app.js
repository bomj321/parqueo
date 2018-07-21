/************************************************FORMULARIO******************************************/
function configurar(){ 


  var valor_parqueo=document.getElementById('valor_parqueo').value;
  var cantidadE_parqueo=document.getElementById('cantidadE_parqueo').value;
  var cantidadC_parqueo=document.getElementById('cantidadC_parqueo').value;
  
 
      //Inicia validacion
      //
    if(parseInt(cantidadC_parqueo) > parseInt(cantidadE_parqueo))
      {
      $("#mensaje_configuracion").addClass('alert alert-danger alert-dismissable text-center mensaje_alerta_configuracion');
      $('#mensaje_configuracion').text('Las Columnas no pueden ser mayores a los espacios');
      document.getElementById('cantidadC_parqueo').focus();
      return false;
      }


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



/*******************************BORRAR CONFIGURACION***************************************************/
function borrar_configuracion(){


  var clave_borrar=document.getElementById('clave_borrar').value;

      if (clave_borrar!='5050' )
      {
      toastr.error('Clave Incorrecta!!!');
      document.getElementById('clave_borrar').focus();
      return false;
      }else{//ELSE 
           var opcion = confirm("Alerta se Borrarán todos los datos del sistema. ¿Estas seguro?");
              if (opcion == true) {//IF DEL CONFIRM 
                 $.ajax({          
                    url:"../ajax/borrar_configuracion.php",
                    type:"POST",
                    beforeSend: function() {
                         toastr.options.progressBar = true;
                         toastr.warning('Borrando Configuración Espere...');
                   },         
                    success: function(data){ 
                      toastr.options.progressBar = false;
                      setTimeout(function () {
                            toastr.success('Configuración Borrada!!!');
                          }, 1000);         
                         setTimeout(function () {
                                      location.reload();
                                  }, 2000);



                                  
                    },error: function () {
                      toastr.options.progressBar = false;
                      toastr.error('Ocurrio un Error, contacta con el Administrador...');
                }
                });
          }//IF DEL CONFIRM    
      
      }//ELSE 

  }
/*******************************BORRAR CONFIGURACION***************************************************/

/*******************************EDITAR INFORMACION***************************************************/

  function editar_informacion(){


  var clave_editar=document.getElementById('clave_editar').value;

      if (clave_editar!='5050' )
      {
      toastr.error('Clave Incorrecta!!!');
      document.getElementById('clave_editar').focus();
      return false;
      }else{//ELSE 
        window.location.href = '../paginas_principales/editar_informacion.php';   
             
      
      }//ELSE 

  }

/*******************************EDITAR INFORMACION***************************************************/



  


/*EDITAR INFORMACION*/
function editar_informacion_form(){ 
  var parametros = new FormData($("#form_editar_informacion")[0]);
      $.ajax({
          data: parametros,
          url:"../ajax/editar_informacion.php",
          type:"POST",
          contentType:false,
          processData:false,
          beforesend: function(){
            toastr.options.progressBar = true;
            toastr.warning('Editando Espere...');
          },
          success: function(data){            
            toastr.options.progressBar = false;
            setTimeout(function () {
            toastr.success('Información Editada!!!');
          }, 1000);         
            //LimpiarVentaDeServicios();
          setTimeout(function () {
              window.location.href = '../paginas_principales/configuracion.php';
          }, 2000);

                        
          },error: function () {
                      toastr.options.progressBar = false;
                      toastr.error('Ocurrio un Error, contacta con el Administrador...');
                }
      });
}
/*EDITAR INFORMACION*/





/***************************INICIAR PARQUEO*************************************/

   function parquear() {
            var apartar_espacio=document.getElementById('apartar_espacio').value;
            var tipo_automotor=document.getElementById('tipo').value;
            var matricula=document.getElementById('matricula').value;
            var tipo_marca=document.getElementById('tipo_marca').value;

            window.open("../ajax/imprimir_venta.php?apartar_espacio="+apartar_espacio+"&tipo_automotor="+tipo_automotor+"&matricula="+matricula+"&marca="+tipo_marca);
            setTimeout(function () {
              location.href = "../paginas_principales/generar_parqueo.php";
          }, 1000);      
      
    }
     
/***************************INICIAR PARQUEO*************************************/


/***************************FINALIZAR PARQUEO*************************************/

   function parquear_fin(id_ventas) {
            
            window.open("../ajax/imprimir_venta_fin.php?id_ventas="+id_ventas);
            setTimeout(function () {
              location.href = "../paginas_principales/generar_parqueo.php";
          }, 1000);      
      
    }
     
/***************************FINALIZAR PARQUEO*************************************/

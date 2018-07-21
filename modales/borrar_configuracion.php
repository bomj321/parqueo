<div class="modal fade" id="borrar_configuracion">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Borrar Configuraci&oacute;n</h4>
              </div>
        <div class="modal-body"> 
          <style type="text/css">
            .mensaje_alerta_borrar{
              font-size: 2em;              
            }
          </style>
                   <div id="mensaje_borrar"></div>        
                    <form class="form-horizontal" id="borrar_data">
                            

                             <div class="form-group col-md-12">
		                              <label class="control-label">Ingrese Clave</label>
		                                <input class="form-control" type="text" placeholder="Clave" id="clave_borrar" required="true" >

                             </div>
							
							<div class="form-group col-md-12">
                             <button onclick="borrar_configuracion(); return false"  class="btn btn-lg btn-primary">Borrar</button> 
                             </div>
                    </form>
                 </div>            
              <br>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
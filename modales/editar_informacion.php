<div class="modal fade" id="editar_informacion">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Informaci&oacute;n</h4>
              </div>
        <div class="modal-body">           
                    <form class="form-horizontal" id="borrar_data">
                            

                             <div class="form-group col-md-12">
                                  <label class="control-label">Ingrese Clave para Acceder</label>
                                    <input class="form-control" type="text" placeholder="Clave" id="clave_editar" required="true" >

                             </div>
              
              <div class="form-group col-md-12">
                             <button onclick="editar_informacion(); return false"  class="btn btn-lg btn-primary">Acceder</button> 
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